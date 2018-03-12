<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class HotelSearchCriterion
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class HotelSearchCriterion {

    /**
     * Currently unused.
     */
    public $RatePlanCandidates;

    /**
     * Currently unused.
     */
    public $Position;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HotelReferenceGroup|null
     */
    public $HotelRef;

    /**
     * Currently unused.
     */
    public $Radius;

    /**
     * @var \GurwinderAntal\crs\Type\Common\DateTimeSpan|null
     */
    public $StayDateRange;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RoomStayCandidate[]|null
     */
    public $RoomStayCandidates;

    /**
     * Currently unused.
     */
    public $AcceptedPayments;

    /**
     * @var string|null
    */
    public $ChainCode;

    /**
     * @var string|null
    */
    public $HotelCode;

    /**
     * HotelSearchCriterion constructor.
     *
     * @param $RatePlanCandidates
     * @param $Position
     * @param \GurwinderAntal\crs\Type\Common\HotelReferenceGroup|null $HotelRef
     * @param $Radius
     * @param \GurwinderAntal\crs\Type\Common\DateTimeSpan|null $StayDateRange
     * @param array|null $RoomStayCandidates
     * @param $AcceptedPayments
     * @param null|string $ChainCode
     * @param null|string $HotelCode
     */
    public function __construct(
        $RatePlanCandidates,
        $Position,
        ?HotelReferenceGroup $HotelRef,
        $Radius,
        ?DateTimeSpan $StayDateRange,
        ?array $RoomStayCandidates,
        $AcceptedPayments,
        ?string $ChainCode,
        ?string $HotelCode
    ) {
        $this->RatePlanCandidates = $RatePlanCandidates;
        $this->Position = $Position;
        $this->HotelRef = $HotelRef;
        $this->Radius = $Radius;
        $this->StayDateRange = $StayDateRange;
        $this->RoomStayCandidates = $RoomStayCandidates;
        $this->AcceptedPayments = $AcceptedPayments;
        $this->ChainCode = $ChainCode;
        $this->HotelCode = $HotelCode;
    }

}
