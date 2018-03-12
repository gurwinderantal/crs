<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\Tax;

/**
 * Class TaxesType
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class TaxesType {

  /**
   * @var \GurwinderAntal\crs\Type\Common\Tax
   */
  protected $Tax;

  /**
   * @var string|null
   */
  protected $Amount;

  /**
   * @var string|null
   */
  protected $CurrencyCode;

  /**
   * TaxesType constructor.
   *
   * @param \GurwinderAntal\crs\Type\Common\Tax|null $Tax
   * @param null|string $Amount
   * @param null|string $CurrencyCode
   */
  public function __construct(
    ?Tax $Tax,
    ?string $Amount,
    ?string $CurrencyCode
  ) {
    $this->Tax = $Tax;
    $this->Amount = $Amount;
    $this->CurrencyCode = $CurrencyCode;
  }

}
