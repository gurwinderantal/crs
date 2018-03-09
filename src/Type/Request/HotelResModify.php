<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class HotelResModify
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class HotelResModify extends HotelReservation {

  /**
   * @var \GurwinderAntal\crs\Type\Request\Verification|null
   */
  protected $Verification;

  /**
   * HotelResModify constructor.
   *
   * @param null|string $EchoToken
   * @param null|string $PrimaryLangID
   * @param null|string $AltLangID
   * @param null|string $TimeStamp
   * @param null|string $Target
   * @param null|string $Version
   * @param null|string $MessageContentCode
   * @param $TPA_Extensions
   * @param \GurwinderAntal\crs\Type\Request\Verification|null $Verification
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
    ?Verification $Verification
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->Verification = $Verification;
  }

}
