<?php

namespace GurwinderAntal\crs;

/**
 * Class CrsConnectorBase
 * Provides functionality common to both SynXis and Windsurfer.
 *
 * @package GurwinderAntal\crs
 */
abstract class CrsConnectorBase implements CrsConnectorInterface {

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
    protected $credentials;

    /**
     * CrsConnector constructor.
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
    }

    /**
     * {@inheritdoc}
     */
    public function setHeaders($namespace) {
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

}
