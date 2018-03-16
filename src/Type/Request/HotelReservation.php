<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class HotelReservation
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class HotelReservation {

    /**
     * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
     */
    protected $UniqueID;

    /**
     * @var \GurwinderAntal\crs\Type\Common\RoomStay[]|null
     */
    protected $RoomStays;

    /**
     * @var \GurwinderAntal\crs\Type\Request\ResGuest[]|null
     */
    protected $ResGuests;

    /**
     * @var \GurwinderAntal\crs\Type\Request\ResGlobalInfo|null
     */
    protected $ResGlobalInfo;

    /**
     * Currently unused.
     */
    protected $TPA_Extensions;

    /**
     * @var \GurwinderAntal\crs\Type\Request\WrittenConfInst|null
     */
    protected $WrittenConfInst;

    /**
     * Currently unused.
     */
    protected $Services;

    /**
     * @var \GurwinderAntal\crs\Type\Request\POS|null
     */
    protected $POS;

    /**
     * @var null|string
     */
    protected $CreateDateTime;

    /**
     * @var bool|null
     */
    protected $RoomStayReservation;

    /**
     * @var null|string
     */
    protected $CreatorID;

    /**
     * @var null|string
     */
    protected $LastModifyDateTime;

    /**
     * @var null|string
     */
    protected $LastModifierID;

    /**
     * @var null|string
     */
    protected $ResStatus;

    /**
     * HotelReservation constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\UniqueID|null $UniqueId
     * @param array|null $RoomStays
     * @param array|null $ResGuests
     * @param \GurwinderAntal\crs\Type\Request\ResGlobalInfo|null $ResGlobalInfo
     * @param $TPA_Extensions
     * @param \GurwinderAntal\crs\Type\Request\WrittenConfInst|null $WrittenConfInst
     * @param $Services
     * @param \GurwinderAntal\crs\Type\Request\POS|null $POS
     * @param null|string $CreateDateTime
     * @param bool|null $RoomStayReservation
     * @param null|string $CreatorID
     * @param null|string $LastModifyDateTime
     * @param null|string $LastModifierID
     * @param null|string $ResStatus
     */
    public function __construct(
        ?UniqueID $UniqueId,
        ?array $RoomStays,
        ?array $ResGuests,
        ?ResGlobalInfo $ResGlobalInfo,
        $TPA_Extensions,
        ?WrittenConfInst $WrittenConfInst,
        $Services,
        ?POS $POS,
        ?string $CreateDateTime,
        ?bool $RoomStayReservation,
        ?string $CreatorID,
        ?string $LastModifyDateTime,
        ?string $LastModifierID,
        ?string $ResStatus
    ) {
        $this->UniqueID = $UniqueId;
        $this->RoomStays = $RoomStays;
        $this->ResGuests = $ResGuests;
        $this->ResGlobalInfo = $ResGlobalInfo;
        $this->TPA_Extensions = $TPA_Extensions;
        $this->WrittenConfInst = $WrittenConfInst;
        $this->Services = $Services;
        $this->POS = $POS;
        $this->CreateDateTime = $CreateDateTime;
        $this->RoomStayReservation = $RoomStayReservation;
        $this->CreatorID = $CreatorID;
        $this->LastModifyDateTime = $LastModifyDateTime;
        $this->LastModifierID = $LastModifierID;
        $this->ResStatus = $ResStatus;
    }

}
