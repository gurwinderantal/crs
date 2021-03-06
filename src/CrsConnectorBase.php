<?php

namespace GurwinderAntal\crs;

use GurwinderAntal\crs\Type\Common\Credential;
use GurwinderAntal\crs\Type\Common\HtngHeader;
use GurwinderAntal\crs\Type\Common\HtngHeaderFrom;

/**
 * Class CrsConnectorBase
 * Provides functionality common to both SynXis and Windsurfer.
 *
 * @package GurwinderAntal\crs
 */
abstract class CrsConnectorBase implements CrsConnectorInterface {

    /**
     * @var string
     */
    protected $wsdl;

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
     * @var bool
     */
    public $debug;

    /**
     * CrsConnector constructor.
     *
     * @param string $wsdl
     *    URI of the WSDL file.
     * @param array $credentials
     *    An array containing credentials supplied by the CRS provider.
     * @param bool $debug
     *
     * @throws \Exception
     */
    public function __construct(
        string $wsdl,
        array $credentials,
        bool $debug = FALSE
    ) {
        if (!class_exists('SoapClient')) {
            throw new \Exception('PHP SOAP extension not installed.');
        }
        if (!(array_key_exists('username', $credentials) && array_key_exists('password', $credentials))) {
            throw new \Exception('API credentials not provided.');
        }
        $this->wsdl = $wsdl;
        $this->credentials = $credentials;
        $this->debug = $debug;
    }

    /**
     * @param string $namespace
     * @param array $classmap
     * @param bool $restricted
     * @param array $config
     */
    public function initializeClient(string $namespace, array $classmap, bool $restricted = FALSE, array $config = []) {
        $context = stream_context_create([
            'ssl' => [
                'verify_peer'       => FALSE,
                'verify_peer_name'  => FALSE,
                'allow_self_signed' => FALSE,
            ],
        ]);
        if ($restricted) {
            $this->client = new RestrictedSoapClient($this->wsdl, [
                'classmap'       => $classmap,
                'exceptions'     => TRUE,
                'trace'          => $this->debug,
                'stream_context' => $context,
            ], $config);
        }
        else {
            $this->client = new \SoapClient($this->wsdl, [
                'classmap'       => $classmap,
                'exceptions'     => TRUE,
                'trace'          => $this->debug,
                'stream_context' => $context,
            ]);
        }
        $this->setHeaders($namespace);
    }

    /**
     * {@inheritdoc}
     */
    public function setHeaders(string $namespace) {
        $credential = new Credential($this->credentials['username'], $this->credentials['password']);
        $from = new HtngHeaderFrom(NULL, $credential);
        $headerBody = new HtngHeader($from, NULL, NULL, NULL, NULL, NULL);
        $header = new \SoapHeader($namespace, 'HTNGHeader', $headerBody);
        $this->client->__setSoapHeaders($header);
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return $this->client->__getFunctions();
    }

}
