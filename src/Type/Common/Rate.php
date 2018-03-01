<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Rate
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Rate {

    /**
     * Currently unused.
     */
    public $CancelPenalties;

    /**
     * Currently unused.
     */
    public $PaymentPolicies;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Total|null
     */
    public $Base;

    /**
     * Currently unused.
     */
    public $Discount;

    /**
     * Currently unused.
     */
    public $AdditionalGuestAmounts;

    /**
     * Currently unused.
     */
    public $Fees;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Total|null
     */
    public $Total;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Tax[]|null
     */
    public $Taxes;

    /**
     * Currently unused.
     */
    public $TPA_Extensions;

    /**
     * @var null|string
     */
    public $RateTypeCode;

    /**
     * @var null|string
     */
    public $RateTimeUnit;

    /**
     * @var int|null
     */
    public $UnitMultiplier;

    /**
     * @var null|string
     */
    public $EffectiveDate;

    /**
     * @var null|string
     */
    public $ExpireDate;

    /**
     * Rate constructor.
     *
     * @param $CancelPenalties
     * @param $PaymentPolicies
     * @param \GurwinderAntal\crs\Type\Common\Total|null $Base
     * @param $Discount
     * @param $AdditionalGuestAmounts
     * @param $Fees
     * @param \GurwinderAntal\crs\Type\Common\Total|null $Total
     * @param \GurwinderAntal\crs\Type\Common\Tax[]|null $Taxes
     * @param $TPA_Extensions
     * @param null|string $RateTypeCode
     * @param null|string $RateTimeUnit
     * @param int|null $UnitMultiplier
     * @param null|string $EffectiveDate
     * @param null|string $ExpireDate
     */
    public function __construct(
        $CancelPenalties,
        $PaymentPolicies,
        ?Total $Base,
        $Discount,
        $AdditionalGuestAmounts,
        $Fees,
        ?Total $Total,
        ?array $Taxes,
        $TPA_Extensions,
        ?string $RateTypeCode,
        ?string $RateTimeUnit,
        ?int $UnitMultiplier,
        ?string $EffectiveDate,
        ?string $ExpireDate
    ) {
        $this->CancelPenalties = $CancelPenalties;
        $this->PaymentPolicies = $PaymentPolicies;
        $this->Base = $Base;
        $this->Discount = $Discount;
        $this->AdditionalGuestAmounts = $AdditionalGuestAmounts;
        $this->Fees = $Fees;
        $this->Total = $Total;
        $this->Taxes = $Taxes;
        $this->TPA_Extensions = $TPA_Extensions;
        $this->RateTypeCode = $RateTypeCode;
        $this->RateTimeUnit = $RateTimeUnit;
        $this->UnitMultiplier = $UnitMultiplier;
        $this->EffectiveDate = $EffectiveDate;
        $this->ExpireDate = $ExpireDate;
    }

}
