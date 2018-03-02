<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class Source
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class Source {

    /**
     * @var \GurwinderAntal\crs\Type\Request\BookingChannel|null
     */
    protected $BookingChannel;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RequestorID|null
     */
    protected $RequestorID;

    /**
     * Source constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\BookingChannel|null $BookingChannel
     * @param \GurwinderAntal\crs\Type\Request\RequestorID|null $RequestorId
     */
    public function __construct(
        ?BookingChannel $BookingChannel,
        ?RequestorID $RequestorId
    ) {
        $this->BookingChannel = $BookingChannel;
        $this->RequestorID = $RequestorId;
    }

}
