<?php

namespace GurwinderAntal\crs;

use GurwinderAntal\crs\Type\Common\HotelReferenceGroup;
use GurwinderAntal\crs\Type\Common\HotelSearchCriterion;
use GurwinderAntal\crs\Type\Request\AvailRequestSegment;
use GurwinderAntal\crs\Type\Request\CompanyName;
use GurwinderAntal\crs\Type\Request\GuestCount;
use GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ;
use GurwinderAntal\crs\Type\Request\POS;
use GurwinderAntal\crs\Type\Request\RatePlanCandidate;
use GurwinderAntal\crs\Type\Request\RequestorID;
use GurwinderAntal\crs\Type\Request\RoomStayCandidate;
use GurwinderAntal\crs\Type\Request\Source;
use GurwinderAntal\crs\Type\Request\StayDateRange;

/**
 * Class SynxisConnector
 * Provides functionality specific to SynXis.
 *
 * @package GurwinderAntal\crs
 */
class SynxisConnector extends CrsConnectorBase {

    /**
     * {@inheritdoc}
     */
    public function checkAvailability($params) {
        // Instantiate SOAP client
        $this->client = new \SoapClient($this->wsdl, [
            'classmap' => [
                'OTA_HotelAvailRQ' => 'GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ',
                'OTA_HotelAvailRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelAvailRS',
            ],
            'trace'    => TRUE,
        ]);
        $this->setHeaders('http://htng.org/1.1/Header/');

        // Build POS->Source->RequestorID->CompanyName
        $companyName = new CompanyName(
            $params['CodeContext'] ?? NULL,
            $params['CompanyShortName'] ?? NULL,
            $params['TravelSelector'] ?? NULL,
            $params['Code'] ?? NULL
        );
        // Build POS->Source->RequestorID
        $requestorId = new RequestorID(
            $companyName,
            $params['ID'] ?? NULL,
            $params['ID_context'] ?? NULL,
            $params['Instance'] ?? NULL,
            $params['PinNumber'] ?? NULL,
            $params['MessagePassword'] ?? NULL
        );
        // Build POS->Source
        $source = new Source(
            NULL,
            $requestorId);
        // Build OTA_HotelAvailRQ->POS
        $pos = new POS($source);

        // Build AvailRequestSegment->StayDateRange
        $stayDateRange = new StayDateRange(
            $params['Start'] ?? NULL,
            $params['End'] ?? NULL,
            $params['Duration'] ?? NULL
        );
        // Build AvailRequestSegment->RatePlanCandidates
        $ratePlanCandidates = array_key_exists('PromotionCode', $params) ||
        array_key_exists('RatePlanCode', $params) ? [
            new RatePlanCandidate(
                NULL,
                NULL,
                $params['PromotionCode'] ?? NULL,
                $params['RatePlanCode'] ?? NULL,
                $params['RatePlanType'] ?? NULL,
                $params['RatePlanId'] ?? NULL,
                $params['RatePlanQualifier'] ?? NULL,
                $params['RatePlanCategory'] ?? NULL,
                $params['RatePlanFilterCode'] ?? NULL
            ),
        ] : NULL;
        // Build AvailRequestSegment->RoomStayCandidate->GuestCounts
        $guestCounts = [];
        foreach ($params['Count'] as $aqc => $count) {
            $aqc = 'self::AQC_' . strtoupper($aqc);
            $guestCounts[] = new GuestCount(constant($aqc), $count);
        }
        // Build AvailRequestSegment->RoomStayCandidates
        $roomStayCandidates = [
            new RoomStayCandidate(
                $guestCounts,
                $params['Quantity'] ?? NULL,
                $params['RoomType'] ?? NULL,
                $params['RoomTypeCode'] ?? NULL,
                $params['RoomCategory'] ?? NULL,
                $params['PromotionCode'] ?? NULL,
                $params['NonSmoking'] ?? NULL
            ),
        ];
        // Build AvailRequestSegment->HotelSearchCriteria
        $hotelSearchCriteria = [];
        foreach ((array) $params['HotelCode'] as $hotelCode) {
            // Build AvailRequestSegment->HotelSearchCriteria->Criterion->HotelRef
            $hotelRef = new HotelReferenceGroup(
                $hotelCode,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL
            );
            // Build AvailRequestSegment->HotelSearchCriteria->Criterion
            $hotelSearchCriteria[] = new HotelSearchCriterion(
                NULL,
                NULL,
                $hotelRef,
                NULL,
                NULL,
                NULL,
                NULL
            );
        }
        // Build AvailRequestSegments
        $availRequestSegments = [
            new AvailRequestSegment($stayDateRange,
                NULL,
                $ratePlanCandidates,
                NULL,
                $roomStayCandidates,
                $hotelSearchCriteria,
                NULL,
                NULL,
                'Room',
                NULL
            ),
        ];

        // Build OTA_HotelAvailRQ
        $request = new OTA_HotelAvailRQ(
            $pos,
            $availRequestSegments,
            NULL,
            $params['MaxResponses'] ?? NULL,
            $params['RequestedCurrency'] ?? NULL,
            $params['ExactMatchOnly'] ?? TRUE,
            $params['ExactMatchOnly'] ?? FALSE,
            $params['SummaryOnly'] ?? FALSE,
            $params['HotelStayOnly'] ?? FALSE,
            $params['PricingMethod'] ?? NULL,
            $params['AvailRatesOnly'] ?? TRUE
        );
        $response = $this->client->CheckAvailability($request);
        ksm($this->client->__getLastRequest());
        return $response;
    }

}
