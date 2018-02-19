<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class Source
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class Source {

    /**
     * @var \GurwinderAntal\crs\Type\Request\BookingChannel
     */
    protected $BookingChannel;

    /**
     * @var \GurwinderAntal\crs\Type\Request\RequestorID
     */
    protected $RequestorId;

    /**
     * Source constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\BookingChannel $BookingChannel
     * @param \GurwinderAntal\crs\Type\Request\RequestorID $RequestorId
     */
    public function __construct(
        BookingChannel $BookingChannel = NULL,
        RequestorID $RequestorId = NULL
    ) {
        $this->BookingChannel = $BookingChannel;
        $this->RequestorId = $RequestorId;
    }

}
