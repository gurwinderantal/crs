<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class Price
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class Price {

  /**
   * @var string|null
   */
  public $Start;

  /**
   * @var string|null
   */
  public $End;

  /**
   * @var string|null
   */
  public $AmountBeforeTax;

  /**
   * @var string|null
   */
  public $AmountAfterTax;

  /**
   * @var string|null
   */
  public $CurrencyCode;

  /**
   * @var string|null
   */
  public $Duration;

  /**
   * @var bool|null
   */
  public $MinIndicator;

  /**
   * @var bool|null
   */
  public $MaxIndicator;

  /**
   * Price constructor.
   *
   * @param null|string $Start
   * @param null|string $End
   * @param null|string $AmountBeforeTax
   * @param null|string $AmountAfterTax
   * @param null|string $CurrencyCode
   * @param null|string $Duration
   * @param bool|null $MinIndicator
   * @param bool|null $MaxIndicator
   */
  public function __construct(
    ?string $Start,
    ?string $End,
    ?string $AmountBeforeTax,
    ?string $AmountAfterTax,
    ?string $CurrencyCode,
    ?string $Duration,
    ?bool $MinIndicator,
    ?bool $MaxIndicator
  ) {
    $this->Start = $Start;
    $this->End = $End;
    $this->AmountBeforeTax = $AmountBeforeTax;
    $this->AmountAfterTax = $AmountAfterTax;
    $this->CurrencyCode = $CurrencyCode;
    $this->Duration = $Duration;
    $this->MinIndicator = $MinIndicator;
    $this->MaxIndicator = $MaxIndicator;
  }

}
