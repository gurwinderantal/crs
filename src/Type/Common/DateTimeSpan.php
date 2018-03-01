<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class DateTimeSpan
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class DateTimeSpan {

    /**
     * @var null|string
     */
    public $Start;

    /**
     * @var null|string
     */
    public $End;

    /**
     * @var null|string
     */
    public $Duration;

    /**
     * @var null|string
     */
    public $Increment;

    /**
     * DateTimeSpan constructor.
     *
     * @param null|string $Start
     * @param null|string $End
     * @param null|string $Duration
     * @param null|string $Increment
     */
    public function __construct(
        ?string $Start,
        ?string $End,
        ?string $Duration,
        ?string $Increment
    ) {
        $this->Start = $Start;
        $this->End = $End;
        $this->Duration = $Duration;
        $this->Increment = $Increment;
    }

}
