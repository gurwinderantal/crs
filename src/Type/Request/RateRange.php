<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RateRange
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RateRange {

    /**
     * @var string|NULL
     */
    protected $MinRate;

    /**
     * @var string|NULL
     */
    protected $MaxRate;

    /**
     * RateRange constructor.
     *
     * @param string|NULL $MinRate
     * @param string|NULL $MaxRate
     */
    public function __construct(
        string $MinRate = NULL,
        string $MaxRate = NULL
    ) {
        $this->MinRate = $MinRate;
        $this->MaxRate = $MaxRate;
    }

}
