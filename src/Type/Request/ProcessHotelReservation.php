<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class ProcessHotelReservation
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ProcessHotelReservation {

    /**
     * @var \GurwinderAntal\crs\Type\Request\OTA_HotelResRQ
     */
    protected $OTA_HotelResRQ;

    /**
     * ProcessHotelReservation constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\OTA_HotelResRQ $OTA_HotelResRQ
     */
    public function __construct(OTA_HotelResRQ $OTA_HotelResRQ) {
        $this->OTA_HotelResRQ = $OTA_HotelResRQ;
    }

}
