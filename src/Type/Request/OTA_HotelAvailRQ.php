<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class OTA_HotelAvailRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelAvailRQ {

    /**
     * @var \GurwinderAntal\crs\Type\Request\POS
     */
    protected $POS;

    /**
     * @var \GurwinderAntal\crs\Type\Request\AvailRequestSegment[]
     */
    protected $AvailRequestSegments;

    /**
     * Currently unused.
     * @var
     */
    protected $HotelReservationIDs;

    /**
     * Required.
     *
     * @var int
     */
    protected $MaxResponses;

    /**
     * @var string
     */
    protected $RequestedCurrency;

    /**
     * Required.
     *
     * @var bool
     */
    protected $ExactMatchOnly;

    /**
     * Required.
     *
     * @var bool
     */
    protected $BestOnly;

    /**
     * Required.
     *
     * @var bool
     */
    protected $SummaryOnly;

    /**
     * Required.
     *
     * @var bool
     */
    protected $HotelStayOnly;

    /**
     * @var string
     */
    protected $PricingMethod;

    /**
     * @var bool
     */
    protected $AvailRatesOnly;

    /**
     * OTA_HotelAvailRQ constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\POS $POS
     * @param \GurwinderAntal\crs\Type\Request\AvailRequestSegment[] $AvailRequestSegments
     * @param $HotelReservationIDs
     * @param int $MaxResponses
     * @param string $RequestedCurrency
     * @param bool $ExactMatchOnly
     * @param bool $BestOnly
     * @param bool $SummaryOnly
     * @param bool $HotelStayOnly
     * @param string $PricingMethod
     * @param bool $AvailRatesOnly
     */
    public function __construct(
        POS $POS,
        array $AvailRequestSegments,
        $HotelReservationIDs,
        int $MaxResponses,
        string $RequestedCurrency,
        bool $ExactMatchOnly,
        bool $BestOnly,
        bool $SummaryOnly,
        bool $HotelStayOnly,
        string $PricingMethod,
        bool $AvailRatesOnly
    ) {
        $this->POS = $POS;
        $this->AvailRequestSegments = $AvailRequestSegments;
        $this->HotelReservationIDs = $HotelReservationIDs;
        $this->MaxResponses = $MaxResponses;
        $this->RequestedCurrency = $RequestedCurrency;
        $this->ExactMatchOnly = $ExactMatchOnly;
        $this->BestOnly = $BestOnly;
        $this->SummaryOnly = $SummaryOnly;
        $this->HotelStayOnly = $HotelStayOnly;
        $this->PricingMethod = $PricingMethod;
        $this->AvailRatesOnly = $AvailRequestSegments;
    }

}
