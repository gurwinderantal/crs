<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class OTA_CancelRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_CancelRQ extends OtaRequestMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
   */
  protected $UniqueID;

  /**
   * @var \GurwinderAntal\crs\Type\Request\Verification|null
   */
  protected $Verification;

  /**
   * @var \GurwinderAntal\crs\Type\Request\POS|null
   */
  protected $POS;

  /**
   * @var \GurwinderAntal\crs\Type\Request\ContactPerson|null
   */
  protected $CancellationContactPerson;

  /**
   * @var \GurwinderAntal\crs\Type\Common\Reason[]|null
   */
  protected $Reasons;

  /**
   * @var string|null
   */
  protected $CancelType;

  /**
   * OTA_CancelRQ constructor.
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
   * @param \GurwinderAntal\crs\Type\Request\Verification|null $Verification
   * @param \GurwinderAntal\crs\Type\Request\POS|null $POS
   * @param \GurwinderAntal\crs\Type\Request\ContactPerson|null $CancellationContactPerson
   * @param \GurwinderAntal\crs\Type\Common\Reason[]|null $Reasons
   * @param string|null $CancelType
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
    ?Verification $Verification,
    ?POS $POS,
    ?ContactPerson $CancellationContactPerson,
    ?array $Reasons,
    ?string $CancelType
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->UniqueID = $UniqueID;
    $this->Verification = $Verification;
    $this->POS = $POS;
    $this->CancellationContactPerson = $CancellationContactPerson;
    $this->Reasons = $Reasons;
    $this->CancelType = $CancelType;
  }

}
