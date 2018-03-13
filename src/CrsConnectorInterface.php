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
     * OTA unique ID types (UIT).
     */
    const UIT_RESERVATION = 14;

    /**
     * OTA profile types (PRT).
     */
    const PRT_OTHER = 0;
    const PRT_CUSTOMER = 1;
    const PRT_GDS = 2;
    const PRT_CORPORATION = 3;
    const PRT_TRAVEL_AGENT = 4;
    const PRT_WHOLESALER = 5;
    const PRT_GROUP = 6;
    const PRT_TOUR_OPERATOR = 7;
    const PRT_CRO = 8;

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
     * @param array $params
     *    An array containing availability search parameters. Array keys must be
     *    the same as the SOAP XML element attributes. For example:
     *        - HotelCode: The unique ID assigned by the CRS.
     *        - Start: The check-in date.
     *        - End: The check-out date.
     *        - Quantity: Number of room required.
     *        - Count:
     *            - Child: Number of children.
     *            - Adult: Number of adults.
     *
     * @return \GurwinderAntal\crs\Type\Response\OTA_HotelAvailRS
     */
    public function checkAvailability($params);

    /**
     * @param $params
     *    An array containing reservation parameters. Array keys must be the
     *    the same as the SOAP XML element attributes.
     *
     * @return mixed
     */
    public function createReservation($params);

    /**
     * @param $params
     *    An array containing reservation parameters. Array keys must be the
     *    the same as the SOAP XML element attributes.
     *
     * @return mixed
     */
    public function getReservation($params);

    /**
     * @param $params
     *    An array containing reservation parameters. Array keys must be the
     *    the same as the SOAP XML element attributes.
     *
     * @return mixed
     */
    public function modifyReservation($params);

    /**
     * @param $params
     *    An array containing cancellation parameters. Array keys must be the
     *    the same as the SOAP XML element attributes.
     *
     * @return mixed
     */
    public function cancelReservation($params);

}
