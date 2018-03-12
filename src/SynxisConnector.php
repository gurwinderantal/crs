<?php

namespace GurwinderAntal\crs;

use GurwinderAntal\crs\Type\Common\AddressInfo;
use GurwinderAntal\crs\Type\Common\CountryName;
use GurwinderAntal\crs\Type\Common\Customer;
use GurwinderAntal\crs\Type\Common\DateTimeSpan;
use GurwinderAntal\crs\Type\Common\Guarantee;
use GurwinderAntal\crs\Type\Common\GuaranteeAccepted;
use GurwinderAntal\crs\Type\Common\GuestCount;
use GurwinderAntal\crs\Type\Common\GuestCounts;
use GurwinderAntal\crs\Type\Common\HotelReferenceGroup;
use GurwinderAntal\crs\Type\Common\HotelSearchCriterion;
use GurwinderAntal\crs\Type\Common\PersonName;
use GurwinderAntal\crs\Type\Common\Profile;
use GurwinderAntal\crs\Type\Common\RatePlan;
use GurwinderAntal\crs\Type\Common\RoomStay;
use GurwinderAntal\crs\Type\Common\RoomType;
use GurwinderAntal\crs\Type\Common\StateProv;
use GurwinderAntal\crs\Type\Common\Telephone;
use GurwinderAntal\crs\Type\Request\AvailRequestSegment;
use GurwinderAntal\crs\Type\Request\CompanyName;
use GurwinderAntal\crs\Type\Request\HotelReservation;
use GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ;
use GurwinderAntal\crs\Type\Request\OTA_HotelResRQ;
use GurwinderAntal\crs\Type\Request\PaymentCard;
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
                $params['NonSmoking'] ?? NULL,
                NULL,
                NULL
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
            $params['AvailRatesOnly'] ?? FALSE,
            $params['SequenceNmbr'] ?? NULL
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

        // Build HotelReservation->RoomStay->RoomTypes
        $roomTypes = [
            new RoomType(
                NULL,
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
        // Build HotelReservation->RoomStay->RatePlans
        $ratePlans = [
            new RatePlan(
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                $params['MealsIncluded'] ?? NULL,
                $params['RatePlanCode'] ?? NULL,
                $params['RatePlanName'] ?? NULL,
                $params['AccrualIndicator'] ?? NULL,
                $params['AutoEnrollmentIndicator'] ?? NULL,
                $params['BookingCode'] ?? NULL,
                $params['RatePlanType'] ?? NULL,
                $params['RatePlanID'] ?? NULL,
                $params['EffectiveDate'] ?? NULL,
                $params['ExpireDate'] ?? NULL,
                $params['CurrencyCode'] ?? NULL,
                $params['TaxInclusive'] ?? NULL,
                $params['PrepaidIndicator'] ?? NULL,
                $params['RatePlanCategory'] ?? NULL,
                $params['AvailabilityStatus'] ?? NULL,
                $params['PriceViewableInd'] ?? NULL
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
        // Build HotelReservation->RoomStays
        $roomStays = [
            new RoomStay(
                NULL,
                NULL,
                NULL,
                NULL,
                $roomTypes,
                $ratePlans,
                NULL,
                $guestCounts,
                $timeSpan,
                NULL,
                $basicPropertyInfo,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                $params['MarketCode'] ?? NULL,
                $params['SourceOfBusiness'] ?? NULL,
                $params['IndexNumber'] ?? NULL
            ),
        ];
        $resGuests = [];
        foreach ($params['ResGuests'] as $resGuest) {
            // Build HotelReservation->ResGuest->Profiles->Profile->Customer
            $customer = new Customer(
                new PersonName(
                    $resGuest['NamePrefix'] ?? NULL,
                    $resGuest['NameTitle'] ?? NULL,
                    $resGuest['GivenName'] ?? NULL,
                    $resGuest['MiddleName'] ?? NULL,
                    $resGuest['Surname'] ?? NULL,
                    $resGuest['NameSuffix'] ?? NULL,
                    $resGuest['NameType'] ?? NULL
                ),
                new Telephone(
                    $resGuest['FormattedInd'] ?? FALSE,
                    $resGuest['PhoneTechType'] ?? NULL,
                    $resGuest['PhoneNumber'] ?? NULL,
                    $resGuest['PhoneUseType'] ?? NULL,
                    $resGuest['DefaultInd'] ?? FALSE
                ),
                $resGuest['Email'] ?? NULL,
                new AddressInfo(
                    $resGuest['AddressLine'] ?? NULL,
                    $resGuest['CityName'] ?? NULL,
                    $resGuest['PostalCode'] ?? NULL,
                    new StateProv($resGuest['StateCode'] ?? NULL),
                    new CountryName($resGuest['Code'] ?? NULL),
                    $resGuest['Type'] ?? NULL,
                    $resGuest['Remark'] ?? NULL,
                    $resGuest['CompanyName'] ?? NULL,
                    $resGuest['FormattedInd'] ?? FALSE,
                    $resGuest['DefaultInd'] ?? FALSE
                ),
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                $resGuest['BirthDate'] ?? NULL,
                $resGuest['Gender'] ?? NULL,
                $resGuest['CustomerValue'] ?? NULL,
                $resGuest['LockoutType'] ?? NULL,
                $resGuest['Language'] ?? NULL
            );
            // Build HotelReservation->ResGuest->Profiles->Profile
            $profile = new Profile(
                NULL,
                NULL,
                $customer,
                NULL,
                NULL,
                NULL,
                NULL,
                $resGuest['ProfileType'] ?? NULL,
                NULL,
                NULL,
                NULL,
                $resGuest['ShareAllMarketInd'] ?? NULL
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
            $resGuests[] = new ResGuest(
                NULL,
                $profiles,
                NULL,
                NULL,
                $params['PrimaryIndicator'] ?? NULL,
                $params['RPH'] ?? NULL,
                NULL
            );
        }
        // Build HotelReservations->ResGlobalInfo->Guarantee->GuaranteesAccepted
        $guaranteesAccepted = [
            new GuaranteeAccepted(
                new PaymentCard(
                    $params['CardHolderName'] ?? NULL,
                    NULL,
                    NULL,
                    $params['CardType'] ?? NULL,
                    $params['CardCode'] ?? NULL,
                    $params['CardNumber'] ?? NULL,
                    $params['SeriesCode'] ?? NULL,
                    $params['CardExpireDate'] ?? NULL
                ),
                NULL,
                NULL
            ),
        ];
        // Build HotelReservations->ResGlobalInfo->Guarantee
        $guarantee = new Guarantee(
            $guaranteesAccepted,
            NULL,
            NULL,
            NULL,
            NULL
        );
        // Build HotelReservations->ResGlobalInfo
        $resGlobalInfo = new ResGlobalInfo(
            NULL,
            $guarantee,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL
        );
        // Build OTA_HotelResRQ->HotelReservations
        $hotelReservations = [
            new HotelReservation(
                NULL,
                $roomStays,
                $resGuests,
                $resGlobalInfo,
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

        return $this->client->CreateReservations($request);
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
