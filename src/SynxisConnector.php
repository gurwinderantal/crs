<?php

namespace GurwinderAntal\crs;

use GurwinderAntal\crs\DataType\HotelAvailRQ\AvailRequestSegment;
use GurwinderAntal\crs\DataType\HotelAvailRQ\Criterion;
use GurwinderAntal\crs\DataType\HotelAvailRQ\GuestCount;
use GurwinderAntal\crs\DataType\HotelAvailRQ\HotelAvailRQ;
use GurwinderAntal\crs\DataType\HotelAvailRQ\RoomStayCandidate;
use GurwinderAntal\crs\DataType\HotelAvailRQ\StayDateRange;
use GurwinderAntal\crs\DataType\shared\POS;

/**
 * Class SynxisConnector
 *
 * @package GurwinderAntal\crs
 */
class SynxisConnector implements CrsConnectorInterface {

    /**
     * @var \SoapClient
     */
    protected $client;

    /**
     * @var array
     *    Credentials supplied by the CRS provider such as:
     *        - username
     *        - password
     *        - channel ID
     *        - channel code
     *        - other POS information
     */
    private $credentials;

    /**
     * SynxisConnector constructor.
     *
     * @param $wsdl
     *    URI of the WSDL file.
     * @param $credentials
     *    An array containing credentials supplied by the CRS provider.
     * @param array $options
     *    An array of options.
     *
     * @throws \Exception
     */
    public function __construct($wsdl, $credentials, $options = []) {
        if (!class_exists('SoapClient')) {
            throw new \Exception('PHP SOAP extension not installed.');
        }
        $this->client = new \SoapClient($wsdl, $options);
        $this->credentials = $credentials;
        $this->setHeaders();
    }

    /**
     * {@inheritdoc}
     */
    public function setHeaders() {
        $namespace = 'http://htng.org/1.1/Header/';
        $uNode = new \SoapVar($this->credentials['username'], XSD_STRING, NULL, NULL, 'userName', $namespace);
        $pNode = new \SoapVar($this->credentials['password'], XSD_STRING, NULL, NULL, 'password', $namespace);
        $credential = new \SoapVar([
            $uNode,
            $pNode,
        ], SOAP_ENC_OBJECT, NULL, NULL, 'Credential', $namespace);
        $from = new \SoapVar([$credential], SOAP_ENC_OBJECT, NULL, NULL, 'From', $namespace);
        $headerBody = new \SoapVar([$from], SOAP_ENC_OBJECT, NULL, NULL, 'HTNGHeader', $namespace);
        $header = new \SoapHeader($namespace, 'HTNGHeader', $headerBody, FALSE);
        $this->client->__setSoapHeaders($header);
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return $this->client->__getFunctions();
    }

    /**
     * {@inheritdoc}
     */
    public function checkAvailability($hotelRef, $start_date, $end_date, $roomCount, $adults, $children) {
        // Build POS
        $pos = new POS($this->credentials);
        // Build GuestCount
        $guestCounts = [
            new GuestCount(self::ADULT_AGE_QUALIFYING_CODE, $adults),
            new GuestCount(self::CHILD_AGE_QUALIFYING_CODE, $children),
        ];
        // Build RoomStayCandidates
        $roomStayCandidates = [
            new RoomStayCandidate($roomCount, $guestCounts),
        ];
        // Build Criteria
        $criteria = [
            new Criterion($hotelRef),
        ];
        // Build StayDateRange
        $stayDateRange = new StayDateRange($start_date, $end_date);
        // Build AvailRequestSegments
        $availRequestSegments = [
            new AvailRequestSegment('Room', $stayDateRange, $roomStayCandidates, $criteria),
        ];
        // Build request
        $hotelAvailRQ = new HotelAvailRQ(10, 'en', FALSE, $pos, $availRequestSegments);
        $request = [
            'OTA_HotelAvailRQ' => $hotelAvailRQ->getRequestData(),
        ];
        // Send request
        $response = $this->client->__soapCall('CheckAvailability', $request);
        ksm($this->client->__getLastRequest());
        return $response;
    }

}
