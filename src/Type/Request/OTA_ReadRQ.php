<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class OTA_ReadRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_ReadRQ extends OtaRequestMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\ReadRequests|null
   */
  protected $ReadRequests;

  /**
   * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
   */
  protected $UniqueID;

  /**
   * @var \GurwinderAntal\crs\Type\Request\POS|null;
   */
  protected $POS;

  /**
   * @var string|null
   */
  protected $ReturnListIndicator;

  /**
   * @var string|null
   */
  protected $PrimaryLangId;

  /**
   * @var int|null
   */
  protected $MaxResponses;

  /**
   * OTA_ReadRQ constructor.
   *
   * @param null|string $EchoToken
   * @param null|string $PrimaryLangID
   * @param null|string $AltLangID
   * @param null|string $TimeStamp
   * @param null|string $Target
   * @param null|string $Version
   * @param null|string $MessageContentCode
   * @param $TPA_Extensions
   * @param \GurwinderAntal\crs\Type\Request\ReadRequests|null $ReadRequests
   * @param \GurwinderAntal\crs\Type\Request\UniqueID|null $UniqueID
   * @param \GurwinderAntal\crs\Type\Request\POS|null $POS
   * @param string|null $ReturnListIndicator
   * @param string|null $PrimaryLangId
   * @param int|null $MaxResponses
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
    ?ReadRequests $ReadRequests,
    ?UniqueID $UniqueID,
    ?POS $POS,
    ?string $ReturnListIndicator,
    ?string $PrimaryLangId,
    ?int $MaxResponses
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->ReadRequests = $ReadRequests;
    $this->UniqueID = $UniqueID;
    $this->POS = $POS;
    $this->ReturnListIndicator = $ReturnListIndicator;
    $this->PrimaryLangId = $PrimaryLangId;
    $this->MaxResponses = $MaxResponses;
  }

}
