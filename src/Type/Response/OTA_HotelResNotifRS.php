<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Request\UniqueID;

/**
 * Class OTA_HotelResNotifRS
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelResNotifRS extends OtaResponseMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\HotelReservation[]|null
   */
  protected $HotelReservations;

  /**
   * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
   */
  protected $UniqueID;

  /**
   * @var string|null
   */
  protected $ResResponseType;

  /**
   * OTA_HotelResNotifRS constructor.
   *
   * @param null|string $EchoToken
   * @param null|string $PrimaryLangID
   * @param null|string $AltLangID
   * @param null|string $TimeStamp
   * @param null|string $Target
   * @param null|string $Version
   * @param null|string $MessageContentCode
   * @param $TPA_Extensions
   * @param \GurwinderAntal\crs\Type\Request\HotelReservation[]|null $HotelReservations
   * @param \GurwinderAntal\crs\Type\Request\UniqueID|null $UniqueID
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
    ?array $HotelReservations,
    ?UniqueID $UniqueID,
    ?string $ResResponseType
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->HotelReservations = $HotelReservations;
    $this->UniqueID = $UniqueID;
    $this->ResResponseType = $ResResponseType;
  }

}
