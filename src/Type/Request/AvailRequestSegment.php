<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class AvailRequestSegment
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class AvailRequestSegment {

    /**
     * @var \GurwinderAntal\crs\Type\Request\StayDateRange|NULL
     */
    protected $StayDateRange;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RateRange|NULL
     */
    protected $RateRange;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RatePlanCandidate[]|NULL
     */
    protected $RatePlanCandidates;

    /**
     * Currently unused.
     * @var
     */
    protected $Profiles;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RoomStayCandidate[]|NULL
     */
    protected $RoomStayCandidates;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HotelSearchCriterion[]|NULL
     */
    protected $HotelSearchCriteria;

    /**
     * Currently unused.
     * @var
     */
    protected $TPA_Extensions;

    /**
     * @var string|NULL
     */
    protected $ResponseType;

    /**
     * @var string|NULL
     */
    protected $AvailReqType;

    /**
     * @var string|NULL
     */
    protected $MoreDataToken;

    /**
     * AvailRequestSegment constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\StayDateRange|NULL $StayDateRange
     * @param \GurwinderAntal\crs\Type\Request\RateRange|NULL $RateRange
     * @param \GurwinderAntal\crs\Type\Request\RatePlanCandidate[]|NULL $RatePlanCandidates
     * @param $Profiles
     * @param array|NULL $RoomStayCandidates
     * @param array|NULL $HotelSearchCriteria
     * @param $TPA_Extensions
     * @param string|NULL $ResponseType
     * @param string|NULL $AvailReqType
     * @param string|NULL $MoreDataToken
     */
    public function __construct(
        StayDateRange $StayDateRange = NULL,
        RateRange $RateRange = NULL,
        array $RatePlanCandidates = NULL,
        $Profiles = NULL,
        array $RoomStayCandidates = NULL,
        array $HotelSearchCriteria = NULL,
        $TPA_Extensions = NULL,
        string $ResponseType = NULL,
        string $AvailReqType = NULL,
        string $MoreDataToken = NULL
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
