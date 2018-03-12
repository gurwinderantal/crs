<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class ReadRequest
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ReadRequest {

  /**
   * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
   */
  protected $UniqueID;

  /**
   * @var \GurwinderAntal\crs\Type\Request\Verification|null
   */
  protected $Verification;

  /**
   * @var \GurwinderAntal\crs\Type\Request\UserID|null
   */
  protected $UserID;

  /**
   * Currently unused.
   */
  protected $TPA_Extensions;

  /**
   * ReadRequest constructor.
   *
   * @param \GurwinderAntal\crs\Type\Request\UniqueID|null $UniqueID
   * @param \GurwinderAntal\crs\Type\Request\Verification|null $Verification,
   * @param \GurwinderAntal\crs\Type\Request\UserID|null $UserID,
   * @param $TPA_Extensions
   */
  public function __construct(
    ?UniqueID $UniqueID,
    ?Verification $Verification,
    ?UserID $UserID,
    $TPA_Extensions
  ) {
    $this->UniqueID = $UniqueID;
    $this->Verification = $Verification;
    $this->UserID = $UserID;
    $this->TPA_Extensions = $TPA_Extensions;
  }

}
