<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\DateTimeSpan;
use GurwinderAntal\crs\Type\Common\Total;

/**
 * Class ResGlobalInfo
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ResGlobalInfo {

    protected $Comments;

    protected $Guarantee;

    protected $Total;

    protected $BookingRules;

    protected $HotelReservationIDs;

    protected $Profiles;

    /**
     * @var \GurwinderAntal\crs\Type\Common\GuestCount[]
     */
    protected $GuestCounts;

    protected $TimeSpan;

    protected $SpecialRequests;

    protected $TPA_Extensions;

    protected $DepositPayments;

    /**
     * ResGlobalInfo constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\Comment[]|null $Comments
     * @param $Guarantee
     * @param \GurwinderAntal\crs\Type\Common\Total|null $Total
     * @param $BookingRules
     * @param $HotelReservationIDs
     * @param \GurwinderAntal\crs\Type\Request\ProfileInfo|null $Profiles
     * @param array|null $GuestCounts
     * @param \GurwinderAntal\crs\Type\Common\DateTimeSpan|null $TimeSpan
     * @param $SpecialRequests
     * @param $TPA_Extensions
     * @param $DepositPayments
     */
    public function __construct(
        ?array $Comments,
        $Guarantee,
        ?Total $Total,
        $BookingRules,
        $HotelReservationIDs,
        ?ProfileInfo $Profiles,
        ?array $GuestCounts,
        ?DateTimeSpan $TimeSpan,
        $SpecialRequests,
        $TPA_Extensions,
        $DepositPayments
    ) {
        $this->Comments = $Comments;
        $this->Guarantee = $Guarantee;
        $this->Total = $Total;
        $this->BookingRules = $BookingRules;
        $this->HotelReservationIDs = $HotelReservationIDs;
        $this->Profiles = $Profiles;
        $this->GuestCounts = $GuestCounts;
        $this->TimeSpan = $TimeSpan;
        $this->SpecialRequests = $SpecialRequests;
        $this->TPA_Extensions = $TPA_Extensions;
        $this->DepositPayments = $DepositPayments;
    }

}
