<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class DateTimeSpanType
 *
 * @package GurwinderAntal\crs\Type\Request
 */

class DateTimeSpanType {

  /**
   * @var string|null
   */
  protected $Start;

  /**
   * @var string|null
   */
  protected $End;

  /**
   * @var string|null
   */
  protected $Duration;

  /**
   * @var string|null
   */
  protected $Increment;

  /**
   * DateTimeSpanType constructor.
   *
   * @param string|null $Start
   * @param string|null $End
   * @param string|null $Duration
   * @param string|null $Increment
   *
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
  }

}
