<?php

namespace GurwinderAntal\crs\DataType\HotelAvailRQ;

/**
 * Class RoomStayCandidate
 *
 * @package GurwinderAntal\crs\DataType\HotelAvailRQ
 */
class RoomStayCandidate {

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var \GurwinderAntal\crs\DataType\HotelAvailRQ\GuestCount[]
     */
    protected $guestCounts;

    /**
     * RoomStayCandidate constructor.
     *
     * @param $quantity
     * @param $guestCounts
     */
    public function __construct($quantity, $guestCounts) {
        $this->quantity = $quantity;
        $this->guestCounts = $guestCounts;
    }

    /**
     * @return array
     */
    public function getRequestData() {
        $data = [
            'Quantity'    => $this->quantity,
            'GuestCounts' => [
                'GuestCount' => [],
            ],
        ];
        foreach ($this->guestCounts as $guestCount) {
            $data['GuestCounts']['GuestCount'][] = $guestCount->getRequestData();
        }
        return $data;
    }

}
