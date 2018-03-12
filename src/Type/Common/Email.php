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
   * @var string|null
   */
  protected $ShareMarketInd;

  /**
   * Email constructor.
   *
   * @param string|null $DefaultInd
   * @param string|null $ShareMarketInd
   */
  public function __construct(
    ?string $DefaultInd,
    ?string $ShareMarketInd
  ) {
    $this->DefaultInd = $DefaultInd;
    $this->ShareMarketInd = $ShareMarketInd;
  }

}
