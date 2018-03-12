<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class TextItem
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class TextItem {

  /**
   * @var string|null
   */
  public $Description;

  /**
   * @var string|null
   */
  public $Title;

  /**
   * TextItem constructor.
   *
   * @param null|string $Description
   * @param null|string $Title
   */
  public function __construct(
    ?string $Description,
    ?string $Title
  ) {
    $this->Description = $Description;
    $this->Title = $Title;
  }

}
