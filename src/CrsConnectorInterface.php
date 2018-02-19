<?php

namespace GurwinderAntal\crs;

/**
 * Interface ConnectorInterface
 *
 * @package GurwinderAntal\crs
 */
interface CrsConnectorInterface {

    /**
     * Constants.
     */
    const ADULT_AGE_QUALIFYING_CODE = 10;
    const CHILD_AGE_QUALIFYING_CODE = 8;

    /**
     * Sets required request headers.
     *
     * @param string $namespace
     *    The namespace of the SOAP header element.
     */
    public function setHeaders(string $namespace);

    /**
     * Gets available functions from the web service.
     *
     * @return array
     *   An array containing SOAP function prototypes.
     */
    public function getFunctions();

    /**
     * @param string $hotelCode
     *    Hotel or chain reference to look up.
     * @param string $start
     *    Check-in date.
     * @param string $end
     *    Check-out date.
     * @param string $roomCount
     *    Number of rooms required.
     * @param string $adultCount
     *    Number of adults.
     * @param string $childCount
     *    Number of children.
     *
     * @return \GurwinderAntal\crs\Type\Response\OTA_HotelAvailRS
     */
    public function checkAvailability($hotelCode, $start, $end, $roomCount, $adultCount, $childCount);

}
