<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class OTA_HotelResModifyRS
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class OTA_HotelResModifyRS extends OtaResponseMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\HotelResModify[]|null
   */
  public $HotelResModifies;

  /**
   * @var string|null
   */
  public $ResResponseType;

  /**
   * OTA_HotelResModifyRS constructor.
   *
   * @param \GurwinderAntal\crs\Type\Request\HotelResModify[]|null $HotelResModifies
   * @param string|null $ResResponseType
   */
  public function __constructor(
    ?array $HotelResModifies,
    ?string $ResResponseType
  ) {
    $this->HotelResModifies = $HotelResModifies;
    $this->ResResponseType = $ResResponseType;
  }

}
