<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class ArrivalPolicy
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ArrivalPolicy {

    /**
     * @var bool|NULL
     */
    protected $GuaranteePolicyIndicator;

    /**
     * @var bool|NULL
     */
    protected $DepositPolicyIndicator;

    /**
     * @var bool|NULL
     */
    protected $HoldTimePolicyIndicator;

    /**
     * ArrivalPolicy constructor.
     *
     * @param bool|NULL $GuaranteePolicyIndicator
     * @param bool|NULL $DepositPolicyIndicator
     * @param bool|NULL $HoldTimePolicyIndicator
     */
    public function __construct(
        bool $GuaranteePolicyIndicator = NULL,
        bool $DepositPolicyIndicator = NULL,
        bool $HoldTimePolicyIndicator = NULL
    ) {
        $this->GuaranteePolicyIndicator = $GuaranteePolicyIndicator;
        $this->DepositPolicyIndicator = $DepositPolicyIndicator;
        $this->HoldTimePolicyIndicator = $HoldTimePolicyIndicator;
    }

}
