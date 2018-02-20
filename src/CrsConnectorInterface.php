<?php

namespace GurwinderAntal\crs;

/**
 * Interface ConnectorInterface
 *
 * @package GurwinderAntal\crs
 */
interface CrsConnectorInterface {

    /**
     * OTA age qualifying codes (AQC).
     */
    const AQC_INFANT = 7;
    const AQC_CHILD = 8;
    const AQC_TEENAGER = 9;
    const AQC_ADULT = 10;
    const AQC_SENIOR = 11;

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
