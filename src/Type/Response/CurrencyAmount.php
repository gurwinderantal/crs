<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class CurrencyAmount
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class CurrencyAmount {

  /**
   * @var float|null
   */
  public $Amount;

  /**
   * @var string|null
   */
  public $CurrencyCode;

  /**
   * @var int|null
   */
  public $DecimalPlaces;

  /**
   * CurrencyAmount constructor.
   *
   * @param float|null $Amount
   * @param null|string $CurrencyCode
   * @param int|null $DecimalPlaces
   */
  public function __construct(
    ?float $Amount,
    ?string $CurrencyCode,
    ?int $DecimalPlaces
  ) {
    $this->Amount = $Amount;
    $this->CurrencyCode = $CurrencyCode;
    $this->DecimalPlaces = $DecimalPlaces;
  }

}
