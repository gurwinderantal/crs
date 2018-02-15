<?php

namespace GurwinderAntal\Synxis\DataType\HotelAvailRQ;

/**
 * Class Criterion
 *
 * @package GurwinderAntal\Synxis\DataType\HotelAvailRQ
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
