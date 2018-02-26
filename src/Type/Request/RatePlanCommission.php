<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RatePlanCommission
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RatePlanCommission {

    /**
     * @var bool
     */
    protected $CommissionableIndicator;

    /**
     * @var string
     */
    protected $MinCommissionPercentage;

    /**
     * @var string
     */
    protected $MaxCommissionPercentage;

    /**
     * RatePlanCommission constructor.
     *
     * @param bool|NULL $CommissionableIndicator
     * @param string|NULL $MinCommissionPercentage
     * @param string|NULL $MaxCommissionPercentage
     */
    public function __construct(
        bool $CommissionableIndicator = NULL,
        string $MinCommissionPercentage = NULL,
        string $MaxCommissionPercentage = NULL
    ) {
        $this->CommissionableIndicator = $CommissionableIndicator;
        $this->MinCommissionPercentage = $MinCommissionPercentage;
        $this->MaxCommissionPercentage = $MaxCommissionPercentage;
    }

}
