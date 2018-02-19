<?php

namespace GurwinderAntal\crs\Type\Common;

use GurwinderAntal\crs\Type\Request\StayDateRange;

/**
 * Class HotelSearchCriterion
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class HotelSearchCriterion {

    /**
     * Currently unused.
     * @var
     */
    public $RatePlanCandidates;

    /**
     * Currently unused.
     * @var
     */
    public $Position;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HotelReferenceGroup
     */
    public $HotelRef;

    /**
     * Currently unused.
     * @var
     */
    public $Radius;

    /**
     * @var \GurwinderAntal\crs\Type\Request\StayDateRange
     */
    public $StayDateRange;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RoomStayCandidate[]
     */
    public $RoomStayCandidates;

    /**
     * Currently unused.
     * @var
     */
    public $AcceptedPayments;

    /**
     * HotelSearchCriterion constructor.
     *
     * @param $RatePlanCandidates
     * @param $Position
     * @param \GurwinderAntal\crs\Type\Common\HotelReferenceGroup $HotelRef
     * @param $Radius
     * @param \GurwinderAntal\crs\Type\Request\StayDateRange $StayDateRange
     * @param \GurwinderAntal\crs\Type\Request\RoomStayCandidate[] $RoomStayCandidates
     * @param $AcceptedPayments
     */
    public function __construct(
        $RatePlanCandidates = NULL,
        $Position = NULL,
        HotelReferenceGroup $HotelRef = NULL,
        $Radius = NULL,
        StayDateRange $StayDateRange = NULL,
        array $RoomStayCandidates = NULL,
        $AcceptedPayments = NULL
    ) {
        $this->RatePlanCandidates = $RatePlanCandidates;
        $this->Position = $Position;
        $this->HotelRef = $HotelRef;
        $this->Radius = $Radius;
        $this->StayDateRange = $StayDateRange;
        $this->RoomStayCandidates = $RoomStayCandidates;
        $this->AcceptedPayments = $AcceptedPayments;
    }

}
