<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class CancelRule
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class CancelRule {

  /**
   * @var float|null
   */
  protected $Amount;

  /**
   * @var string|null
   */
  protected $CurrencyCode;

  /**
   * CancelRule constructor.
   *
   * @param float|null $Amount
   * @param string|null $CurrencyCode
   */
  public function __construct(
    ?float $Amount,
    ?string $CurrencyCode
  ) {
    $this->Amount = $Amount;
    $this->CurrencyCode = $CurrencyCode;
  }

}
