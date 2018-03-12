<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\Paragraph;

/**
 * Class MultimediaDescription
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class MultimediaDescription {

  /**
   * @var \GurwinderAntal\crs\Type\Response\TextItem[]|null
   */
  public $TextItems;

  /**
   * @var \GurwinderAntal\crs\Type\Response\ImageItem[]|null
   */
  public $ImageItems;

  /**
   * @var string|null
   */
  public $InfoCode;

  /**
   * @var string|null
   */
  public $AdditionalDetailCode;

  /**
   * MultimediaDescription constructor.
   *
   * @param \GurwinderAntal\crs\Type\Response\TextItem[]|null $TextItems
   * @param \GurwinderAntal\crs\Type\Response\ImageItem[]|null $ImageItems
   * @param null|string $InfoCode
   * @param null|string $AdditionalDetailCode
   */
  public function __construct(
    ?array $TextItems,
    ?array $ImageItems,
    ?string $InfoCode,
    ?string $AdditionalDetailCode
  ) {
    $this->TextItems = $TextItems;
    $this->ImageItems = $ImageItems;
    $this->InfoCode = $InfoCode;
    $this->AdditionalDetailCode = $AdditionalDetailCode;
  }

}
