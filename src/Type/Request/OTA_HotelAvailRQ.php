<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class OTA_HotelAvailRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelAvailRQ extends OtaRequestMessage {

    /**
     * @var \GurwinderAntal\crs\Type\Request\POS|array|null
     */
    protected $POS;

    /**
     * @var \GurwinderAntal\crs\Type\Request\AvailRequestSegment[]|null
     */
    protected $AvailRequestSegments;

    /**
     * Currently unused.
     */
    protected $HotelReservationIDs;

    /**
     * @var int|null
     */
    protected $MaxResponses;

    /**
     * @var null|string
     */
    protected $RequestedCurrency;

    /**
     * @var bool|null
     */
    protected $ExactMatchOnly;

    /**
     * @var bool|null
     */
    protected $BestOnly;

    /**
     * @var bool|null
     */
    protected $SummaryOnly;

    /**
     * @var bool|null
     */
    protected $HotelStayOnly;

    /**
     * @var null|string
     */
    protected $PricingMethod;

    /**
     * @var array|null
     */
    protected $AvailRatesOnly;

    /**
     * OTA_HotelAvailRQ constructor.
     *
     * @param null|string $EchoToken
     * @param null|string $PrimaryLangID
     * @param null|string $AltLangID
     * @param null|string $TimeStamp
     * @param null|string $Target
     * @param null|string $Version
     * @param null|string $MessageContentCode
     * @param $TPA_Extensions
     * @param \GurwinderAntal\crs\Type\Request\POS|array|null $POS
     * @param array|null $AvailRequestSegments
     * @param $HotelReservationIDs
     * @param int|null $MaxResponses
     * @param null|string $RequestedCurrency
     * @param bool|null $ExactMatchOnly
     * @param bool|null $BestOnly
     * @param bool|null $SummaryOnly
     * @param bool|null $HotelStayOnly
     * @param null|string $PricingMethod
     * @param bool|null $AvailRatesOnly
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
        $POS,
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
