<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class SelectionCriteria
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class SelectionCriteria {

  /**
   * @var string|null
   */
  protected $DateType;

  /**
   * @var string|null
   */
  protected $Start;

  /**
   * @var string|null
   */
  protected $End;

  /**
   * SelectionCriteria constructor.
   *
   * @param string|null $DateType
   * @param string|null $Start
   * @param string|null $End
   */
  public function __construct(
    ?string $DateType,
    ?string $Start,
    ?string $End
  ) {
    $this->DateType = $DateType;
    $this->Start = $Start;
    $this->End = $End;
  }

}
