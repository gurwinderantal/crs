<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class AvailRequestSegment
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class AvailRequestSegment {

    /**
     * @var \GurwinderAntal\crs\Type\Request\StayDateRange
     */
    protected $StayDateRange;

    /**
     * Currently unused.
     * @var
     */
    protected $RateRange;

    /**
     * Currently unused.
     * @var
     */
    protected $RatePlanCandidates;

    /**
     * Currently unused.
     * @var
     */
    protected $Profiles;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RoomStayCandidate[]
     */
    protected $RoomStayCandidates;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HotelSearchCriterion[]
     */
    protected $HotelSearchCriteria;

    /**
     * Currently unused.
     * @var
     */
    protected $TPA_Extensions;

    /**
     * @var string
     */
    protected $ResponseType;

    /**
     * @var string
     */
    protected $AvailReqType;

    /**
     * @var string
     */
    protected $MoreDataToken;

    /**
     * AvailRequestSegment constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\StayDateRange $StayDateRange
     * @param $RateRange
     * @param $RatePlanCandidates
     * @param $Profiles
     * @param \GurwinderAntal\crs\Type\Request\RoomStayCandidate[] $RoomStayCandidates
     * @param \GurwinderAntal\crs\Type\Common\HotelSearchCriterion[] $HotelSearchCriteria
     * @param $TPA_Extensions
     * @param string $ResponseType
     * @param string $AvailReqType
     * @param string $MoreDataToken
     */
    public function __construct(
        StayDateRange $StayDateRange,
        $RateRange,
        $RatePlanCandidates,
        $Profiles,
        array $RoomStayCandidates,
        array $HotelSearchCriteria,
        $TPA_Extensions,
        string $ResponseType,
        string $AvailReqType,
        string $MoreDataToken
    ) {
        $this->StayDateRange = $StayDateRange;
        $this->RateRange = $RateRange;
        $this->RatePlanCandidates = $RatePlanCandidates;
        $this->Profiles = $Profiles;
        $this->RoomStayCandidates = $RoomStayCandidates;
        $this->HotelSearchCriteria = $HotelSearchCriteria;
        $this->TPA_Extensions = $TPA_Extensions;
        $this->ResponseType = $ResponseType;
        $this->AvailReqType = $AvailReqType;
        $this->MoreDataToken = $MoreDataToken;
    }

}
