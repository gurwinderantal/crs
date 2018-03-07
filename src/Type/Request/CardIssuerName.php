<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class CardIssuerName
 *
 * @package GurwinderAntal\crs\Type\Request
 */

namespace GurwinderAntal\crs\Type\Request;

class CardIssuerName {

  /**
   * @var string|null
   */
  protected $BankID;

  /**
   * CardIssuerName constructor.
   *
   * @param string|null $BankID
   */
  public function __construct(
    ?string $BankID
  ) {
    $this->BankID = $BankID;
  }

}
