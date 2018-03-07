<?php

namespace GurwinderAntal\crs;

use GurwinderAntal\crs\Type\Common\Customer;
use GurwinderAntal\crs\Type\Common\DateTimeSpan;
use GurwinderAntal\crs\Type\Common\GuestCount;
use GurwinderAntal\crs\Type\Common\GuestCounts;
use GurwinderAntal\crs\Type\Common\HotelReferenceGroup;
use GurwinderAntal\crs\Type\Common\HotelSearchCriterion;
use GurwinderAntal\crs\Type\Common\Paragraph;
use GurwinderAntal\crs\Type\Common\Profile;
use GurwinderAntal\crs\Type\Common\Rate;
use GurwinderAntal\crs\Type\Common\ResGuestRPH;
use GurwinderAntal\crs\Type\Common\RoomRate;
use GurwinderAntal\crs\Type\Common\RoomStay;
use GurwinderAntal\crs\Type\Common\RoomType;
use GurwinderAntal\crs\Type\Common\Tax;
use GurwinderAntal\crs\Type\Common\Total;
use GurwinderAntal\crs\Type\Request\AvailRequestSegment;
use GurwinderAntal\crs\Type\Request\CompanyName;
use GurwinderAntal\crs\Type\Request\HotelReservation;
use GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ;
use GurwinderAntal\crs\Type\Request\OTA_HotelResRQ;
use GurwinderAntal\crs\Type\Request\POS;
use GurwinderAntal\crs\Type\Request\ProfileInfo;
use GurwinderAntal\crs\Type\Request\RatePlanCandidate;
use GurwinderAntal\crs\Type\Request\RequestorID;
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
            NULL,
            $params['ID'] ?? NULL,
            $params['ID_Context'] ?? NULL,
            $params['Instance'] ?? NULL,
            $params['PinNumber'] ?? NULL,
            $params['MessagePassword'] ?? NULL
        );
        // Build POS->Source
        $source = new Source(
            NULL,
            $requestorId
        );
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
                $params['ResponseType'] ?? NULL,
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
        // Instantiate SOAP client
        $this->client = new \SoapClient($this->wsdl, [
            'classmap' => [
                'OTA_HotelResRQ' => 'GurwinderAntal\crs\Type\Request\OTA_HotelResRQ',
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
            NULL,
            $params['ID'] ?? NULL,
            $params['ID_Context'] ?? NULL,
            $params['Instance'] ?? NULL,
            $params['PinNumber'] ?? NULL,
            $params['MessagePassword'] ?? NULL
        );
        // Build POS->Source
        $source = new Source(
            NULL,
            $requestorId
        );
        // Build OTA_HotelAvailRQ->POS
        $pos = new POS($source);

        // Build HotelReservation->RoomStay->Total
        $roomTotal = new Total(
            NULL,
            NULL,
            $params['Total']['TaxInclusive'] ?? NULL,
            $params['Total']['AmountBeforeTax'] ?? NULL,
            $params['Total']['AmountAfterTax'] ?? NULL,
            $params['CurrencyCode'] ?? NULL,
            $params['DecimalPlaces'] ?? 2,
            NULL,
            NULL
        );
        // Build HotelReservation->RoomStay->RoomTypes
        $roomTypes = [
            new RoomType(
                new Paragraph(
                    NULL,
                    NULL,
                    NULL,
                    $params['RoomType']['Name'] ?? NULL
                ),
                NULL,
                NULL,
                NULL,
                NULL,
                $params['IsRoom'] ?? NULL,
                $params['RoomTypeCode'] ?? NULL,
                $params['InvBlockCode'] ?? NULL,
                $params['NumberOfUnits'] ?? NULL
            ),
        ];
        // Build HotelReservation->RoomStay->RoomType->Rate->Base
        $base = new Total(
            NULL,
            NULL,
            $params['TaxInclusive'] ?? NULL,
            $params['Rate']['AmountBeforeTax'] ?? NULL,
            NULL,
            $params['CurrencyCode'] ?? NULL,
            $params["DecimalPlaces"] ?? 2,
            NULL,
            NULL
        );
        // Build HotelReservation->RoomStay->RoomType->Rate->Total
        $total = new Total(
            NULL,
            NULL,
            $params['TaxInclusive'] ?? NULL,
            $params['Total']['AmountBeforeTax'] ?? NULL,
            NULL,
            $params['CurrencyCode'] ?? NULL,
            $params["DecimalPlaces"] ?? 2,
            NULL,
            NULL
        );
        // Build HotelReservation->RoomStay->RoomType->Rates
        $rates = [
            new Rate(
                NULL,
                NULL,
                $base,
                NULL,
                NULL,
                NULL,
                $total,
                NULL,
                NULL,
                $params['RateTypeCode'] ?? NULL,
                $params['RateTimeUnit'] ?? NULL,
                $params['UnitMultiplier'] ?? NULL,
                $params['EffectiveDate'] ?? NULL,
                $params['ExpireDate'] ?? NULL
            ),
        ];
        // Build HotelReservation->RoomStay->RoomTypes
        $roomRates = [
            new RoomRate(
                $rates,
                NULL,
                NULL,
                $params['EffectiveDate'] ?? NULL,
                $params['ExpireDate'] ?? NULL,
                $params['RoomTypeCode'] ?? NULL,
                $params['RatePlanCode'] ?? NULL,
                $params['NumberOfUnits'] ?? NULL,
                $params['InvBlockCode'] ?? NULL
            ),
        ];
        // Build HotelReservation->RoomStay->GuestCounts->GuestCount
        $guestCount = [];
        foreach ($params['Count'] as $aqc => $count) {
            $aqc = 'self::AQC_' . strtoupper($aqc);
            $guestCount[] = new GuestCount(constant($aqc), $count, NULL);
        }
        // Build HotelReservation->RoomStay->GuestCounts
        $guestCounts = new GuestCounts(
            $guestCount,
            $params['IsPerRoom'] ?? NULL
        );
        // Build HotelReservation->RoomStay->TimeSpan
        $timeSpan = new DateTimeSpan(
            $params['Start'] ?? NULL,
            $params['End'] ?? NULL,
            $params['Duration'] ?? NULL,
            NULL
        );
        // Build HotelReservation->RoomStay->BasicPropertyInfo
        $basicPropertyInfo = new HotelReferenceGroup(
            $params['HotelCode'] ?? NULL,
            $params['HotelName'] ?? NULL,
            $params['AreaID'] ?? NULL,
            $params['HotelCodeContext'] ?? NULL,
            $params['ChainCode'] ?? NULL,
            $params['ChainName'] ?? NULL,
            $params['BrandCode'] ?? NULL,
            $params['BrandName'] ?? NULL,
            $params['HotelCityCode'] ?? NULL
        );
        // Build HotelReservation->RoomStay->ResGuestRPH
        $resGuestRPHs = [
            new ResGuestRPH($params['RPH'] ?? NULL),
        ];
        // Build HotelReservation->RoomStays
        $roomStays = [
            new RoomStay(
                NULL,
                NULL,
                NULL,
                $roomTotal,
                $roomTypes,
                NULL,
                $roomRates,
                $guestCounts,
                $timeSpan,
                NULL,
                $basicPropertyInfo,
                NULL,
                NULL,
                $resGuestRPHs,
                NULL,
                NULL,
                $params['MarketCode'] ?? NULL,
                $params['SourceOfBusiness'] ?? NULL,
                $params['IndexNumber'] ?? NULL
            ),
        ];
        // Build HotelReservation->ResGuest->Profiles->Profile->Customer
        //@TODO
        $customer = new Customer();
        // Build HotelReservation->ResGuest->Profiles->Profile
        $profile = new Profile(
            NULL,
            NULL,
            $customer,
            NULL,
            NULL,
            NULL,
            NULL,
            $params['ProfileType'] ?? NULL,
            NULL,
            NULL,
            NULL,
            $params['ShareAllMarketInd'] ?? NULL
        );
        // Build HotelReservation->ResGuest->Profiles
        $profiles = [
            new ProfileInfo(
                NULL,
                $profile,
                NULL
            ),
        ];
        // Build HotelReservation->ResGuests
        $resGuests = [
            new ResGuest(
                NULL,
                $profiles,
                NULL,
                NULL,
                $params['PrimaryIndicator'] ?? NULL,
                $params['RPH'] ?? NULL,
                NULL
            ),
        ];
        // Build OTA_HotelResRQ->HotelReservations
        $hotelReservations = [
            new HotelReservation(
                NULL,
                $roomStays,
                $resGuests,
                NULL, //@TODO
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                TRUE,
                $params['CreatorID'] ?? NULL,
                NULL,
                $params['LastModifierID'] ?? NULL,
                NULL
            ),
        ];

        // Build request
        $request = new OTA_HotelResRQ(
            $params['EchoToken'] ?? NULL,
            $params['PrimaryLangID'] ?? NULL,
            $params['AltLangID'] ?? NULL,
            NULL,
            $params['Target'] ?? NULL,
            $params['Version'] ?? NULL,
            $params['MessageContentCode'] ?? NULL,
            NULL,
            $pos,
            $hotelReservations,
            NULL,
            'Book',
            $params['RetransmissionIndicator'] ?? NULL
        );

        $response = $this->client->CreateReservations($request);
        ksm($this->client->__getLastRequest());
        return $response;
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
