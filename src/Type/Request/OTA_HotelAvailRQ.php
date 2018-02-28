<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class OTA_HotelAvailRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelAvailRQ extends OtaRequestMessage {

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
     *
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
     * @param NULL|string $EchoToken
     * @param NULL|string $PrimaryLangID
     * @param NULL|string $AltLangID
     * @param NULL|string $TimeStamp
     * @param NULL|string $Target
     * @param NULL|string $Version
     * @param NULL|string $MessageContentCode
     * @param $TPA_Extensions
     * @param \GurwinderAntal\crs\Type\Request\POS|NULL $POS
     * @param array|NULL $AvailRequestSegments
     * @param $HotelReservationIDs
     * @param int|NULL $MaxResponses
     * @param null|string $RequestedCurrency
     * @param bool|NULL $ExactMatchOnly
     * @param bool|NULL $BestOnly
     * @param bool|NULL $SummaryOnly
     * @param bool|NULL $HotelStayOnly
     * @param NULL|string $PricingMethod
     * @param bool|NULL $AvailRatesOnly
     */
    public function __construct(
        ?string $EchoToken,
        ?string $PrimaryLangID,
        ?string $AltLangID,
        ?string $TimeStamp,
        ?string $Target,
        ?string $Version,
        ?string $MessageContentCode,
        $TPA_Extensions,
        ?POS $POS,
        ?array $AvailRequestSegments,
        $HotelReservationIDs,
        ?int $MaxResponses,
        ?string $RequestedCurrency,
        ?bool $ExactMatchOnly,
        ?bool $BestOnly,
        ?bool $SummaryOnly,
        ?bool $HotelStayOnly,
        ?string $PricingMethod,
        ?bool $AvailRatesOnly) {
        parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
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
