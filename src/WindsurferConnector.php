<?php

namespace GurwinderAntal\crs;

/**
 * Class WindsurferConnector
 * Provides functionality specific to Windsurfer.
 *
 * @package GurwinderAntal\crs
 */
class WindsurferConnector extends CrsConnectorBase {

    /**
     * {@inheritdoc}
     */
    public function __construct($wsdl, $credentials, array $options = []) {
        parent::__construct($wsdl, $credentials, $options);
        $this->setHeaders('http://htng.org/2009B');
    }

    /**
     * {@inheritdoc}
     */
    public function checkAvailability($hotelRef, $start_date, $end_date, $roomCount, $adults, $children) {
        // TODO: Implement checkAvailability() method.
    }

}
