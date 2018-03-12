<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class Availability
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class Availability {

  /**
   * @var string|null
   */
  public $Status;

  /**
   * @var string|null
   */
  public $AvailabilityStatus;

  /**
   * @var string|null
   */
  public $Quantity;

  /**
   * @var string|null
   */
  public $Start;

  /**
   * @var string|null
   */
  public $End;

  /**
   * @var string|null
   */
  public $Duration;

  /**
   * Availability constructor.
   *
   * @param null|string $Status
   * @param null|string $AvailabilityStatus
   * @param null|string $Quantity
   * @param null|string $Start
   * @param null|string $End
   * @param null|string $Duration
   */
  public function __construct(
    ?string $Status,
    ?string $AvailabilityStatus,
    ?string $Quantity,
    ?string $Start,
    ?string $End,
    ?string $Duration
  ) {
    $this->Status = $Status;
    $this->AvailabilityStatus = $AvailabilityStatus;
    $this->Quantity = $Quantity;
    $this->Start = $Start;
    $this->End = $End;
    $this->Duration = $Duration;
  }

}
