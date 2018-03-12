<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class AgeQualifyingGroup
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class AgeQualifyingGroup {

  /**
   * @var string|null
   */
  protected $AgeQualifyingCode;

  /**
   * @var string|null
   */
  protected $MinAge;

  /**
   * @var string|null
   */
  protected $MaxAge;

  /**
   * @var string|null
   */
  protected $AgeTimeUnit;

  /**
   * AgeQualifyingGroup constructor.
   *
   * @param null|string $AgeQualifyingCode
   * @param null|string $MinAge
   * @param null|string $MaxAge
   * @param null|string $AgeTimeUnit
   */
  public function __construct(
    ?string $AgeQualifyingCode,
    ?string $MinAge,
    ?string $MaxAge,
    ?string $AgeTimeUnit
  ) {
    $this->AgeQualifyingCode = $AgeQualifyingCode;
    $this->MinAge = $MinAge;
    $this->MaxAge = $MaxAge;
    $this->AgeTimeUnit = $AgeTimeUnit;
  }

}
