<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class GuestCount
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class GuestCount {

    /**
     * @var string
     */
    protected $AgeQualifyingCode;

    /**
     * @var string
     */
    protected $Count;

    /**
     * @var string
     */
    protected $Age;

    /**
     * GuestCount constructor.
     *
     * @param string $AgeQualifyingCode
     * @param string $Count
     * @param string $Age
     */
    public function __construct(
        string $AgeQualifyingCode = NULL,
        string $Count = NULL,
        string $Age = NULL
    ) {
        $this->AgeQualifyingCode = $AgeQualifyingCode;
        $this->Count = $Count;
        $this->Age = $Age;
    }

}
