<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RoomStayCandidate
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RoomStayCandidate {

    /**
     * @var array|\GurwinderAntal\crs\Type\Common\GuestCount[]|null
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
     * RoomStayCandidate constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\GuestCount[]|null $GuestCounts
     * @param null|string $Quantity
     * @param null|string $RoomType
     * @param null|string $RoomTypeCode
     * @param null|string $RoomCategory
     * @param null|string $PromotionCode
     * @param null|string $NonSmoking
     */
    public function __construct(
        ?array $GuestCounts,
        ?string $Quantity,
        ?string $RoomType,
        ?string $RoomTypeCode,
        ?string $RoomCategory,
        ?string $PromotionCode,
        ?string $NonSmoking
    ) {
        $this->GuestCounts = $GuestCounts;
        $this->Quantity = $Quantity;
        $this->RoomType = $RoomType;
        $this->RoomTypeCode = $RoomTypeCode;
        $this->RoomCategory = $RoomCategory;
        $this->PromotionCode = $PromotionCode;
        $this->NonSmoking = $NonSmoking;
    }

}
