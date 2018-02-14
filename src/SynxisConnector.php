<?php

namespace GurwinderAntal\SynxisPhp;

/**
 * Class SynxisConnector
 *
 * @package GurwinderAntal\SynxisPhp
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
     * @param null $options
     *    An array of options.
     *
     * @throws \Exception
     */
    public function __construct($wsdl, $options = NULL) {
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
        $namespace = 'http://htng.org/1.1/Header';
        $headerBody = [
            'From' => [
                'systemId'   => $systemId,
                'Credential' => [
                    'userName' => $username,
                    'password' => $password,
                ],
            ],
        ];
        $header = new \SoapHeader($namespace, 'HTNGHeader', $headerBody);
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
                    '_'          => [
                        'CompanyName' => [
                            'Code' => $channelCode,
                        ],
                    ],
                    'ID'         => $channelId,
                    'ID_Context' => 'Synxis',
                ],
            ],
        ];
    }

    public function getAvailability() {
        //@TODO: Get availability
    }

}
