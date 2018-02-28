<?php

namespace GurwinderAntal\crs\Type\Common;

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
     * @var \GurwinderAntal\crs\Type\Common\Total
     */
    public $Total;

    public $RoomTypes;

    public $RatePlans;

    public $RoomRates;

    public $GuestCounts;

    public $TimeSpan;

    public $SpecialRequests;

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
     * Currently unused.
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

    public function __construct(
        $Guarantee,
        $CancelPenalties,
        $TPA_Extensions,
        Total $Total,
        $RoomTypes,
        $RatePlans,
        $RoomRates,
        $GuestCounts,
        $TimeSpan,
        $SpecialRequests,
        $BasicPropertyInfo,
        $Comments,
        $DepositPayments,
        $ResGuestRPHs,
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
