<?php

namespace GurwinderAntal\crs\Type\Common;

use GurwinderAntal\crs\Type\Common\GuestCounts;

/**
 * Class RoomStay
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class RoomStay {

    /**
     * Currently unused.
     */
    public $Guarantee;

    /**
     * Currently unused.
     */
    public $CancelPenalties;

    /**
     * Currently unused.
     */
    public $TPA_Extensions;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Total|null
     */
    public $Total;

    /**
     * @var \GurwinderAntal\crs\Type\Common\RoomType[]|null
     */
    public $RoomTypes;

    /**
     * @var \GurwinderAntal\crs\Type\Common\RatePlan[]|null
     */
    public $RatePlans;

    /**
     * @var \GurwinderAntal\crs\Type\Common\RoomRate[]|null
     */
    public $RoomRates;

    /**
     * @var \GurwinderAntal\crs\Type\Common\GuestCounts|null
     */
    public $GuestCounts;

    /**
     * @var \GurwinderAntal\crs\Type\Common\DateTimeSpan|null
     */
    public $TimeSpan;

    /**
     * Currently unused.
     */
    public $SpecialRequests;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HotelReferenceGroup|null
     */
    public $BasicPropertyInfo;

    /**
     * Currently unused.
     */
    public $Comments;

    /**
     * Currently unused.
     */
    public $DepositPayments;

    /**
     * @var \GurwinderAntal\crs\Type\Common\ResGuestRPH[]|null
     */
    public $ResGuestRPHs;

    /**
     * Currently unused.
     */
    public $ServiceRPHs;

    /**
     * Currently unused.
     */
    public $Memberships;

    /**
     * @var string
     */
    public $MarketCode;

    /**
     * @var string
     */
    public $SourceOfBusiness;

    /**
     * @var string
     */
    public $IndexNumber;

    /**
     * RoomStay constructor.
     *
     * @param $Guarantee
     * @param $CancelPenalties
     * @param $TPA_Extensions
     * @param \GurwinderAntal\crs\Type\Common\Total|null $Total
     * @param \GurwinderAntal\crs\Type\Common\RoomType[]|null $RoomTypes
     * @param \GurwinderAntal\crs\Type\Common\RatePlan[]|null $RatePlans
     * @param \GurwinderAntal\crs\Type\Common\RoomRate[]|null $RoomRates
     * @param \GurwinderAntal\crs\Type\Common\GuestCounts|null $GuestCounts
     * @param \GurwinderAntal\crs\Type\Common\DateTimeSpan|null $TimeSpan
     * @param $SpecialRequests
     * @param \GurwinderAntal\crs\Type\Common\HotelReferenceGroup|null $BasicPropertyInfo
     * @param $Comments
     * @param $DepositPayments
     * @param \GurwinderAntal\crs\Type\Common\ResGuestRPH[]|null $ResGuestRPHs
     * @param $ServiceRPHs
     * @param $Memberships
     * @param null|string $MarketCode
     * @param null|string $SourceOfBusiness
     * @param null|string $IndexNumber
     */
    public function __construct(
        $Guarantee,
        $CancelPenalties,
        $TPA_Extensions,
        ?Total $Total,
        ?array $RoomTypes,
        ?array $RatePlans,
        ?array $RoomRates,
        ?GuestCounts $GuestCounts,
        ?DateTimeSpan $TimeSpan,
        $SpecialRequests,
        ?HotelReferenceGroup $BasicPropertyInfo,
        $Comments,
        $DepositPayments,
        ?array $ResGuestRPHs,
        $ServiceRPHs,
        $Memberships,
        ?string $MarketCode,
        ?string $SourceOfBusiness,
        ?string $IndexNumber
    ) {
        $this->Guarantee = $Guarantee;
        $this->CancelPenalties = $CancelPenalties;
        $this->TPA_Extensions = $TPA_Extensions;
        $this->Total = $Total;
        $this->RoomTypes = $RoomTypes;
        $this->RatePlans = $RatePlans;
        $this->RoomRates = $RoomRates;
        $this->GuestCounts = $GuestCounts;
        $this->TimeSpan = $TimeSpan;
        $this->SpecialRequests = $SpecialRequests;
        $this->BasicPropertyInfo = $BasicPropertyInfo;
        $this->Comments = $Comments;
        $this->DepositPayments = $DepositPayments;
        $this->ResGuestRPHs = $ResGuestRPHs;
        $this->ServiceRPHs = $ServiceRPHs;
        $this->Memberships = $Memberships;
        $this->MarketCode = $MarketCode;
        $this->SourceOfBusiness = $SourceOfBusiness;
        $this->IndexNumber = $IndexNumber;
    }

}
