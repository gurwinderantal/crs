<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\Guarantee;
use GurwinderAntal\crs\Type\Common\GuestCounts;
use GurwinderAntal\crs\Type\Request\DateTimeSpanType;

/**
 * Class ResCommonDetailType
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class ResCommonDetailType {

  /**
   * @var \GurwinderAntal\crs\Type\Common\GuestCounts|null
   */
  protected $GuestCounts;

  /**
   * @var \GurwinderAntal\crs\Type\Response\CommentType|null
   */
  protected $Comments;

  /**
   * @var \GurwinderAntal\crs\Type\Request\DateTimeSpanType|null
   */
  protected $TimeSpan;

  /**
   * @var CancelPenalties|null
   */
  protected $CancelPenalties;

  /**
   * @var \GurwinderAntal\crs\Type\Common\Guarantee|null
   */
  protected $Guarantee;

  /**
   * ResCommonDetailType constructor.
   *
   * @param \GurwinderAntal\crs\Type\Common\GuestCounts|null $GuestCounts
   * @param \GurwinderAntal\crs\Type\Response\CommentType|null $Comments
   * @param \GurwinderAntal\crs\Type\Request\DateTimeSpanType|null $TimeSpan
   * @param \GurwinderAntal\crs\Type\Response\CancelPenalties|null $CancelPenalties
   * @param \GurwinderAntal\crs\Type\Common\Guarantee|null $Guarantee
   */
  public function __construct(
    ?GuestCounts $GuestCounts,
    ?CommentType $Comments,
    ?DateTimeSpanType $TimeSpan,
    ?CancelPenalties $CancelPenalties,
    ?Guarantee $Guarantee
  ) {
    $this->GuestCounts = $GuestCounts;
    $this->Comments = $Comments;
    $this->TimeSpan = $TimeSpan;
    $this->CancelPenalties = $CancelPenalties;
    $this->Guarantee = $Guarantee;
  }

}
