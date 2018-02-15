<?php

namespace GurwinderAntal\crs\DataType\HotelAvailRQ;

/**
 * Class Criterion
 *
 * @package GurwinderAntal\crs\DataType\HotelAvailRQ
 */
class Criterion {

    /**
     * @var string
     */
    protected $hotelCode;

    /**
     * HotelRef constructor.
     *
     * @param $hotelCode
     */
    public function __construct($hotelCode) {
        $this->hotelCode = $hotelCode;
    }

    /**
     * @return array
     */
    public function getRequestedData() {
        return [
            'HotelRef' => [
                'HotelCode' => $this->hotelCode,
            ],
        ];
    }

}
