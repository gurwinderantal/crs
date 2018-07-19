<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Membership
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Membership {

    /**
     * @var null|string
     */
    public $ProgramCode;

    /**
     * @var null|string
     */
    public $BonusCode;

    /**
     * @var null|string
     */
    public $AccountID;

    /**
     * @var null|string
     */
    public $MembershipID;

    /**
     * @var null|string
     */
    public $TravelSector;

    /**
     * @var null|string
     */
    public $PointsEarned;

    /**
     * Membership constructor.
     *
     * @param null|string $ProgramCode
     * @param null|string $BonusCode
     * @param null|string $AccountID
     * @param null|string $MembershipID
     * @param null|string $TravelSector
     * @param null|string $PointsEarned
     */
    public function __construct(
        ?string $ProgramCode,
        ?string $BonusCode,
        ?string $AccountID,
        ?string $MembershipID,
        ?string $TravelSector,
        ?string $PointsEarned
    ) {
        $this->ProgramCode = $ProgramCode;
        $this->BonusCode = $BonusCode;
        $this->AccountID = $AccountID;
        $this->MembershipID = $MembershipID;
        $this->TravelSector = $TravelSector;
        $this->PointsEarned = $PointsEarned;
    }

}
