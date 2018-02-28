<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class BookingChannel
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class BookingChannel {

    /**
     * @var \GurwinderAntal\crs\Type\Request\CompanyName|null
     */
    protected $CompanyName;

    /**
     * @var null|string
     */
    protected $Primary;

    /**
     * @var null|string
     */
    protected $Type;

    /**
     * @var bool|null
     */
    protected $AnyBookingChannelInd;

    /**
     * BookingChannel constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\CompanyName|null $CompanyName
     * @param null|string $Primary
     * @param null|string $Type
     * @param bool|null $AnyBookingChannelInd
     */
    public function __construct(
        ?CompanyName $CompanyName,
        ?string $Primary,
        ?string $Type,
        ?bool $AnyBookingChannelInd
    ) {
        $this->CompanyName = $CompanyName;
        $this->Primary = $Primary;
        $this->Type = $Type;
        $this->AnyBookingChannelInd = $AnyBookingChannelInd;
    }

}
