<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class GuestCounts
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class GuestCounts {

    /**
     * @var array|\GurwinderAntal\crs\Type\Common\GuestCount[]|null
     */
    protected $GuestCount;

    /**
     * @var bool|null
     */
    protected $IsPerRoom;

    /**
     * GuestCounts constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\GuestCount[]|null $GuestCount
     * @param bool|null $IsPerRoom
     */
    public function __construct(
        ?array $GuestCount,
        ?bool $IsPerRoom
    ) {
        $this->GuestCount = $GuestCount;
        $this->IsPerRoom = $IsPerRoom;
    }

}
