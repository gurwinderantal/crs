<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\Total;

/**
 * Class AdditionalGuestAmount
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class AdditionalGuestAmount extends AgeQualifyingGroup {

  /**
   * @var \GurwinderAntal\crs\Type\Common\Total|null
   */
  protected $Amount;

  /**
   * @var \GurwinderAntal\crs\Type\Response\TaxesType|null
   */
  protected $Taxes;

  /**
   * @var float|null
   */
  protected $AmountBeforeTax;

  /**
   * @var string|null
   */
  protected $RPH;

  /**
   * @var bool|null
   */
  protected $TaxInclusive;

  /**
   * AdditionalGuestAmount constructor.
   *
   * @param null|string $AgeQualifyingCode
   * @param null|string $MinAge
   * @param null|string $MaxAge
   * @param null|string $AgeTimeUnit
   * @param \GurwinderAntal\crs\Type\Common\Total|null $Amount
   * @param \GurwinderAntal\crs\Type\Response\TaxesType|null $Taxes
   * @param float|null $AmountBeforeTax
   * @param null|string $RPH
   * @param bool|null $TaxInclusive
   */
  public function __construct(
    ?string $AgeQualifyingCode,
    ?string $MinAge,
    ?string $MaxAge,
    ?string $AgeTimeUnit,
    ?Total $Amount,
    ?TaxesType $Taxes,
    ?float $AmountBeforeTax,
    ?string $RPH,
    ?bool $TaxInclusive
  ) {
    parent::__construct($AgeQualifyingCode, $MinAge, $MaxAge, $AgeTimeUnit);
    $this->Amount = $Amount;
    $this->Taxes = $Taxes;
    $this->AmountBeforeTax = $AmountBeforeTax;
    $this->RPH = $RPH;
    $this->TaxInclusive = $TaxInclusive;
  }

}
