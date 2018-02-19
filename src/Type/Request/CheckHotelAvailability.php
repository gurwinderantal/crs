<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class CheckHotelAvailability
 * Used by Windsurfer to wrap OTA_HotelAvailRQ.
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class CheckHotelAvailability {

    /**
     * @var \GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ
     */
    protected $OTA_HotelAvailRQ;

    /**
     * CheckHotelAvailability constructor.
     *
     * @param $OTA_HotelAvailRQ
     */
    public function __construct(OTA_HotelAvailRQ $OTA_HotelAvailRQ) {
        $this->OTA_HotelAvailRQ = $OTA_HotelAvailRQ;
    }

}
