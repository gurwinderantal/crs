<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class StayDateRange
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class StayDateRange {

    /**
     * @var string
     */
    protected $Start;

    /**
     * @var string
     */
    protected $End;

    /**
     * @var string
     */
    protected $Duration;

    /**
     * StayDateRange constructor.
     *
     * @param string $Start
     * @param string $End
     * @param string $Duration
     */
    public function __construct(
        string $Start,
        string $End,
        string $Duration
    ) {
        $this->Start = $Start;
        $this->End = $End;
        $this->Duration = $Duration;
    }

}
