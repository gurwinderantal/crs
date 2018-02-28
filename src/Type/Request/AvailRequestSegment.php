<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class AvailRequestSegment
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class AvailRequestSegment {

    /**
     * @var \GurwinderAntal\crs\Type\Request\StayDateRange|null
     */
    protected $StayDateRange;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RateRange|null
     */
    protected $RateRange;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RatePlanCandidate[]|null
     */
    protected $RatePlanCandidates;

    /**
     * Currently unused.
     */
    protected $Profiles;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RoomStayCandidate[]|null
     */
    protected $RoomStayCandidates;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HotelSearchCriterion[]|null
     */
    protected $HotelSearchCriteria;

    /**
     * Currently unused.
     */
    protected $TPA_Extensions;

    /**
     * @var null|string
     */
    protected $ResponseType;

    /**
     * @var null|string
     */
    protected $AvailReqType;

    /**
     * @var null|string
     */
    protected $MoreDataToken;

    /**
     * AvailRequestSegment constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\StayDateRange|null $StayDateRange
     * @param \GurwinderAntal\crs\Type\Request\RateRange|null $RateRange
     * @param array|null $RatePlanCandidates
     * @param $Profiles
     * @param array|null $RoomStayCandidates
     * @param array|null $HotelSearchCriteria
     * @param $TPA_Extensions
     * @param null|string $ResponseType
     * @param null|string $AvailReqType
     * @param null|string $MoreDataToken
     */
    public function __construct(
        ?StayDateRange $StayDateRange,
        ?RateRange $RateRange,
        ?array $RatePlanCandidates,
        $Profiles,
        ?array $RoomStayCandidates,
        ?array $HotelSearchCriteria,
        $TPA_Extensions,
        ?string $ResponseType,
        ?string $AvailReqType,
        ?string $MoreDataToken
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
