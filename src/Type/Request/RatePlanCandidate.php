<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RatePlanCandidate
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RatePlanCandidate {

    /**
     * @var \GurwinderAntal\crs\Type\Request\ArrivalPolicy|null
     */
    protected $ArrivalPolicy;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RatePlanCommission|null
     */
    protected $RatePlanCommission;

    /**
     * @var null|string
     */
    protected $PromotionCode;

    /**
     * @var null|string
     */
    protected $RatePlanCode;

    /**
     * @var null|string
     */
    protected $RatePlanType;

    /**
     * @var null|string
     */
    protected $RatePlanId;

    /**
     * @var null|string
     */
    protected $RatePlanID;

    /**
     * @var null|string
     */
    protected $RatePlanQualifier;

    /**
     * @var null|string
     */
    protected $RatePlanCategory;

    /**
     * @var null|string
     */
    protected $RatePlanFilterCode;

    /**
     * RatePlanCandidate constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\ArrivalPolicy|null $ArrivalPolicy
     * @param \GurwinderAntal\crs\Type\Request\RatePlanCommission|null $RatePlanCommission
     * @param null|string $PromotionCode
     * @param null|string $RatePlanCode
     * @param null|string $RatePlanType
     * @param null|string $RatePlanId
     * @param null|string $RatePlanID
     * @param null|string $RatePlanQualifier
     * @param null|string $RatePlanCategory
     * @param null|string $RatePlanFilterCode
     */
    public function __construct(
        ?ArrivalPolicy $ArrivalPolicy,
        ?RatePlanCommission $RatePlanCommission,
        ?string $PromotionCode,
        ?string $RatePlanCode,
        ?string $RatePlanType,
        ?string $RatePlanId,
        ?string $RatePlanID,
        ?string $RatePlanQualifier,
        ?string $RatePlanCategory,
        ?string $RatePlanFilterCode
    ) {
        $this->ArrivalPolicy = $ArrivalPolicy;
        $this->RatePlanCommission = $RatePlanCommission;
        $this->PromotionCode = $PromotionCode;
        $this->RatePlanCode = $RatePlanCode;
        $this->RatePlanType = $RatePlanType;
        $this->RatePlanId = $RatePlanId;
        $this->RatePlanID = $RatePlanID;
        $this->RatePlanQualifier = $RatePlanQualifier;
        $this->RatePlanCategory = $RatePlanCategory;
        $this->RatePlanFilterCode = $RatePlanFilterCode;
    }

}
