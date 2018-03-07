<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Reason
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Reason {

  /**
   * @var string|null
   */
  protected $Type;

  /**
   * Reason constructor.
   *
   * @param string|null $Type
   */
  public function __construct(
    ?string $Type
  ) {
    $this->Type = $Type;
  }

}
