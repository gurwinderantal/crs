<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Request\UniqueID;

/**
 * Class OTA_HotelResModifyNotifRS
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelResModifyNotifRS extends OtaResponseMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
   */
  protected $UniqueID;

  /**
   * @var \GurwinderAntal\crs\Type\Request\HotelResModify[]|null
   */
  protected $HotelResModifies;

  /**
   * @var string|null
   */
  protected $ResResponseType;

  /**
   * OTA_HotelResModifyNotifRS constructor.
   *
   * @param null|string $EchoToken
   * @param null|string $PrimaryLangID
   * @param null|string $AltLangID
   * @param null|string $TimeStamp
   * @param null|string $Target
   * @param null|string $Version
   * @param null|string $MessageContentCode
   * @param $TPA_Extensions
   * @param \GurwinderAntal\crs\Type\Request\UniqueID|null $UniqueID
   * @param \GurwinderAntal\crs\Type\Request\HotelResModify[]|null $HotelResModifies
   * @param string|null ResResponseType
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
    ?UniqueID $UniqueID,
    ?array $HotelResModifies,
    ?string $ResResponseType
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->UniqueID = $UniqueID;
    $this->HotelResModifies = $HotelResModifies;
    $this->ResResponseType = $ResResponseType;
  }

}
