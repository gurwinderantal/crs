<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class CustLoyalty
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class CustLoyalty {

  /**
   * @var string|null
   */
  protected $ProgramID;

  /**
   * @var string|null
   */
  protected $MembershipID;

  /**
   * CustLoyalty constructor.
   *
   * @param null|string $ProgramID
   * @param null|string $MembershipID
   */
  public function __construct(
    ?string $ProgramID,
    ?string $MembershipID
  ) {
    $this->ProgramID = $ProgramID;
    $this->MembershipID = $MembershipID;
  }

}
