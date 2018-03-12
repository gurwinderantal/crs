<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\Paragraph;

/**
 * Class CancelPenalty
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class CancelPenalty {

  /**
   * @var \GurwinderAntal\crs\Type\Common\Paragraph
   */
  protected $PenaltyDescription;

  /**
   * @var \GurwinderAntal\crs\Type\Response\AmountPercent
   */
  protected $AmountPercent;

  /**
   * @var \GurwinderAntal\crs\Type\Response\Deadline
   */
  protected $Deadline;

  /**
   * CancelPenalty constructor.
   *
   * @param \GurwinderAntal\crs\Type\Common\Paragraph|null $PenaltyDescription
   * @param \GurwinderAntal\crs\Type\Response\AmountPercent|null $AmountPercent
   * @param \GurwinderAntal\crs\Type\Response\Deadline|null $Deadline
   */
  public function __construct(
    ?Paragraph $PenaltyDescription,
    ?AmountPercent $AmountPercent,
    ?Deadline $Deadline
  ) {
    $this->PenaltyDescription = $PenaltyDescription;
    $this->AmountPercent = $AmountPercent;
    $this->Deadline = $Deadline;
  }

}
