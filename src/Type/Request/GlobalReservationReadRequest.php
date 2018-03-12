<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\PersonName;

/**
 * Class GlobalReservationReadRequest
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class GlobalReservationReadRequest {

  /**
   * @var \GurwinderAntal\crs\Type\Common\PersonName
   */
  protected $TravelerName;

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
   * GlobalReservationReadRequest constructor.
   *
   * @param \GurwinderAntal\crs\Type\Common\PersonName|null $TravelerName
   * @param null|string $Start
   * @param null|string $End
   * @param null|string $Duration
   */
  public function __construct(
    ?PersonName $TravelerName,
    ?string $Start,
    ?string $End,
    ?string $Duration
  ) {
    $this->TravelerName = $TravelerName;
    $this->Start = $Start;
    $this->End = $End;
    $this->Duration = $Duration;
  }

}
