<?php

namespace GurwinderAntal\crs;

/**
 * Class WindsurferConnector
 *
 * @package GurwinderAntal\crs
 */
class WindsurferConnector implements CrsConnectorInterface {

    protected $client;

    public function __construct($wsdl, $options = []) {
        if (!class_exists('SoapClient')) {
            throw new \Exception('PHP SOAP extension not installed.');
        }
        $this->client = new \SoapClient($wsdl, $options);
    }

}
