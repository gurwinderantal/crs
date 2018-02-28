<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class StayDateRange
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class StayDateRange {

    /**
     * @var null|string
     */
    protected $Start;

    /**
     * @var null|string
     */
    protected $End;

    /**
     * @var null|string
     */
    protected $Duration;

    /**
     * StayDateRange constructor.
     *
     * @param null|string $Start
     * @param null|string $End
     * @param null|string $Duration
     */
    public function __construct(
        ?string $Start,
        ?string $End,
        ?string $Duration
    ) {
        $this->Start = $Start;
        $this->End = $End;
        $this->Duration = $Duration;
    }

}
