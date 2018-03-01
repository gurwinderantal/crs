<?php

namespace GurwinderAntal\crs;

use GurwinderAntal\crs\Type\Common\Address;
use GurwinderAntal\crs\Type\Common\CountryName;
use GurwinderAntal\crs\Type\Common\Customer;
use GurwinderAntal\crs\Type\Common\DateTimeSpan;
use GurwinderAntal\crs\Type\Common\GuestCount;
use GurwinderAntal\crs\Type\Common\HotelReferenceGroup;
use GurwinderAntal\crs\Type\Common\HotelSearchCriterion;
use GurwinderAntal\crs\Type\Common\Paragraph;
use GurwinderAntal\crs\Type\Common\PersonName;
use GurwinderAntal\crs\Type\Common\Profile;
use GurwinderAntal\crs\Type\Common\RoomStay;
use GurwinderAntal\crs\Type\Common\RoomType;
use GurwinderAntal\crs\Type\Common\StateProv;
use GurwinderAntal\crs\Type\Common\Telephone;
use GurwinderAntal\crs\Type\Common\Total;
use GurwinderAntal\crs\Type\Request\AvailRequestSegment;
use GurwinderAntal\crs\Type\Request\Comment;
use GurwinderAntal\crs\Type\Request\CompanyName;
use GurwinderAntal\crs\Type\Request\HotelReservation;
use GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ;
use GurwinderAntal\crs\Type\Request\OTA_HotelResRQ;
use GurwinderAntal\crs\Type\Request\POS;
use GurwinderAntal\crs\Type\Request\ProfileInfo;
use GurwinderAntal\crs\Type\Request\RatePlanCandidate;
use GurwinderAntal\crs\Type\Request\RequestorID;
use GurwinderAntal\crs\Type\Request\ResGlobalInfo;
use GurwinderAntal\crs\Type\Request\ResGuest;
use GurwinderAntal\crs\Type\Request\RoomStayCandidate;
use GurwinderAntal\crs\Type\Request\Source;

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
            $params['ID_Context'] ?? NULL,
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
        $stayDateRange = new DateTimeSpan(
            $params['Start'] ?? NULL,
            $params['End'] ?? NULL,
            $params['Duration'] ?? NULL,
            NULL
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
            $guestCounts[] = new GuestCount(constant($aqc), $count, NULL);
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
            new AvailRequestSegment(
                $stayDateRange,
                NULL,
                $ratePlanCandidates,
                NULL,
                $roomStayCandidates,
                $hotelSearchCriteria,
                NULL,
                NULL,
                $params['AvailReqType'] ?? NULL,
                NULL
            ),
        ];

        // Build OTA_HotelAvailRQ
        $request = new OTA_HotelAvailRQ(
            $params['EchoToken'] ?? NULL,
            $params['PrimaryLangID'] ?? NULL,
            $params['AltLangID'] ?? NULL,
            NULL,
            $params['Target'] ?? NULL,
            $params['Version'] ?? NULL,
            $params['MessageContentCode'] ?? NULL,
            NULL,
            $pos,
            $availRequestSegments,
            NULL,
            $params['MaxResponses'] ?? NULL,
            $params['RequestedCurrency'] ?? NULL,
            $params['ExactMatchOnly'] ?? FALSE,
            $params['BestOnly'] ?? FALSE,
            $params['SummaryOnly'] ?? FALSE,
            $params['HotelStayOnly'] ?? FALSE,
            $params['PricingMethod'] ?? NULL,
            $params['AvailRatesOnly'] ?? FALSE
        );

        return $this->client->CheckAvailability($request);
    }

    /**
     * {@inheritdoc}
     */
    public function createReservation($params) {
        // TODO: Implement createReservation() method.
    }

    /**
     * {@inheritdoc}
     */
    public function modifyReservation($params) {
        // TODO: Implement modifyReservation() method.
    }

    /**
     * {@inheritdoc}
     */
    public function cancelReservation($params) {
        // TODO: Implement cancelReservation() method.
    }

}
