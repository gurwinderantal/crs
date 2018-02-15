<?php

namespace GurwinderAntal\crs\DataType\HotelAvailRQ;

/**
 * Class GuestCount
 *
 * @package GurwinderAntal\crs\DataType\HotelAvailRQ
 */
class GuestCount {

    /**
     * @var int
     */
    protected $ageQualifyingCode;

    /**
     * @var int
     */
    protected $count;

    /**
     * GuestCount constructor.
     *
     * @param $ageQualifyingCode
     * @param $count
     */
    public function __construct($ageQualifyingCode, $count) {
        $this->ageQualifyingCode = $ageQualifyingCode;
        $this->count = $count;
    }

    /**
     * @return array
     */
    public function getRequestData() {
        return [
            'AgeQualifyingCode' => $this->ageQualifyingCode,
            'Count'             => $this->count,
        ];
    }

}
