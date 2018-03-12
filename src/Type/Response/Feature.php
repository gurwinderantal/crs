<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class Feature
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class Feature {

  /**
   * @var \GurwinderAntal\crs\Type\Response\Description|null
   */
  public $Description;

  /**
   * @var \GurwinderAntal\crs\Type\Response\CurrencyAmount|null
   */
  public $Charge;

  /**
   * @var \GurwinderAntal\crs\Type\Response\MultimediaDescription[]|null
   */
  public $MultimediaDescriptions;

  /**
   * @var string|null
   */
  public $AccessibleCode;

  /**
   * @var string|null
   */
  public $SecurityCode;

  /**
   * @var string|null
   */
  public $CodeDetail;

  /**
   * Feature constructor.
   *
   * @param \GurwinderAntal\crs\Type\Response\Description|null $Description
   * @param \GurwinderAntal\crs\Type\Response\CurrencyAmount|null $Charge
   * @param \GurwinderAntal\crs\Type\Response\MultimediaDescription[]|null $MultimediaDescriptions
   * @param null|string $AccessibleCode
   * @param null|string $SecurityCode
   * @param null|string $CodeDetail
   */
  public function __construct(
    ?Description $Description,
    ?CurrencyAmount $Charge,
    ?array $MultimediaDescriptions,
    ?string $AccessibleCode,
    ?string $SecurityCode,
    ?string $CodeDetail
  ) {
    $this->Description = $Description;
    $this->Charge = $Charge;
    $this->MultimediaDescriptions = $MultimediaDescriptions;
    $this->AccessibleCode = $AccessibleCode;
    $this->SecurityCode = $SecurityCode;
    $this->CodeDetail = $CodeDetail;
  }

}
