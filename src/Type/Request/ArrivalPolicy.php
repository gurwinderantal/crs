<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class ArrivalPolicy
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ArrivalPolicy {

    /**
     * @var bool|null
     */
    protected $GuaranteePolicyIndicator;

    /**
     * @var bool|null
     */
    protected $DepositPolicyIndicator;

    /**
     * @var bool|null
     */
    protected $HoldTimePolicyIndicator;

    /**
     * ArrivalPolicy constructor.
     *
     * @param bool|null $GuaranteePolicyIndicator
     * @param bool|null $DepositPolicyIndicator
     * @param bool|null $HoldTimePolicyIndicator
     */
    public function __construct(
        ?bool $GuaranteePolicyIndicator,
        ?bool $DepositPolicyIndicator,
        ?bool $HoldTimePolicyIndicator
    ) {
        $this->GuaranteePolicyIndicator = $GuaranteePolicyIndicator;
        $this->DepositPolicyIndicator = $DepositPolicyIndicator;
        $this->HoldTimePolicyIndicator = $HoldTimePolicyIndicator;
    }

}
