<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RoomStayCandidate
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RoomStayCandidate {

    /**
     * @var \GurwinderAntal\crs\Type\Common\GuestCount[]|\GurwinderAntal\crs\Type\Common\GuestCounts|null
     */
    protected $GuestCounts;

    /**
     * @var null|string
     */
    protected $Quantity;

    /**
     * @var null|string
     */
    protected $RoomType;

    /**
     * @var null|string
     */
    protected $RoomTypeCode;

    /**
     * @var null|string
     */
    protected $RoomCategory;

    /**
     * @var null|string
     */
    protected $PromotionCode;

    /**
     * @var null|string
     */
    protected $NonSmoking;

    /**
     * @var null|string
     */
    protected $InvBlockCode;

    /**
     * @var null|string
     */
    protected $RoomID;

    /**
     * RoomStayCandidate constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\GuestCount[]|\GurwinderAntal\crs\Type\Common\GuestCounts|null $GuestCounts
     * @param null|string $Quantity
     * @param null|string $RoomType
     * @param null|string $RoomTypeCode
     * @param null|string $RoomCategory
     * @param null|string $PromotionCode
     * @param null|string $NonSmoking
     * @param null|string $InvBlockCode
     * @param null|string $RoomID
     */
    public function __construct(
        $GuestCounts,
        ?string $Quantity,
        ?string $RoomType,
        ?string $RoomTypeCode,
        ?string $RoomCategory,
        ?string $PromotionCode,
        ?string $NonSmoking,
        ?string $InvBlockCode,
        ?string $RoomID
    ) {
        $this->GuestCounts = $GuestCounts;
        $this->Quantity = $Quantity;
        $this->RoomType = $RoomType;
        $this->RoomTypeCode = $RoomTypeCode;
        $this->RoomCategory = $RoomCategory;
        $this->PromotionCode = $PromotionCode;
        $this->NonSmoking = $NonSmoking;
        $this->InvBlockCode = $InvBlockCode;
        $this->RoomID = $RoomID;
    }

}
