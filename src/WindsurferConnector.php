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
use GurwinderAntal\crs\Type\Common\Rate;
use GurwinderAntal\crs\Type\Common\RatePlan;
use GurwinderAntal\crs\Type\Common\RoomRate;
use GurwinderAntal\crs\Type\Common\RoomStay;
use GurwinderAntal\crs\Type\Common\RoomType;
use GurwinderAntal\crs\Type\Common\StateProv;
use GurwinderAntal\crs\Type\Common\Telephone;
use GurwinderAntal\crs\Type\Common\Total;
use GurwinderAntal\crs\Type\Request\AvailRequestSegment;
use GurwinderAntal\crs\Type\Request\BookingChannel;
use GurwinderAntal\crs\Type\Request\CheckHotelAvailability;
use GurwinderAntal\crs\Type\Request\Comment;
use GurwinderAntal\crs\Type\Request\GetHotelReservation;
use GurwinderAntal\crs\Type\Request\HotelReservation;
use GurwinderAntal\crs\Type\Request\HotelReservationID;
use GurwinderAntal\crs\Type\Request\MessageType;
use GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ;
use GurwinderAntal\crs\Type\Request\OTA_HotelGetMsgRQ;
use GurwinderAntal\crs\Type\Request\OTA_HotelResRQ;
use GurwinderAntal\crs\Type\Request\PaymentCard;
use GurwinderAntal\crs\Type\Request\ProcessHotelReservation;
use GurwinderAntal\crs\Type\Request\ProfileInfo;
use GurwinderAntal\crs\Type\Request\RatePlanCandidate;
use GurwinderAntal\crs\Type\Request\RequestorID;
use GurwinderAntal\crs\Type\Request\ResGlobalInfo;
use GurwinderAntal\crs\Type\Request\ResGuest;
use GurwinderAntal\crs\Type\Request\RoomStayCandidate;
use GurwinderAntal\crs\Type\Request\Source;
use GurwinderAntal\crs\Type\Request\SpecialRequest;
use GurwinderAntal\crs\Type\Response\Service;

/**
 * Class WindsurferConnector
 * Provides functionality specific to Windsurfer.
 *
 * @package GurwinderAntal\crs
 */
class WindsurferConnector extends CrsConnectorBase {

    /**
     * Timestamp format.
     */
    const TIMESTAMP_ZONE = 'US/Mountain';

    const TIMESTAMP_FORMAT = "Y-m-d\TH:i:s+00:00";

    /**
     * {@inheritdoc}
     */
    public function checkAvailability($params) {
        // Instantiate SOAP client
        $this->initializeClient('http://htng.org/2009B', [
            'OTA_HotelAvailRQ' => 'GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ',
            'OTA_HotelAvailRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelAvailRS',
        ]);

        // Build POS->Source->BookingChannel
        $bookingChannel = new BookingChannel(
            NULL,
            TRUE,
            $params['POS']['BookingChannel']['Type'] ?? NULL,
            NULL
        );
        // Build POS->Source->RequestorID
        $requestorId = new RequestorID(
            NULL,
            $params['POS']['RequestorID']['Type'] ?? NULL,
            $params['POS']['ID'] ?? NULL,
            $params['POS']['ID_Context'] ?? NULL,
            NULL,
            NULL,
            NULL
        );
        // Build POS->Source
        $source = [
            new Source(
                $bookingChannel,
                $requestorId
            ),
        ];

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
                NULL,
                $params['RatePlanID'] ?? NULL,
                $params['RatePlanQualifier'] ?? NULL,
                $params['RatePlanCategory'] ?? NULL,
                $params['RatePlanFilterCode'] ?? NULL
            ),
        ] : NULL;
        // Build AvailRequestSegment->RoomStayCandidate->GuestCounts
        $guestCounts = [];
        foreach ($params['Count'] as $aqc => $count) {
            if (!is_null($count)) {
			    $aqc = 'self::AQC_' . strtoupper($aqc);
			    $guestCounts[] = new GuestCount(constant($aqc), $count, NULL);
            }
        }
        // Build AvailRequestSegment->RoomStayCandidates
        $roomStayCandidates = [
            new RoomStayCandidate(
                new GuestCounts(
                    $guestCounts,
                    $params['IsPerRoom'] ?? NULL
                ),
                $params['Quantity'] ?? NULL,
                $params['RoomType'] ?? NULL,
                $params['RoomTypeCode'] ?? NULL,
                $params['RoomCategory'] ?? NULL,
                $params['PromotionCode'] ?? NULL,
                $params['NonSmoking'] ?? NULL,
                $params['InvBlockCode'] ?? NULL,
                $params['RoomID'] ?? NULL
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
            $this->timestamp(),
            $params['Target'] ?? NULL,
            $params['Version'] ?? NULL,
            $params['MessageContentCode'] ?? NULL,
            NULL,
            $source,
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
        $wrapper = new CheckHotelAvailability($request);

        try {
            $response = current($this->client->CheckHotelAvailability($wrapper));
            if ($this->debug) {
                $this->logMessage(__FUNCTION__);
            }
            return $response;
        } catch (\Exception $exception) {
            // Handle error.
            return NULL;
        }
    }

    /**
     * Returns formatted timestamp.
     *
     * @return false|string
     */
    public function timestamp() {
        date_default_timezone_set(self::TIMESTAMP_ZONE);
        return date(self::TIMESTAMP_FORMAT);
    }

    /**
     * {@inheritdoc}
     */
    public function createReservation($params) {
        $params['ResStatus'] = 'Book';
        return $this->processReservation($params);
    }

    /**
     * Executes operation on reservation.
     *
     * @param $params
     *
     * @return mixed
     */
    public function processReservation($params) {
        // Instantiate SOAP client
        $this->initializeClient('http://htng.org/2009B', [
            'OTA_HotelResRQ' => 'GurwinderAntal\crs\Type\Request\OTA_HotelResRQ',
            'OTA_HotelResRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelResRS',
        ]);

        // Build POS->Source->BookingChannel
        $bookingChannel = new BookingChannel(
            NULL,
            TRUE,
            $params['POS']['BookingChannel']['Type'] ?? NULL,
            NULL
        );
        // Build POS->Source->RequestorID
        $requestorId = new RequestorID(
            NULL,
            $params['POS']['RequestorID']['Type'] ?? NULL,
            $params['POS']['ID'] ?? NULL,
            $params['POS']['ID_Context'] ?? NULL,
            NULL,
            NULL,
            NULL
        );
        // Build POS->Source
        $source = [
            new Source(
                $bookingChannel,
                $requestorId
            ),
        ];

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
                $params['RoomID'] ?? NULL
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
        // Build HotelReservation->RoomStay->RoomRates
        $roomRates = [];
        foreach ($params['RoomRates'] as $roomRate) {
            $rates = [
                new Rate(
                    NULL,
                    NULL,
                    new Total(
                        NULL,
                        NULL,
                        NULL,
                        $roomRate['AmountBeforeTax'] ?? NULL,
                        $roomRate['AmountAfterTax'] ?? NULL,
                        $params['CurrencyCode'] ?? NULL,
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
                    $roomRate['EffectiveDate'] ?? NULL,
                    $roomRate['ExpireDate'] ?? NULL
                ),
            ];
            $roomRates[] = new RoomRate(
                $rates,
                NULL,
                NULL,
                NULL,
                NULL,
                $params['RoomTypeCode'] ?? NULL,
                $params['RatePlanCode'] ?? NULL,
                $params['NumberOfUnits'] ?? NULL,
                $roomRate['InvBlockCode'] ?? NULL
            );
        }
        // Build HotelReservations->RoomStay->Guarantee->GuaranteesAccepted
        if ($this->array_keys_exist([
            'CardHolderName',
            'CardCode',
            'CardNumber',
            'CardExpireDate',
            'SeriesCode',
        ], $params)) {
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
            // Build HotelReservations->RoomStay->Guarantee
            $guarantee = new Guarantee(
                $guaranteesAccepted,
                NULL,
                NULL,
                NULL,
                NULL
            );
        }
        else {
            $guarantee = NULL;
        }
        // Build HotelReservation->RoomStay->SpecialRequests
        if (array_key_exists('SpecialRequests', $params)) {
            $specialRequests = [];
            foreach ($params['SpecialRequests'] as $specialRequest) {
                $specialRequests[] = new SpecialRequest(
                    $specialRequest['Text'] ?? NULL,
                    $specialRequest['Name'] ?? NULL,
                    $specialRequest['RequestCode'] ?? NULL,
                    $specialRequest['Description'] ?? NULL
                );
            }
        }
        else {
            $specialRequests = NULL;
        }
        // Add any comments
        if (array_key_exists('Comments', $params)) {
            $comments = [];
            foreach ($params['Comments'] as $comment) {
                $comments[] = new Comment($comment['Text']);
            }
        }
        // Build HotelReservation->RoomStays
        $roomStays = [
            new RoomStay(
                $guarantee,
                NULL,
                NULL,
                NULL,
                $roomTypes,
                $ratePlans,
                $roomRates,
                $guestCounts,
                $timeSpan,
                $specialRequests,
                $basicPropertyInfo,
                $comments,
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
                self::PRT_CUSTOMER,
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
        // Build HotelReservation->ResGlobalInfo
        if ($params['ResStatus'] != 'Book') {
            $resGlobalInfo = new ResGlobalInfo(
                NULL,
                NULL,
                NULL,
                NULL,
                [
                    new HotelReservationID(
                        self::UIT_RESERVATION,
                        $params['ID'] ?? NULL,
                        NULL,
                        NULL,
                        NULL
                    ),
                ],
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL
            );
        }
        else {
            $resGlobalInfo = NULL;
        }

        // Build OTA_HotelResRQ->HotelReservations->HotelReservation->Services
        if (!empty($params['Services']) && is_array($params['Services'])) {
            foreach ($params['Services'] as $service) {
                $services[] = new Service(
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    $service['Quantity'] ?? NULL,
                    $service['Inclusive'] ?? NULL,
                    $service['ServiceInventoryCode'] ?? NULL,
                    $service['ServicePricingType'] ?? NULL,
                    $service['ServiceRPH'] ?? NULL
                );
            }
        }

        // Build OTA_HotelResRQ->HotelReservations
        $hotelReservations = [
            new HotelReservation(
                NULL,
                $roomStays,
                $resGuests,
                $resGlobalInfo,
                NULL,
                NULL,
                $services ?? NULL,
                NULL,
                NULL,
                TRUE,
                $params['CreatorID'] ?? NULL,
                NULL,
                $params['LastModifierID'] ?? NULL,
                NULL
            ),
        ];

        // Build OTA_HotelResRQ
        $request = new OTA_HotelResRQ(
            $params['EchoToken'] ?? NULL,
            $params['PrimaryLangID'] ?? NULL,
            $params['AltLangID'] ?? NULL,
            $this->timestamp(),
            $params['Target'] ?? NULL,
            $params['Version'] ?? NULL,
            $params['MessageContentCode'] ?? NULL,
            NULL,
            $source,
            $hotelReservations,
            NULL,
            $params['ResStatus'] ?? NULL,
            $params['RetransmissionIndicator'] ?? NULL
        );
        $wrapper = new ProcessHotelReservation($request);

        try {
            $response = current($this->client->ProcessHotelReservation($wrapper));
            if ($this->debug) {
                $this->logMessage(__FUNCTION__);
            }
            return $response;
        } catch (\Exception $exception) {
            // Handle error.
            return NULL;
        }
    }

    /**
     * @param array $keys
     *   Keys to check presence for.
     * @param array $array
     *   The array to check presence in.
     *
     * @return bool
     */
    public function array_keys_exist(array $keys, array $array) {
        return !array_diff_key(array_flip($keys), $array);
    }

    /**
     * {@inheritdoc}
     */
    public function getReservation($params) {
        // Instantiate SOAP client
        $this->initializeClient('http://htng.org/2009B', [
            'OTA_GetMsgRQ'   => 'GurwinderAntal\crs\Type\Request\OTA_GetMsgRQ',
            'OTA_HotelResRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelResRS',
        ]);
        // Build OTA_HotelGetMsgRQ->Messages.
        $Messages = [];
        if (!empty($params['Messages'])) {
            foreach ((array) $params['Messages'] as $message) {
                $Messages[] = new MessageType(
                    $message['MessageContent'] ?? NULL,
                    $message['HotelCodeContext'] ?? NULL,
                    $message['ReasonForRequest'] ?? NULL,
                    $message['ConfirmationID'] ?? NULL
                );
            }
        }
        // Build OTA_HotelGetMsgRQ
        $request = new OTA_HotelGetMsgRQ(
            $params['EchoToken'] ?? NULL,
            $params['PrimaryLangID'] ?? NULL,
            $params['AltLangID'] ?? NULL,
            $this->timestamp(),
            $params['Target'] ?? NULL,
            $params['Version'] ?? NULL,
            $params['MessageContentCode'] ?? NULL,
            NULL,
            $Messages
        );
        $wrapper = new GetHotelReservation($request);

        try {
            $response = current($this->client->GetHotelReservation($wrapper));
            if ($this->debug) {
                $this->logMessage(__FUNCTION__);
            }
            return $response;
        } catch (\Exception $exception) {
            // Handle error.
            return NULL;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function modifyReservation($params) {
        $params['ResStatus'] = 'Modify';
        return $this->processReservation($params);
    }

    /**
     * {@inheritdoc}
     */
    public function cancelReservation($params) {
        // Instantiate SOAP client
        $this->initializeClient('http://htng.org/2009B', [
            'OTA_HotelResRQ' => 'GurwinderAntal\crs\Type\Request\OTA_HotelResRQ',
            'OTA_HotelResRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelResRS',
        ]);

        // Build POS->Source->BookingChannel
        $bookingChannel = new BookingChannel(
            NULL,
            TRUE,
            $params['POS']['BookingChannel']['Type'] ?? NULL,
            NULL
        );
        // Build POS->Source->RequestorID
        $requestorId = new RequestorID(
            NULL,
            $params['POS']['RequestorID']['Type'] ?? NULL,
            $params['POS']['ID'] ?? NULL,
            $params['POS']['ID_Context'] ?? NULL,
            NULL,
            NULL,
            NULL
        );
        // Build POS->Source
        $source = [
            new Source(
                $bookingChannel,
                $requestorId
            ),
        ];

        // Build HotelReservation->RoomStays->BasicPropertyInfo
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
                NULL,
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
                NULL
            ),
        ];
        // Build HotelReservation->ResGlobalInfo
        $resGlobalInfo = new ResGlobalInfo(
            NULL,
            NULL,
            NULL,
            NULL,
            [
                new HotelReservationID(
                    self::UIT_RESERVATION,
                    $params['ID'] ?? NULL,
                    NULL,
                    NULL,
                    NULL
                ),
            ],
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
                NULL,
                $resGlobalInfo,
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
            ),
        ];

        // Build OTA_HotelResRQ
        $request = new OTA_HotelResRQ(
            $params['EchoToken'] ?? NULL,
            $params['PrimaryLangID'] ?? NULL,
            $params['AltLangID'] ?? NULL,
            $this->timestamp(),
            $params['Target'] ?? NULL,
            $params['Version'] ?? NULL,
            $params['MessageContentCode'] ?? NULL,
            NULL,
            $source,
            $hotelReservations,
            NULL,
            'Cancel',
            $params['RetransmissionIndicator'] ?? NULL
        );
        $wrapper = new ProcessHotelReservation($request);

        try {
            $response = current($this->client->ProcessHotelReservation($wrapper));
            if ($this->debug) {
                $this->logMessage(__FUNCTION__);
            }
            return $response;
        } catch (\Exception $exception) {
            // Handle error.
            return NULL;
        }
    }

    /**
     * Logs request and response messages in XML format in the files directory.
     *
     * @param $operation
     *    The operation being performed, eg. createReservation.
     */
    public function logMessage($operation) {
        $dir = $_SERVER['DOCUMENT_ROOT']. '/sites/default/files/messages';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, TRUE);
        }
        $reqFile = fopen($dir . '/windsurfer_' . $operation . '_request_' . time() . '.xml', 'w');
        fwrite($reqFile, $this->client->__getLastRequest());
        fclose($reqFile);
        $resFile = fopen($dir . '/windsurfer_' . $operation . '_response_' . time() . '.xml', 'w');
        fwrite($resFile, $this->client->__getLastResponse());
        fclose($resFile);
    }

}
