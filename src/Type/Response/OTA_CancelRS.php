<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Request\UniqueID;

/**
 * Class OTA_CancelRS
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_CancelRS extends OtaResponseMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
   */
  public $UniqueID;

  /**
   * @var CancelInfoRS|null
   */
  public $CancelInfoRS;

  /**
   * @var string|null
   */
  public $ResResponseType;

  /**
   * OTA_CancelRS constructor.
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
   * @param \GurwinderAntal\crs\Type\Response\CancelInfoRS|null $CancelInfoRS
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
    ?CancelInfoRS $CancelInfoRS,
    ?string $ResResponseType
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->UniqueID = $UniqueID;
    $this->CancelInfoRS = $CancelInfoRS;
    $this->ResResponseType = $ResResponseType;
  }

}
