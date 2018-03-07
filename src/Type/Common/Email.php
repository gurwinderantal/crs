<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Email
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Email {

  /**
   * @var string|null
   */
  protected $DefaultInd;

  /**
   * Email constructor.
   *
   * @param string|null $DefaultInd
   */
  public function __construct(
    ?string $DefaultInd
  ) {
    $this->DefaultInd = $DefaultInd;
  }

}
