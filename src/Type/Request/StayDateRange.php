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
        string $Start = NULL,
        string $End = NULL,
        string $Duration = NULL
    ) {
        $this->Start = $Start;
        $this->End = $End;
        $this->Duration = $Duration;
    }

}
