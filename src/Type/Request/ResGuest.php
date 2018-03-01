<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class ResGuest
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ResGuest {

    /**
     * Currently unused.
     */
    protected $InHouseTimeSpan;

    /**
     * @var \GurwinderAntal\crs\Type\Request\ProfileInfo[]|null
     */
    protected $Profiles;

    /**
     * Currently unused.
     */
    protected $ArrivalTransport;

    /**
     * Currently unused.
     */
    protected $DepartureTransport;

    /**
     * @var bool|null
     */
    protected $PrimaryIndicator;

    /**
     * @var null|string
     */
    protected $ResGuestRPH;

    /**
     * @var null|string
     */
    protected $ArrivalTime;

    /**
     * ResGuest constructor.
     *
     * @param $InHouseTimeSpan
     * @param \GurwinderAntal\crs\Type\Request\ProfileInfo[]|null $Profiles
     * @param $ArrivalTransport
     * @param $DepartureTransport
     * @param bool|null $PrimaryIndicator
     * @param null|string $ResGuestRPH
     * @param null|string $ArrivalTime
     */
    public function __construct(
        $InHouseTimeSpan,
        ?array $Profiles,
        $ArrivalTransport,
        $DepartureTransport,
        ?bool $PrimaryIndicator,
        ?string $ResGuestRPH,
        ?string $ArrivalTime
    ) {
        $this->InHouseTimeSpan = $InHouseTimeSpan;
        $this->Profiles = $Profiles;
        $this->ArrivalTransport = $ArrivalTransport;
        $this->DepartureTransport = $DepartureTransport;
        $this->PrimaryIndicator = $PrimaryIndicator;
        $this->ResGuestRPH = $ResGuestRPH;
        $this->ArrivalTime = $ArrivalTime;
    }

}
