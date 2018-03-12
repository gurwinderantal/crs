<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class AmountPercent
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class AmountPercent {

  /**
   * @var string|null
   */
  protected $NmbrOfNightsn;

  /**
   * @var float|null
   */
  protected $Percentage;

  /**
   * @var float|null
   */
  protected $Percent;

  /**
   * @var string|null
   */
  protected $Amount;

  /**
   * @var string|null
   */
  protected $CurrencyCode;

  /**
   * @var bool|null
   */
  protected $TaxInclusive;

  /**
   * @var string|null
   */
  protected $AdjustedAmount;

  /**
   * @var string|null
   */
  protected $AdjustedPercentage;

  /**
   * AmountPercent constructor.
   *
   * @param null|string $NmbrOfNightsn
   * @param bool|null $Percentage
   * @param null|string $Amount
   * @param null|string $CurrencyCode
   * @param bool|null $TaxInclusive
   * @param null|string $AdjustedAmount
   * @param null|string $AdjustedPercentage
   */
  public function __construct(
    ?string $NmbrOfNightsn,
    ?bool $Percentage,
    ?string $Amount,
    ?string $CurrencyCode,
    ?bool $TaxInclusive,
    ?string $AdjustedAmount,
    ?string $AdjustedPercentage
  ) {
    $this->NmbrOfNightsn = $NmbrOfNightsn;
    $this->Percentage = $Percentage;
    $this->Amount = $Amount;
    $this->CurrencyCode = $CurrencyCode;
    $this->TaxInclusive = $TaxInclusive;
    $this->AdjustedAmount = $AdjustedAmount;
    $this->AdjustedPercentage = $AdjustedPercentage;
  }

}
