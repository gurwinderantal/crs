<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class RatePlan
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class RatePlan {

    /**
     * @var \GurwinderAntal\crs\Type\Common\Paragraph|null
     */
    public $RatePlanDescription;

    /**
     * Currently unused.
     */
    public $Guarantee;

    /**
     * Currently unused.
     */
    public $Rates;

    /**
     * Currently unused.
     */
    public $CancelPenalties;

    /**
     * Currently unused.
     */
    public $Commission;

    /**
     * Currently unused.
     */
    public $AdditionalDetails;

    /**
     * @var \GurwinderAntal\crs\Type\Common\RatePlanInclusions|null
     */
    public $RatePlanInclusions;

    /**
     * Currently unused.
     */
    public $MealsIncluded;

    /**
     * @var null|string
     */
    public $RatePlanCode;

    /**
     * @var null|string
     */
    public $RatePlanName;

    /**
     * @var bool|null
     */
    public $AccrualIndicator;

    /**
     * @var bool|null
     */
    public $AutoEnrollmentIndicator;

    /**
     * @var null|string
     */
    public $BookingCode;

    /**
     * @var null|string
     */
    public $RatePlanType;

    /**
     * @var null|string
     */
    public $RatePlanID;

    /**
     * @var null|string
     */
    public $EffectiveDate;

    /**
     * @var null|string
     */
    public $ExpireDate;

    /**
     * @var null|string
     */
    public $CurrencyCode;

    /**
     * @var null|string
     */
    public $TaxInclusive;

    /**
     * @var bool|null
     */
    public $PrepaidIndicator;

    /**
     * @var null|string
     */
    public $RatePlanCategory;

    /**
     * @var null|string
     */
    public $AvailabilityStatus;

    /**
     * @var bool|null
     */
    public $PriceViewableInd;

    /**
     * RatePlan constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\Paragraph|null $RatePlanDescription
     * @param $Guarantee
     * @param $Rates
     * @param $CancelPenalties
     * @param $Commission
     * @param $AdditionalDetails
     * @param \GurwinderAntal\crs\Type\Common\RatePlanInclusions|null $RatePlanInclusions
     * @param $MealsIncluded
     * @param null|string $RatePlanCode
     * @param null|string $RatePlanName
     * @param bool|null $AccrualIndicator
     * @param bool|null $AutoEnrollmentIndicator
     * @param null|string $BookingCode
     * @param null|string $RatePlanType
     * @param null|string $RatePlanID
     * @param null|string $EffectiveDate
     * @param null|string $ExpireDate
     * @param null|string $CurrencyCode
     * @param null|string $TaxInclusive
     * @param bool|null $PrepaidIndicator
     * @param null|string $RatePlanCategory
     * @param null|string $AvailabilityStatus
     * @param bool|null $PriceViewableInd
     */
    public function __construct(
        ?Paragraph $RatePlanDescription,
        $Guarantee,
        $Rates,
        $CancelPenalties,
        $Commission,
        $AdditionalDetails,
        ?RatePlanInclusions $RatePlanInclusions,
        $MealsIncluded,
        ?string $RatePlanCode,
        ?string $RatePlanName,
        ?bool $AccrualIndicator,
        ?bool $AutoEnrollmentIndicator,
        ?string $BookingCode,
        ?string $RatePlanType,
        ?string $RatePlanID,
        ?string $EffectiveDate,
        ?string $ExpireDate,
        ?string $CurrencyCode,
        ?string $TaxInclusive,
        ?bool $PrepaidIndicator,
        ?string $RatePlanCategory,
        ?string $AvailabilityStatus,
        ?bool $PriceViewableInd
    ) {
        $this->RatePlanDescription = $RatePlanDescription;
        $this->Guarantee = $Guarantee;
        $this->Rates = $Rates;
        $this->CancelPenalties = $CancelPenalties;
        $this->Commission = $Commission;
        $this->AdditionalDetails = $AdditionalDetails;
        $this->RatePlanInclusions = $RatePlanInclusions;
        $this->MealsIncluded = $MealsIncluded;
        $this->RatePlanCode = $RatePlanCode;
        $this->RatePlanName = $RatePlanName;
        $this->AccrualIndicator = $AccrualIndicator;
        $this->AutoEnrollmentIndicator = $AutoEnrollmentIndicator;
        $this->BookingCode = $BookingCode;
        $this->RatePlanType = $RatePlanType;
        $this->RatePlanID = $RatePlanID;
        $this->EffectiveDate = $EffectiveDate;
        $this->ExpireDate = $ExpireDate;
        $this->CurrencyCode = $CurrencyCode;
        $this->TaxInclusive = $TaxInclusive;
        $this->PrepaidIndicator = $PrepaidIndicator;
        $this->RatePlanCategory = $RatePlanCategory;
        $this->AvailabilityStatus = $AvailabilityStatus;
        $this->PriceViewableInd = $PriceViewableInd;
    }

}
