<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class TPA_Extensions
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class TPA_Extensions {

    /**
     * Currently unused.
     */
    public $Image;

    /**
     * Currently unused.
     */
    public $Security;

    /**
     * Currently unused.
     */
    public $GuaranteeDetails;

    /**
     * Currently unused.
     */
    public $SourceOfBusiness;

    /**
     * Currently unused.
     */
    public $MarketSegment;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HotelReferenceGroup|null
     */
    public $BasicPropertyInfo;

    /**
     * Currently unused.
     */
    public $Warnings;

    /**
     * Currently unused.
     */
    public $Success;

    /**
     * Currently unused.
     */
    public $ResStatus;

    /**
     * Currently unused.
     */
    public $WrittenConfInst;

    /**
     * Currently unused.
     */
    public $NightlyRate;

    /**
     * Currently unused.
     */
    public $DiscountedNightlyRate;

    /**
     * Currently unused.
     */
    public $ChildAges;

    /**
     * Currently unused.
     */
    public $RedemptionDetail;

    /**
     * Currently unused.
     */
    public $TotalType;

    /**
     * Currently unused.
     */
    public $IsReserved;

    /**
     * Currently unused.
     */
    public $CampaignDetails;

    /**
     * Currently unused.
     */
    public $BaseRate;

    /**
     * Currently unused.
     */
    public $DerivedFormula;

    /**
     * Currently unused.
     */
    public $TokenInfo;

    /**
     * Currently unused.
     */
    public $BookingChannel;

    /**
     * Currently unused.
     */
    public $StaggeredCancelPolicies;

    /**
     * @var bool|null
     */
    public $ADACompliantIndicator;

    /**
     * TPA_Extensions constructor.
     *
     * @param $Image
     * @param $Security
     * @param $GuaranteeDetails
     * @param $SourceOfBusiness
     * @param $MarketSegment
     * @param \GurwinderAntal\crs\Type\Common\HotelReferenceGroup|null $BasicPropertyInfo
     * @param $Warnings
     * @param $Success
     * @param $ResStatus
     * @param $WrittenConfInst
     * @param $NightlyRate
     * @param $DiscountedNightlyRate
     * @param $ChildAges
     * @param $RedemptionDetail
     * @param $TotalType
     * @param $IsReserved
     * @param $CampaignDetails
     * @param $BaseRate
     * @param $DerivedFormula
     * @param $TokenInfo
     * @param $BookingChannel
     * @param $StaggeredCancelPolicies
     * @param bool|null $ADACompliantIndicator
     */
    public function __construct(
        $Image,
        $Security,
        $GuaranteeDetails,
        $SourceOfBusiness,
        $MarketSegment,
        ?HotelReferenceGroup $BasicPropertyInfo,
        $Warnings,
        $Success,
        $ResStatus,
        $WrittenConfInst,
        $NightlyRate,
        $DiscountedNightlyRate,
        $ChildAges,
        $RedemptionDetail,
        $TotalType,
        $IsReserved,
        $CampaignDetails,
        $BaseRate,
        $DerivedFormula,
        $TokenInfo,
        $BookingChannel,
        $StaggeredCancelPolicies,
        ?bool $ADACompliantIndicator
    ) {
        $this->Image = $Image;
        $this->Security = $Security;
        $this->GuaranteeDetails = $GuaranteeDetails;
        $this->SourceOfBusiness = $SourceOfBusiness;
        $this->MarketSegment = $MarketSegment;
        $this->BasicPropertyInfo = $BasicPropertyInfo;
        $this->Warnings = $Warnings;
        $this->Success = $Success;
        $this->ResStatus = $ResStatus;
        $this->WrittenConfInst = $WrittenConfInst;
        $this->NightlyRate = $NightlyRate;
        $this->DiscountedNightlyRate = $DiscountedNightlyRate;
        $this->ChildAges = $ChildAges;
        $this->RedemptionDetail = $RedemptionDetail;
        $this->TotalType = $TotalType;
        $this->IsReserved = $IsReserved;
        $this->CampaignDetails = $CampaignDetails;
        $this->BaseRate = $BaseRate;
        $this->DerivedFormula = $DerivedFormula;
        $this->TokenInfo = $TokenInfo;
        $this->BookingChannel = $BookingChannel;
        $this->StaggeredCancelPolicies = $StaggeredCancelPolicies;
        $this->ADACompliantIndicator = $ADACompliantIndicator;
    }

}
