<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class OTA_HotelResNotifRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelResNotifRQ extends OtaRequestMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\POS|null
   */
  protected $POS;

  /**
   * @var \GurwinderAntal\crs\Type\Request\HotelReservation[]|null
   */
  protected $HotelReservations;

  /**
   * @var string|null
   */
  protected $ResStatus;

  /**
   * OTA_HotelResNotifRQ constructor.
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
   * @param \GurwinderAntal\crs\Type\Request\HotelReservation[]|null $HotelReservations
   * @param string]|null $ResStatus
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
    ?array $HotelReservations,
    ?string $ResStatus
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->POS = $POS;
    $this->HotelReservations = $HotelReservations;
    $this->ResStatus = $ResStatus;
  }

}
