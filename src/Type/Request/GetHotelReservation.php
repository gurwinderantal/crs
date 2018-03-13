<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class GetHotelReservation
 * Used by Windsurfer to wrap OTA_HotelGetMsgRQ.
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class GetHotelReservation {

  /**
   * @var \GurwinderAntal\crs\Type\Request\OTA_HotelGetMsgRQ
   */
  protected $OTA_HotelGetMsgRQ;

  /**
   * GetHotelReservation constructor.
   *
   * @param $OTA_HotelGetMsgRQ
   */
  public function __construct(OTA_HotelGetMsgRQ $OTA_HotelGetMsgRQ) {
    $this->OTA_HotelGetMsgRQ = $OTA_HotelGetMsgRQ;
  }

}
