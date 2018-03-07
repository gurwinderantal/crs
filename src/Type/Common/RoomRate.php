<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class RoomRate
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class RoomRate {

    /**
     * @var array|\GurwinderAntal\crs\Type\Common\Rate[]|null
     */
    public $Rates;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Total|null
     */
    public $Total;

    /**
     * Currently unused.
     */
    public $Availability;

    /**
     * @var null|string
     */
    public $EffectiveDate;

    /**
     * @var null|string
     */
    public $ExpireDate;

    /**
     * @var null|string
     */
    public $RoomTypeCode;

    /**
     * @var null|string
     */
    public $RatePlanCode;

    /**
     * @var int|null
     */
    public $NumberOfUnits;

    /**
     * @var null|string
     */
    public $InvBlockCode;

    /**
     * RoomRate constructor.
     *
     * @param array|null $Rates
     * @param \GurwinderAntal\crs\Type\Common\Total|null $Total
     * @param $Availability
     * @param null|string $EffectiveDate
     * @param null|string $ExpireDate
     * @param null|string $RoomTypeCode
     * @param null|string $RatePlanCode
     * @param int|null $NumberOfUnits
     * @param null|string $InvBlockCode
     */
    public function __construct(
        ?array $Rates,
        ?Total $Total,
        $Availability,
        ?string $EffectiveDate,
        ?string $ExpireDate,
        ?string $RoomTypeCode,
        ?string $RatePlanCode,
        ?int $NumberOfUnits,
        ?string $InvBlockCode
    ) {
        $this->Rates = $Rates;
        $this->Total = $Total;
        $this->Availability = $Availability;
        $this->EffectiveDate = $EffectiveDate;
        $this->ExpireDate = $ExpireDate;
        $this->RoomTypeCode = $RoomTypeCode;
        $this->NumberOfUnits = $NumberOfUnits;
        $this->InvBlockCode = $InvBlockCode;
    }

}
