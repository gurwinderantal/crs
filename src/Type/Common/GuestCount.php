<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class GuestCount
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class GuestCount {

    /**
     * @var null|string
     */
    protected $AgeQualifyingCode;

    /**
     * @var null|string
     */
    protected $Count;

    /**
     * @var null|string
     */
    protected $Age;

    /**
     * GuestCount constructor.
     *
     * @param null|string $AgeQualifyingCode
     * @param null|string $Count
     * @param null|string $Age
     */
    public function __construct(
        ?string $AgeQualifyingCode,
        ?string $Count,
        ?string $Age
    ) {
        $this->AgeQualifyingCode = $AgeQualifyingCode;
        $this->Count = $Count;
        $this->Age = $Age;
    }

}
