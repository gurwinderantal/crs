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
        $this->setHeaders('Elevated Third', '***REMOVED***', '***REMOVED***');
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
     * @param string $channelCode
     * @param int $channelId
     * @param int $ageQualifyingCode
     * @param int $guestCount
     * @param int $quantity
     * @param string $hotelCode
     * @param string $startDate
     * @param string $endDate
     * @param string $langCode
     *
     * @return mixed
     */
    public function checkAvailability(
        $channelCode,
        $channelId,
        $ageQualifyingCode,
        $guestCount,
        $quantity,
        $hotelCode,
        $startDate,
        $endDate,
        $langCode) {
        // Build POS
        $pos = new POS($channelCode, $channelId);
        // Build GuestCount
        $guestCounts = [
            new GuestCount($ageQualifyingCode, $guestCount),
        ];
        // Build RoomStayCandidates
        $roomStayCandidates = [
            new RoomStayCandidate($quantity, $guestCounts),
        ];
        // Build Criteria
        $criteria = [
            new Criterion($hotelCode),
        ];
        // Build StayDateRange
        $stayDateRange = new StayDateRange($startDate, $endDate);
        // Build AvailRequestSegments
        $availRequestSegments = [
            new AvailRequestSegment('Room', $stayDateRange, $roomStayCandidates, $criteria),
        ];
        // Build request
        $hotelAvailRQ = new HotelAvailRQ(10, $langCode, FALSE, $pos, $availRequestSegments);
        $params = [
            'OTA_HotelAvailRQ' => $hotelAvailRQ->getRequestData(),
        ];
        // Send request
        $response = $this->client->__soapCall('CheckAvailability', $params);
        return $response;
    }

}
