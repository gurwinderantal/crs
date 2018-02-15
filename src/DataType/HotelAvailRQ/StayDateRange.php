<?php

namespace GurwinderAntal\crs\DataType\HotelAvailRQ;

/**
 * Class StayDateRange
 *
 * @package GurwinderAntal\crs\DataType\HotelAvailRQ
 */
class StayDateRange {

    /**
     * @var string
     */
    protected $start;

    /**
     * @var string
     */
    protected $end;

    /**
     * StayDateRange constructor.
     *
     * @param $start
     * @param $end
     */
    public function __construct($start, $end) {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return array
     */
    public function getRequestData() {
        return [
            'Start' => $this->start,
            'End'   => $this->end,
        ];
    }

}
