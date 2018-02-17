<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class BookingChannel
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class BookingChannel {

    /**
     * @var \GurwinderAntal\crs\Type\Request\CompanyName
     */
    protected $CompanyName;

    /**
     * @var string
     */
    protected $Primary;

    /**
     * @var string
     */
    protected $Type;

    /**
     * @var bool
     */
    protected $AnyBookingChannelInd;

    /**
     * BookingChannel constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\CompanyName $CompanyName
     * @param string $Primary
     * @param string $Type
     * @param bool $AnyBookingChannelInd
     */
    public function __construct(
        CompanyName $CompanyName,
        string $Primary,
        string $Type,
        bool $AnyBookingChannelInd
    ) {
        $this->CompanyName = $CompanyName;
        $this->Primary = $Primary;
        $this->Type;
        $this->AnyBookingChannelInd;
    }

}
