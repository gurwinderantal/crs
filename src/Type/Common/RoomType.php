<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class RoomType
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class RoomType {

    /**
     * @var \GurwinderAntal\crs\Type\Common\Paragraph|null
     */
    public $RoomDescription;

    /**
     * Currently unused.
     */
    public $Occupancy;

    /**
     * Currently unused.
     */
    public $Amenities;

    /**
     * Currently unused.
     */
    public $AdditionalDetails;

    /**
     * Currently unused.
     */
    public $TPA_Extensions;

    /**
     * @var bool|null
     */
    public $IsRoom;

    /**
     * @var null|string
     */
    public $RoomTypeCode;

    /**
     * @var null|string
     */
    public $InvBlockCode;

    /**
     * @var int|null
     */
    public $NumberOfUnits;

    /**
     * RoomType constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\Paragraph|null $RoomDescription
     * @param $Occupancy
     * @param $Amenities
     * @param $AdditionalDetails
     * @param $TPA_Extensions
     * @param bool|null $IsRoom
     * @param null|string $RoomTypeCode
     * @param null|string $InvBlockCode
     * @param int|null $NumberOfUnits
     */
    public function __construct(
        ?Paragraph $RoomDescription,
        $Occupancy,
        $Amenities,
        $AdditionalDetails,
        $TPA_Extensions,
        ?bool $IsRoom,
        ?string $RoomTypeCode,
        ?string $InvBlockCode,
        ?int $NumberOfUnits
    ) {
        $this->RoomDescription = $RoomDescription;
        $this->Occupancy = $Occupancy;
        $this->Amenities = $Amenities;
        $this->AdditionalDetails = $AdditionalDetails;
        $this->TPA_Extensions = $TPA_Extensions;
        $this->IsRoom = $IsRoom;
        $this->RoomTypeCode = $RoomTypeCode;
        $this->InvBlockCode = $InvBlockCode;
        $this->NumberOfUnits = $NumberOfUnits;
    }

}
