<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RatePlanCommission
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RatePlanCommission {

    /**
     * @var bool|null
     */
    protected $CommissionableIndicator;

    /**
     * @var null|string
     */
    protected $MinCommissionPercentage;

    /**
     * @var null|string
     */
    protected $MaxCommissionPercentage;

    /**
     * RatePlanCommission constructor.
     *
     * @param bool|null $CommissionableIndicator
     * @param null|string $MinCommissionPercentage
     * @param null|string $MaxCommissionPercentage
     */
    public function __construct(
        ?bool $CommissionableIndicator,
        ?string $MinCommissionPercentage,
        ?string $MaxCommissionPercentage
    ) {
        $this->CommissionableIndicator = $CommissionableIndicator;
        $this->MinCommissionPercentage = $MinCommissionPercentage;
        $this->MaxCommissionPercentage = $MaxCommissionPercentage;
    }

}
