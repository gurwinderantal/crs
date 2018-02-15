<?php

namespace GurwinderAntal\Synxis;

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
        $credential = new \SoapVar([$uNode,$pNode], SOAP_ENC_OBJECT, NULL, NULL, 'Credential', $namespace);
        $from = new \SoapVar([$credential], SOAP_ENC_OBJECT, NULL, NULL, 'From', $namespace);
        $headerBody = new \SoapVar([$from], SOAP_ENC_OBJECT, NULL, NULL, 'HTNGHeader', $namespace);
        $header = new \SoapHeader($namespace, 'HTNGHeader', $headerBody, FALSE);
        $this->client->__setSoapHeaders($header);
    }

    /**
     * Construct a POS element.
     *
     * @param $channelId
     *     The channel ID as provided by Sabre.
     * @param $channelCode
     *     The channel name as provided by Sabre.
     *
     * @return array
     */
    public function getPos($channelId, $channelCode) {
        return [
            'Source' => [
                'RequestorId' => [
                    'CompanyName' => [
                        'Code' => $channelCode,
                    ],
                    'ID'          => $channelId,
                    'ID_Context'  => 'Synxis',
                ],
            ],
        ];
    }

    /**
     * Checks availability.
     */
    public function getAvailability() {
        $this->setHeaders('Elevated Third', '***REMOVED***', '***REMOVED***');
        $params = [
            'OTA_HotelAvailRQ' => [
                'POS' => $this->getPos('10', 'WSBE'),
            ],
        ];
        //$response = $this->client->__soapCall('CheckAvailability', $params);
    }

}
