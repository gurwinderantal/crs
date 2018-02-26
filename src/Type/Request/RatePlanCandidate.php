<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RatePlanCandidate
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RatePlanCandidate {

    /**
     * @var \GurwinderAntal\crs\Type\Request\ArrivalPolicy|NULL
     */
    protected $ArrivalPolicy;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RatePlanCommission|NULL
     */
    protected $RatePlanCommission;

    /**
     * @var string|NULL
     */
    protected $PromotionCode;

    /**
     * @var string|NULL
     */
    protected $RatePlanCode;

    /**
     * @var string|NULL
     */
    protected $RatePlanType;

    /**
     * @var string|NULL
     */
    protected $RatePlanId;

    /**
     * @var string|NULL
     */
    protected $RatePlanQualifier;

    /**
     * @var string|NULL
     */
    protected $RatePlanCategory;

    /**
     * @var string|NULL
     */
    protected $RatePlanFilterCode;

    /**
     * RatePlanCandidate constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\ArrivalPolicy|NULL $ArrivalPolicy
     * @param \GurwinderAntal\crs\Type\Request\RatePlanCommission|NULL $RatePlanCommission
     * @param string|NULL $PromotionCode
     * @param string|NULL $RatePlanCode
     * @param string|NULL $RatePlanType
     * @param string|NULL $RatePlanId
     * @param string|NULL $RatePlanQualifier
     * @param string|NULL $RatePlanCategory
     * @param string|NULL $RatePlanFilterCode
     */
    public function __construct(
        ArrivalPolicy $ArrivalPolicy = NULL,
        RatePlanCommission $RatePlanCommission = NULL,
        string $PromotionCode = NULL,
        string $RatePlanCode = NULL,
        string $RatePlanType = NULL,
        string $RatePlanId = NULL,
        string $RatePlanQualifier = NULL,
        string $RatePlanCategory = NULL,
        string $RatePlanFilterCode = NULL
    ) {
        $this->ArrivalPolicy = $ArrivalPolicy;
        $this->RatePlanCommission = $RatePlanCommission;
        $this->PromotionCode = $PromotionCode;
        $this->RatePlanCode = $RatePlanCode;
        $this->RatePlanType = $RatePlanType;
        $this->RatePlanId = $RatePlanId;
        $this->RatePlanQualifier = $RatePlanQualifier;
        $this->RatePlanCategory = $RatePlanCategory;
        $this->RatePlanFilterCode = $RatePlanFilterCode;
    }

}
