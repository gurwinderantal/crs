<?php

namespace GurwinderAntal\crs\DataType\HotelAvailRQ;

/**
 * Class AvailRequestSegment
 *
 * @package GurwinderAntal\crs\DataType\HotelAvailRQ
 */
class AvailRequestSegment {

    /**
     * @var string
     */
    protected $availReqType;

    /**
     * @var \GurwinderAntal\crs\DataType\HotelAvailRQ\StayDateRange
     */
    protected $stayDateRange;

    /**
     * @var \GurwinderAntal\crs\DataType\HotelAvailRQ\RoomStayCandidate[]
     */
    protected $roomStayCandidates;

    /**
     * @var \GurwinderAntal\crs\DataType\HotelAvailRQ\Criterion[]
     */
    protected $hotelSearchCriteria;

    /**
     * AvailRequestSegment constructor.
     *
     * @param $availReqType
     * @param $stayDateRange
     * @param $roomStayCandidates
     * @param $hotelSearchCriteria
     */
    public function __construct($availReqType, $stayDateRange, $roomStayCandidates, $hotelSearchCriteria) {
        $this->availReqType = $availReqType;
        $this->stayDateRange = $stayDateRange;
        $this->roomStayCandidates = $roomStayCandidates;
        $this->hotelSearchCriteria = $hotelSearchCriteria;
    }

    /**
     * @return array
     */
    public function getRequestData() {
        $data = [
            'AvailReqType'        => $this->availReqType,
            'StayDateRange'       => $this->stayDateRange->getRequestData(),
            'RoomStayCandidates'  => [
                'RoomStayCandidate' => [],
            ],
            'HotelSearchCriteria' => [
                'Criterion' => [],
            ],
        ];
        foreach ($this->roomStayCandidates as $roomStayCandidate) {
            $data['RoomStayCandidates']['RoomStayCandidate'][] = $roomStayCandidate->getRequestData();
        }
        foreach ($this->hotelSearchCriteria as $criterion) {
            $data['HotelSearchCriteria']['Criterion'][] = $criterion->getRequestedData();
        }
        return $data;
    }

}
