<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class CancelRules
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class CancelRules {

  /**
   * @var \GurwinderAntal\crs\Type\Response\CancelRule|null
   */
  protected $CancelRule;

  /**
   * CancelRules constructor.
   *
   * @param \GurwinderAntal\crs\Type\Response\CancelRule|null $CancelRule
   */
  public function __construct(
    ?CancelRule $CancelRule
  ) {
    $this->CancelRule = $CancelRule;
  }

}
