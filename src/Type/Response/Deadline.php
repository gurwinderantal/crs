<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class Deadline
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class Deadline {

  /**
   * @var string|null
   */
  protected $AbsoluteDeadline;

  /**
   * @var string|null
   */
  protected $OffsetTimeUnit;

  /**
   * @var string|null
   */
  protected $OffsetUnitMultiplier;

  /**
   * @var string|null
   */
  protected $OffsetDropTime;

  /**
   * Deadline constructor.
   *
   * @param null|string $AbsoluteDeadline
   * @param null|string $OffsetTimeUnit
   * @param null|string $OffsetUnitMultiplier
   * @param null|string $OffsetDropTime
   */
  public function __construct(
    ?string $AbsoluteDeadline,
    ?string $OffsetTimeUnit,
    ?string $OffsetUnitMultiplier,
    ?string $OffsetDropTime
  ) {
    $this->AbsoluteDeadline = $AbsoluteDeadline;
    $this->OffsetTimeUnit = $OffsetTimeUnit;
    $this->OffsetUnitMultiplier = $OffsetUnitMultiplier;
    $this->OffsetDropTime = $OffsetDropTime;
  }

}
