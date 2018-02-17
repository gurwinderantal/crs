<?php

namespace GurwinderAntal\crs\Type\shared;

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
    protected $RatePlanCandidates;

    /**
     * Currently unused.
     * @var
     */
    protected $Position;

    /**
     * @var \GurwinderAntal\crs\Type\Request\HotelReferenceGroup
     */
    protected $HotelRef;

    /**
     * Currently unused.
     * @var
     */
    protected $Radius;

    /**
     * @var \GurwinderAntal\crs\Type\Request\StayDateRange
     */
    protected $StayDateRange;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RoomStayCandidate[]
     */
    protected $RoomStayCandidates;

    /**
     * Currently unused.
     * @var
     */
    protected $AcceptedPayments;

    /**
     * HotelSearchCriterion constructor.
     *
     * @param $RatePlanCandidates
     * @param $Position
     * @param \GurwinderAntal\crs\Type\Request\HotelReferenceGroup $HotelRef
     * @param $Radius
     * @param \GurwinderAntal\crs\Type\Request\StayDateRange $StayDateRange
     * @param \GurwinderAntal\crs\Type\Request\RoomStayCandidate[] $RoomStayCandidates
     * @param $AcceptedPayments
     */
    public function __construct(
        $RatePlanCandidates,
        $Position,
        HotelReferenceGroup $HotelRef,
        $Radius,
        StayDateRange $StayDateRange,
        array $RoomStayCandidates,
        $AcceptedPayments
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
