<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class OTA_HotelResModifyRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelResModifyRQ extends OtaRequestMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\POS
   */
  protected $POS;

  /**
   * @var \GurwinderAntal\crs\Type\Request\HotelResModify[]|null
   */
  protected $HotelResModifies;

  /**
   * OTA_HotelResModifyRQ constructor.
   *
   * @param null|string $EchoToken
   * @param null|string $PrimaryLangID
   * @param null|string $AltLangID
   * @param null|string $TimeStamp
   * @param null|string $Target
   * @param null|string $Version
   * @param null|string $MessageContentCode
   * @param $TPA_Extensions
   * @param \GurwinderAntal\crs\Type\Request\POS|null $POS
   * @param array|null $HotelResModifies
   */
  public function __construct(
    ?string $EchoToken,
    ?string $PrimaryLangID,
    ?string $AltLangID,
    ?string $TimeStamp,
    ?string $Target,
    ?string $Version,
    ?string $MessageContentCode,
    $TPA_Extensions,
    ?POS $POS,
    ?array $HotelResModifies
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->POS = $POS;
    $this->HotelResModifies = $HotelResModifies;
  }

}
