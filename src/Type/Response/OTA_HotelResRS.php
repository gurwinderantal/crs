<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Request\HotelReservation;

/**
 * Class OTA_HotelResRS
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class OTA_HotelResRS extends OtaResponseMessage {

    /**
     * @var \GurwinderAntal\crs\Type\Request\HotelReservation|null
     */
    public $HotelReservation;

    /**
     * @var \GurwinderAntal\crs\Type\Request\HotelReservation[]|null
     */
    public $HotelReservations;

  /**
   * Currently unused.
   */
    public $WrittenConf;

  /**
   * OTA_HotelAvailRS constructor.
   *
   * @param null|string $EchoToken
   * @param null|string $PrimaryLangID
   * @param null|string $AltLangID
   * @param null|string $TimeStamp
   * @param null|string $Target
   * @param null|string $Version
   * @param null|string $MessageContentCode
   * @param $TPA_Extensions
   * @param \GurwinderAntal\crs\Type\Request\HotelReservation $HotelReservation
   * @param \GurwinderAntal\crs\Type\Request\HotelReservation[]|null $HotelReservations
   * @param $WrittenConf
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
    ?HotelReservation $HotelReservation,
    ?array $HotelReservations,
    ?array $WrittenConf
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->HotelReservation = $HotelReservation;
    $this->HotelReservations = $HotelReservations;
    $this->WrittenConf = $WrittenConf;
  }

}

