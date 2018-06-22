<?php

namespace GurwinderAntal\crs;

/**
 * SoapClient subclass to use when an actual request should not be made to the
 * SOAP API.
 *
 * @package GurwinderAntal\crs
 */
class RestrictedSoapClient extends \SoapClient {

    /**
     * {@inheritdoc}
     */
    public function __doRequest($request, $location, $action, $version, $one_way = 0) {
        // @TODO: Make this request to MyCheck instead of sending it to the CRS
        $response = parent::__doRequest($request, $location, $action, $version, $one_way);
        return $response;
    }

}
