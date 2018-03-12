<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class ImageItem
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class ImageItem {

  /**
   * @var \GurwinderAntal\crs\Type\Response\ImageFormat|null
   */
  protected $ImageFormat;

  /**
   * ImageItem constructor.
   *
   * @param \GurwinderAntal\crs\Type\Response\ImageFormat|null $ImageFormat
   */
  public function __construct(
    ?ImageFormat $ImageFormat
  ) {
    $this->ImageFormat = $ImageFormat;
  }

}
