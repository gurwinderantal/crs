<?php

namespace GurwinderAntal\Synxis;

use GurwinderAntal\Synxis\DataType\HotelAvailRQ\AvailRequestSegment;
use GurwinderAntal\Synxis\DataType\HotelAvailRQ\Criterion;
use GurwinderAntal\Synxis\DataType\HotelAvailRQ\GuestCount;
use GurwinderAntal\Synxis\DataType\HotelAvailRQ\HotelAvailRQ;
use GurwinderAntal\Synxis\DataType\HotelAvailRQ\RoomStayCandidate;
use GurwinderAntal\Synxis\DataType\HotelAvailRQ\StayDateRange;
use GurwinderAntal\Synxis\DataType\shared\POS;

/**
 * Class SynxisConnector
 *
 * @package GurwinderAntal\Synxis
 */
class SynxisConnector {

    /**
     * @var \SoapClient
     */
    protected $client;

    /**
     * SynxisConnector constructor.
     *
     * @param $wsdl
     *    URI of the WSDL file.
     * @param array $options
     *    An array of options.
     *
     * @throws \Exception
     */
    public function __construct($wsdl, $options = []) {
        if (!class_exists('SoapClient')) {
            throw new \Exception('PHP SOAP extension not installed.');
        }
        $this->client = new \SoapClient($wsdl, $options);
    }

    /**
     * Wrapper to get a list of available SOAP functions.
     *
     * @return array
     *    An array containing SOAP function prototypes.
     */
    public function getFunctions() {
        return $this->client->__getFunctions();
    }

    /**
     * Set SOAP headers.
     *
     * @param $systemId
     * @param $username
     * @param $password
     */
    public function setHeaders($systemId, $username, $password) {
        $namespace = 'http://htng.org/1.1/Header/';
        $uNode = new \SoapVar($username, XSD_STRING, NULL, NULL, 'userName', $namespace);
        $pNode = new \SoapVar($password, XSD_STRING, NULL, NULL, 'password', $namespace);
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
     * Checks availability.
     *
     * @TODO: Break out all params for building data to this function's params
     */
    public function checkAvailability() {
        // Build POS
        $pos = new POS('WSBE', '10');
        // Build GuestCount
        $guestCounts = [
            new GuestCount(10, 1),
        ];
        // Build RoomStayCandidates
        $roomStayCandidates = [
            new RoomStayCandidate(1, $guestCounts),
        ];
        // Build Criteria
        $criteria = [
            new Criterion('64888'),
        ];
        // Build StayDateRange
        $stayDateRange = new StayDateRange('2018-03-01', '2018-03-08');
        // Build AvailRequestSegments
        $availRequestSegments = [
            new AvailRequestSegment('Room', $stayDateRange, $roomStayCandidates, $criteria),
        ];
        // Build request
        $hotelAvailRQ = new HotelAvailRQ(10, 'en', FALSE, $pos, $availRequestSegments);
        $params = [
            'OTA_HotelAvailRQ' => $hotelAvailRQ->getRequestData(),
        ];
        // Send request
        $this->setHeaders('Elevated Third', '***REMOVED***', '***REMOVED***');
        $response = $this->client->__soapCall('CheckAvailability', $params);
        return $response;
    }

}
