<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RoomStayCandidate
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RoomStayCandidate {

    /**
     * @var \GurwinderAntal\crs\Type\Request\GuestCount[]
     */
    protected $GuestCounts;

    /**
     * @var string
     */
    protected $Quantity;

    /**
     * @var string
     */
    protected $RoomType;

    /**
     * @var string
     */
    protected $RoomTypeCode;

    /**
     * @var string
     */
    protected $RoomCategory;

    /**
     * @var string
     */
    protected $PromotionCode;

    /**
     * @var string
     */
    protected $NonSmoking;

    /**
     * RoomStayCandidate constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\GuestCount[] $GuestCounts
     * @param string $Quantity
     * @param string $RoomType
     * @param string $RoomTypeCode
     * @param string $RoomCategory
     * @param string $PromotionCode
     * @param string $NonSmoking
     */
    public function __construct(
        array $GuestCounts = NULL,
        string $Quantity = NULL,
        string $RoomType = NULL,
        string $RoomTypeCode = NULL,
        string $RoomCategory = NULL,
        string $PromotionCode = NULL,
        string $NonSmoking = NULL
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
