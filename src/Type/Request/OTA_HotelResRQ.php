<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class OTA_HotelResRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelResRQ extends OtaRequestMessage {

    /**
     * @var \GurwinderAntal\crs\Type\Request\POS|null
     */
    protected $POS;

    /**
     * @var \GurwinderAntal\crs\Type\Request\HotelReservation[]|null
     */
    protected $HotelReservations;

    /**
     * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
     */
    protected $UniqueID;

    /**
     * @var null|string
     */
    protected $ResStatus;

    /**
     * @var bool|null
     */
    protected $RetransmissionIndicator;

    /**
     * OTA_HotelResRQ constructor.
     *
     * @param null|string $EchoToken
     * @param null|string $PrimaryLangID
     * @param null|string $AltLangID
     * @param null|string $TimeStamp
     * @param null|string $Target
     * @param null|string $Version
     * @param null|string $MessageContentCode
     * @param $TPA_Extensions
     * @param \GurwinderAntal\crs\Type\Request\POS|null $POS
     * @param \GurwinderAntal\crs\Type\Request\HotelReservation[]|null $HotelReservations
     * @param \GurwinderAntal\crs\Type\Request\UniqueID|null $UniqueID
     * @param null|string $ResStatus
     * @param bool|null $RetransmissionIndicator
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
        ?array $HotelReservations,
        ?UniqueID $UniqueID,
        ?string $ResStatus,
        ?bool $RetransmissionIndicator
    ) {
        parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
        $this->POS = $POS;
        $this->HotelReservations = $HotelReservations;
        $this->UniqueID = $UniqueID;
        $this->ResStatus = $ResStatus;
        $this->RetransmissionIndicator = $RetransmissionIndicator;
    }

}
