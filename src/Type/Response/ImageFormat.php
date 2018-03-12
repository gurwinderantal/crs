<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class ImageFormat
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class ImageFormat {

  /**
   * @var string|null
   */
  protected $URL;

  /**
   * ImageFormat constructor.
   *
   * @param null|string $URL
   */
  public function __construct(
    ?string $URL
  ) {
    $this->URL = $URL;
  }

}
