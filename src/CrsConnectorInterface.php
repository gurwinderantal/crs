<?php

namespace GurwinderAntal\crs;

/**
 * Interface ConnectorInterface
 *
 * @package GurwinderAntal\crs
 */
interface CrsConnectorInterface {

    /**
     * Sets required request headers.
     */
    public function setHeaders();

    /**
     * Gets available functions from the web service.
     *
     * @return array
     *   An array containing SOAP function prototypes.
     */
    public function getFunctions();

    /**
     * @param $hotelRef
     *    Hotel or chain reference to look up.
     * @param $start_date
     *    Check-in date.
     * @param $end_date
     *    Check-out date.
     * @param $roomCount
     *    Number of rooms required.
     * @param $adults
     *    Number of adults.
     * @param $children
     *    Number of children.
     *
     * @return mixed
     */
    public function checkAvailability($hotelRef, $start_date, $end_date, $roomCount, $adults, $children);

}