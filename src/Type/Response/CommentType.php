<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\Paragraph;

/**
 * Class CommentType
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class CommentType {

  /**
   * @var \GurwinderAntal\crs\Type\Common\Paragraph
   */
  public $Comment;

  /**
   * CommentType constructor.
   *
   * @param \GurwinderAntal\crs\Type\Common\Paragraph|null $Comment
   */
  public function __construct(
    ?Paragraph $Comment
  ) {
    $this->Comment = $Comment;
  }

}
