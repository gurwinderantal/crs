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
use GurwinderAntal\crs\Type\Common\TPA_Extensions;
use GurwinderAntal\crs\Type\Request\AvailRequestSegment;
use GurwinderAntal\crs\Type\Request\CompanyName;
use GurwinderAntal\crs\Type\Request\DateTimeSpanType;
use GurwinderAntal\crs\Type\Request\HotelReservation;
use GurwinderAntal\crs\Type\Request\HotelResModify;
use GurwinderAntal\crs\Type\Request\OTA_CancelRQ;
use GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ;
use GurwinderAntal\crs\Type\Request\OTA_HotelResModifyRQ;
use GurwinderAntal\crs\Type\Request\OTA_HotelResRQ;
use GurwinderAntal\crs\Type\Request\OTA_ReadRQ;
use GurwinderAntal\crs\Type\Request\PaymentCard;
use GurwinderAntal\crs\Type\Request\POS;
use GurwinderAntal\crs\Type\Request\ProfileInfo;
use GurwinderAntal\crs\Type\Request\RatePlanCandidate;
use GurwinderAntal\crs\Type\Request\ReadRequest;
use GurwinderAntal\crs\Type\Request\ReadRequests;
use GurwinderAntal\crs\Type\Request\RequestorID;
use GurwinderAntal\crs\Type\Request\ResGlobalInfo;
use GurwinderAntal\crs\Type\Request\ResGuest;
use GurwinderAntal\crs\Type\Request\RoomStayCandidate;
use GurwinderAntal\crs\Type\Request\Source;
use GurwinderAntal\crs\Type\Request\SupplementalData;
use GurwinderAntal\crs\Type\Request\TelephoneInfo;
use GurwinderAntal\crs\Type\Request\UniqueID;
use GurwinderAntal\crs\Type\Request\Verification;
use GurwinderAntal\crs\Type\Request\WrittenConfInst;

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
        $this->initializeClient('http://htng.org/1.1/Header/', [
            'OTA_HotelAvailRQ' => 'GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ',
            'OTA_HotelAvailRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelAvailRS',
        ]);

        // Build POS->Source->RequestorID->CompanyName
        $companyName = new CompanyName(
            $params['CodeContext'] ?? NULL,
            $params['CompanyShortName'] ?? NULL,
            $params['TravelSelector'] ?? NULL,
            $params['POS']['Code'] ?? NULL
        );
        // Build POS->Source->RequestorID
        $requestorId = new RequestorID(
            $companyName,
            NULL,
            $params['POS']['ID'] ?? NULL,
            $params['POS']['ID_Context'] ?? NULL,
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
        $this->initializeClient('http://htng.org/1.1/Header/', [
            'OTA_HotelResRQ' => 'GurwinderAntal\crs\Type\Request\OTA_HotelResRQ',
            'OTA_HotelResRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelResRS',
        ]);

        // Build POS->Source->RequestorID->CompanyName
        $companyName = new CompanyName(
            $params['CodeContext'] ?? NULL,
            $params['CompanyShortName'] ?? NULL,
            $params['TravelSelector'] ?? NULL,
            $params['POS']['Code'] ?? NULL
        );
        // Build POS->Source->RequestorID
        $requestorId = new RequestorID(
            $companyName,
            NULL,
            $params['POS']['ID'] ?? NULL,
            $params['POS']['ID_Context'] ?? NULL,
            $params['Instance'] ?? NULL,
            $params['PinNumber'] ?? NULL,
            $params['MessagePassword'] ?? NULL
        );
        // Build POS->Source
        $source = new Source(
            NULL,
            $requestorId
        );
        // Build OTA_HotelResRQ->POS
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
                $params['NumberOfUnits'] ?? NULL,
                NULL
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
        // Build OTA_HotelResRQ->WrittenConfInst
        $writtenConfInst = array_key_exists('EmailTemplate', $params) ?
            new WrittenConfInst(
                new SupplementalData(
                    NULL,
                    $params['EmailTemplate'],
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL),
                NULL,
                NULL,
                NULL,
                NULL
            ) : NULL;
        // Build OTA_HotelResRQ->HotelReservations
        $hotelReservations = [
            new HotelReservation(
                NULL,
                $roomStays,
                $resGuests,
                $resGlobalInfo,
                NULL,
                $writtenConfInst,
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
            'Commit',
            $params['RetransmissionIndicator'] ?? NULL
        );

        return $this->client->CreateReservations($request);
    }

    public function getReservation($params) {
        // Instantiate SOAP client
        $this->initializeClient('http://htng.org/1.1/Header/', [
            'OTA_ReadRQ'     => 'GurwinderAntal\crs\Type\Request\OTA_ReadRQ',
            'OTA_HotelResRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelResRS',
        ]);

        // Build POS->Source->RequestorID->CompanyName
        $companyName = new CompanyName(
            $params['CodeContext'] ?? NULL,
            $params['CompanyShortName'] ?? NULL,
            $params['TravelSelector'] ?? NULL,
            $params['POS']['Code'] ?? NULL
        );
        // Build POS->Source->RequestorID
        $requestorId = new RequestorID(
            $companyName,
            NULL,
            $params['POS']['ID'] ?? NULL,
            $params['POS']['ID_Context'] ?? NULL,
            $params['Instance'] ?? NULL,
            $params['PinNumber'] ?? NULL,
            $params['MessagePassword'] ?? NULL
        );
        // Build POS->Source
        $source = new Source(
            NULL,
            $requestorId
        );
        // Build OTA_ReadRQ->POS
        $pos = new POS($source);

        // Build ReadRequest->UniqueID
        $uniqueId = new UniqueID(
            NULL,
            self::UIT_RESERVATION,
            $params['ID'] ?? NULL,
            'CrsConfirmNumber',
            NULL,
            NULL
        );
        // Build ReadRequest->Verification
        $verification = new Verification(
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            new TPA_Extensions(
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                new HotelReferenceGroup(
                    $params['HotelCode'] ?? NULL,
                    NULL,
                    NULL,
                    NULL,
                    $params['ChainCode'] ?? NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL
                ),
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL
            )
        );
        // Build OTA_ReadRQ->ReadRequests
        $readRequests = new ReadRequests(
            new ReadRequest(
                $uniqueId,
                $verification,
                NULL,
                NULL
            ),
            NULL,
            NULL,
            NULL
        );
        // Build request
        $request = new OTA_ReadRQ(
            $params['EchoToken'] ?? NULL,
            $params['PrimaryLangID'] ?? NULL,
            $params['AltLangID'] ?? NULL,
            NULL,
            $params['Target'] ?? NULL,
            $params['Version'] ?? NULL,
            $params['MessageContentCode'] ?? NULL,
            NULL,
            $readRequests,
            NULL,
            $pos,
            $params['ReturnListIndicator'] ?? NULL,
            NULL,
            $params['MaxResponses'] ?? NULL
        );

        return $this->client->ReadReservations($request);
    }

    /**
     * {@inheritdoc}
     */
    public function modifyReservation($params) {
      // Instantiate SOAP client
      $this->initializeClient('http://htng.org/1.1/Header/', [
        'OTA_ReadRQ'     => 'GurwinderAntal\crs\Type\Request\OTA_ReadRQ',
        'OTA_HotelResRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelResRS',
      ]);

      // Build POS->Source->RequestorID->CompanyName
      $companyName = new CompanyName(
        $params['CodeContext'] ?? NULL,
        $params['CompanyShortName'] ?? NULL,
        $params['TravelSelector'] ?? NULL,
        $params['POS']['Code'] ?? NULL
      );
      // Build POS->Source->RequestorID
      $requestorId = new RequestorID(
        $companyName,
        NULL,
        $params['POS']['ID'] ?? NULL,
        $params['POS']['ID_Context'] ?? NULL,
        $params['Instance'] ?? NULL,
        $params['PinNumber'] ?? NULL,
        $params['MessagePassword'] ?? NULL
      );
      // Build POS->Source
      $source = new Source(
        NULL,
        $requestorId
      );
      // Build OTA_CancelRQ->POS
      $pos = new POS($source);
      // Build HotelResModify->RoomStay->RoomTypes
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
          $params['NumberOfUnits'] ?? NULL,
          NULL
        ),
      ];
      // Build HotelResModify->RoomStay->RatePlans
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
      // Build HotelResModify->RoomStay->GuestCounts->GuestCount
      $guestCount = [];
      foreach ($params['Count'] as $aqc => $count) {
        $aqc = 'self::AQC_' . strtoupper($aqc);
        $guestCount[] = new GuestCount(constant($aqc), $count, NULL);
      }
      // Build HotelResModify->RoomStay->GuestCounts
      $guestCounts = new GuestCounts(
        $guestCount,
        $params['IsPerRoom'] ?? NULL
      );
      // Build HotelResModify->RoomStay->TimeSpan
      $timeSpan = new DateTimeSpan(
        $params['Start'] ?? NULL,
        $params['End'] ?? NULL,
        $params['Duration'] ?? NULL,
        NULL
      );
      // Build HotelResModify->RoomStay->BasicPropertyInfo
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
      // Build HotelResModify->RoomStays
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
        // Build HotelResModify->ResGuest->Profiles->Profile->Customer
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
        // Build HotelResModify->ResGuest->Profiles->Profile
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
        // Build HotelResModify->ResGuest->Profiles
        $profiles = [
          new ProfileInfo(
            NULL,
            $profile,
            NULL
          ),
        ];
        // Build HotelResModify->ResGuests
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
      // Build HotelResModify->ResGlobalInfo->Guarantee->GuaranteesAccepted
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
      // Build HotelResModify->ResGlobalInfo->Guarantee
      $guarantee = new Guarantee(
        $guaranteesAccepted,
        NULL,
        NULL,
        NULL,
        NULL
      );
      // Build HotelResModify->ResGlobalInfo
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
      // Build OTA_HotelResModifyRQ->HotelResModify->Verification
      $Verification = new Verification(
        new PersonName(
          $resGuest['NamePrefix'] ?? NULL,
          $resGuest['NameTitle'] ?? NULL,
          $resGuest['GivenName'] ?? NULL,
          $resGuest['MiddleName'] ?? NULL,
          $resGuest['Surname'] ?? NULL,
          $resGuest['NameSuffix'] ?? NULL,
          $resGuest['NameType'] ?? NULL
        ),
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
        new DateTimeSpanType(
          $params['Start'] ?? NULL,
          $params['End'] ?? NULL,
          $params['Duration'] ?? NULL,
          NULL
        ),
        new TelephoneInfo(
          $resGuest['FormattedInd'] ?? FALSE,
          $resGuest['PhoneTechType'] ?? NULL,
          $resGuest['PhoneNumber'] ?? NULL,
          $resGuest['PhoneUseType'] ?? NULL,
          $resGuest['DefaultInd'] ?? FALSE
        ),
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
        $resGuest['Email'] ?? NULL,
        new TPA_Extensions(
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          $basicPropertyInfo,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL,
          NULL
        )
      );
      // Build OTA_HotelResModifyRQ->HotelResModifies->HotelResModify->UniqueID
      $uniqueId = new UniqueID(
        NULL,
        self::UIT_RESERVATION,
        $params['ID'] ?? NULL,
        'CrsConfirmNumber',
        NULL,
        NULL
      );
        // Build OTA_HotelResModifyRQ->WrittenConfInst
        $writtenConfInst = array_key_exists('EmailTemplate', $params) ?
            new WrittenConfInst(
                new SupplementalData(
                    NULL,
                    $params['EmailTemplate'],
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL),
                NULL,
                NULL,
                NULL,
                NULL
            ) : NULL;
      // Build OTA_HotelResModifyRQ->HotelResModifies
      $HotelResModifies = [
        new HotelResModify(
          $uniqueId,
          $roomStays,
          $resGuests,
          $resGlobalInfo,
          NULL,
          $writtenConfInst,
          NULL,
          NULL,
          NULL,
          TRUE,
          $params['CreatorID'] ?? NULL,
          NULL,
          $params['LastModifierID'] ?? NULL,
          NULL,
          $Verification
        )
      ];
      // Build request
      $request = new OTA_HotelResModifyRQ(
        $params['EchoToken'] ?? NULL,
        $params['PrimaryLangID'] ?? NULL,
        $params['AltLangID'] ?? NULL,
        NULL,
        $params['Target'] ?? NULL,
        $params['Version'] ?? NULL,
        $params['MessageContentCode'] ?? NULL,
        NULL,
        $pos,
        $HotelResModifies
      );

      return $this->client->ModifyReservations($request);
    }

    /**
     * {@inheritdoc}
     */
    public function cancelReservation($params) {
        // Instantiate SOAP client
        $this->initializeClient('http://htng.org/1.1/Header/', [
            'OTA_ReadRQ'     => 'GurwinderAntal\crs\Type\Request\OTA_ReadRQ',
            'OTA_HotelResRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelResRS',
        ]);

        // Build POS->Source->RequestorID->CompanyName
        $companyName = new CompanyName(
            $params['CodeContext'] ?? NULL,
            $params['CompanyShortName'] ?? NULL,
            $params['TravelSelector'] ?? NULL,
            $params['POS']['Code'] ?? NULL
        );
        // Build POS->Source->RequestorID
        $requestorId = new RequestorID(
            $companyName,
            NULL,
            $params['POS']['ID'] ?? NULL,
            $params['POS']['ID_Context'] ?? NULL,
            $params['Instance'] ?? NULL,
            $params['PinNumber'] ?? NULL,
            $params['MessagePassword'] ?? NULL
        );
        // Build POS->Source
        $source = new Source(
            NULL,
            $requestorId
        );
        // Build OTA_CancelRQ->POS
        $pos = new POS($source);

        // Build OTA_CancelRQ->UniqueID
        $uniqueId = new UniqueID(
            NULL,
            self::UIT_RESERVATION,
            $params['ID'] ?? NULL,
            'CrsConfirmNumber',
            NULL,
            NULL
        );

        // Build OTA_CancelRQ->Verification
        $verification = new Verification(
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            new TPA_Extensions(
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                new HotelReferenceGroup(
                    $params['HotelCode'] ?? NULL,
                    NULL,
                    NULL,
                    NULL,
                    $params['ChainCode'] ?? NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL
                ),
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL
            )
        );
        // Build OTA_CancelRQ->TPA_Extensions
        if (array_key_exists('EmailTemplate', $params)) {
            $writtenConfInst = new WrittenConfInst(
                new SupplementalData(
                    NULL,
                    $params['EmailTemplate'],
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL),
                NULL,
                NULL,
                NULL,
                NULL
            );
            $tpaExtension = new TPA_Extensions(
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                $writtenConfInst,
                NULL,
                NULL,
                NULL,
                NULL,
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
        }
        else {
            $tpaExtension = NULL;
        }
        // Build request
        $request = new OTA_CancelRQ(
            $params['EchoToken'] ?? NULL,
            $params['PrimaryLangID'] ?? NULL,
            $params['AltLangID'] ?? NULL,
            NULL,
            $params['Target'] ?? NULL,
            $params['Version'] ?? NULL,
            $params['MessageContentCode'] ?? NULL,
            $tpaExtension,
            $uniqueId,
            $verification,
            $pos,
            NULL,
            NULL,
            NULL
        );

        return $this->client->CancelReservations($request);
    }

}
