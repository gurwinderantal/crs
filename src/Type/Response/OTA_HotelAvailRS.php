<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class OTA_HotelAvailRS
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class OTA_HotelAvailRS extends OtaResponseMessage {

    /**
     * @var \GurwinderAntal\crs\Type\Response\Service[]|null
     */
    public $Services;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Profile[]|null
     */
    public $Profiles;

    /**
     * @var \GurwinderAntal\crs\Type\Common\RoomStay[]|null
     */
    public $RoomStays;

    /**
     * @var \GurwinderAntal\crs\Type\Response\HotelStay[]|null
     */
    public $HotelStays;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HotelSearchCriterion[]|null
     */
    public $Criteria;

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
   * @param array|null $Services
   * @param array|null $Profiles
   * @param array|null $RoomStays
   * @param \GurwinderAntal\crs\Type\Response\HotelStay|null $HotelStays
   * @param array|null $Criteria
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
    ?array $Services,
    ?array $Profiles,
    ?array $RoomStays,
    ?array $HotelStays,
    ?array $Criteria
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->Services = $Services;
    $this->Profiles = $Profiles;
    $this->RoomStays = $RoomStays;
    $this->HotelStays = $HotelStays;
    $this->Criteria = $Criteria;
  }

}

