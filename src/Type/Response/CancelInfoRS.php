<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Request\UniqueID;

/**
 * Class CancelInfoRS
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class CancelInfoRS extends OtaResponseMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
   */
  protected $UniqueID;

  /**
   * @var CancelRules|null
   */
  protected $CancelRules;

  /**
   * CancelInfoRS constructor.
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
   * @param \GurwinderAntal\crs\Type\Response\CancelRules|null $CancelRules
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
    ?CancelRules $CancelRules
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->UniqueID = $UniqueID;
    $this->CancelRules = $CancelRules;
  }

}
