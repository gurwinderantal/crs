<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\Paragraph;

/**
 * Class Description
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class Description extends Paragraph {

  /**
   * @var \GurwinderAntal\crs\Type\Response\MultimediaDescription[]|null
   */
  protected $MultimediaDescriptions;

  /**
   * Description constructor.
   *
   * @param null|string $Text
   * @param null|string $Image
   * @param null|string $URL
   * @param null|string $Name
   * @param array|null $MultimediaDescriptions
   */
  public function __construct(
    ?string $Text,
    ?string $Image,
    ?string $URL,
    ?string $Name,
    ?array $MultimediaDescriptions
  ) {
    parent::__construct($Text, $Image, $URL, $Name);
    $this->MultimediaDescriptions = $MultimediaDescriptions;
  }

}
