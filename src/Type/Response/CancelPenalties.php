<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class CancelPenalties
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class CancelPenalties {

  /**
   * @var \GurwinderAntal\crs\Type\Response\CancelPenalty
   */
  protected $CancelPenalty;

  /**
   * CancelPenalties constructor.
   *
   * @param \GurwinderAntal\crs\Type\Response\CancelPenalty|null $CancelPenalty
   */
  public function __construct(
    ?CancelPenalty $CancelPenalty
  ) {
    $this->CancelPenalty = $CancelPenalty;
  }

}
