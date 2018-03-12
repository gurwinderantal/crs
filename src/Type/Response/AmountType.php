<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\Total;

/**
 * Class AmountType
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class AmountType {

  /**
   * @var \GurwinderAntal\crs\Type\Common\Total
   */
  protected $Base;

  /**
   * @var \GurwinderAntal\crs\Type\Response\AdditionalGuestAmount|null
   */
  protected $AdditionalGuestAmounts;

  /**
   * @var \GurwinderAntal\crs\Type\Common\Total|null
   */
  protected $Discount;

  /**
   * @var string|null
   */
  protected $EffectiveDate;

  /**
   * @var string|null
   */
  protected $ExpireDate;

  /**
   * AmountType constructor.
   *
   * @param \GurwinderAntal\crs\Type\Common\Total $Base
   * @param \GurwinderAntal\crs\Type\Response\AdditionalGuestAmount|null $AdditionalGuestAmounts
   * @param \GurwinderAntal\crs\Type\Common\Total|null $Discount
   * @param null|string $EffectiveDate
   * @param null|string $ExpireDate
   */
  public function __construct(
    ?Total $Base,
    ?AdditionalGuestAmount $AdditionalGuestAmounts,
    ?Total $Discount,
    ?string $EffectiveDate,
    ?string $ExpireDate) {
    $this->Base = $Base;
    $this->AdditionalGuestAmounts = $AdditionalGuestAmounts;
    $this->Discount = $Discount;
    $this->EffectiveDate = $EffectiveDate;
    $this->ExpireDate = $ExpireDate;
  }


}
