<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RateRange
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RateRange {

    /**
     * @var null|string
     */
    protected $MinRate;

    /**
     * @var null|string
     */
    protected $MaxRate;

    /**
     * RateRange constructor.
     *
     * @param null|string $MinRate
     * @param null|string $MaxRate
     */
    public function __construct(
        ?string $MinRate,
        ?string $MaxRate
    ) {
        $this->MinRate = $MinRate;
        $this->MaxRate = $MaxRate;
    }

}
