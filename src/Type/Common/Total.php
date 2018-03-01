<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Total
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class Total {

    /**
     * @var array|\GurwinderAntal\crs\Type\Common\Tax[]|null
     */
    public $Taxes;

    /**
     * Currently unused.
     */
    public $DiscountReason;

    /**
     * @var bool
     */
    public $TaxInclusive;

    /**
     * @var null|string
     */
    public $AmountBeforeTax;

    /**
     * @var null|string
     */
    public $AmountAfterTax;

    /**
     * @var null|string
     */
    public $CurrencyCode;

    /**
     * @var int|null
     */
    public $DecimalPlaces;

    /**
     * @var null|string
     */
    public $ItemRPH;

    /**
     * Currently unused.
     */
    public $TPA_Extensions;

    /**
     * Total constructor.
     *
     * @param array|null $Taxes
     * @param $DiscountReason
     * @param bool|null $TaxInclusive
     * @param null|string $AmountBeforeTax
     * @param null|string $AmountAfterTax
     * @param null|string $CurrencyCode
     * @param int|null $DecimalPlaces
     * @param null|string $ItemRPH
     * @param $TPA_Extensions
     */
    public function __construct(
        ?array $Taxes,
        $DiscountReason,
        ?bool $TaxInclusive,
        ?string $AmountBeforeTax,
        ?string $AmountAfterTax,
        ?string $CurrencyCode,
        ?int $DecimalPlaces,
        ?string $ItemRPH,
        $TPA_Extensions
    ) {
        $this->Taxes = $Taxes;
        $this->DiscountReason = $DiscountReason;
        $this->TaxInclusive = $TaxInclusive;
        $this->AmountBeforeTax = $AmountBeforeTax;
        $this->AmountAfterTax = $AmountAfterTax;
        $this->CurrencyCode = $CurrencyCode;
        $this->DecimalPlaces = $DecimalPlaces;
        $this->ItemRPH = $ItemRPH;
        $this->TPA_Extensions = $TPA_Extensions;
    }

}
