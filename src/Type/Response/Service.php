<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class Service
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class Service {

  /**
   * @var \GurwinderAntal\crs\Type\Response\ResCommonDetailType|null
   */
  public $ServiceDetails;

  /**
   * @var \GurwinderAntal\crs\Type\Response\AmountType|null
   */
  public $Price;

  /**
   * @var string|null
   */
  public $DescriptiveText;

  /**
   * @var \GurwinderAntal\crs\Type\Response\Description|null
   */
  public $Descriptions;

  /**
   * @var \GurwinderAntal\crs\Type\Response\Feature|null
   */
  public $Feature;

  /**
   * Service constructor.
   *
   * @param \GurwinderAntal\crs\Type\Response\ResCommonDetailType|null $ServiceDetails
   * @param \GurwinderAntal\crs\Type\Response\AmountType|null $Price
   * @param null|string $DescriptiveText
   * @param \GurwinderAntal\crs\Type\Response\Description|null $Descriptions
   * @param \GurwinderAntal\crs\Type\Response\Feature|null $Feature
   */
  public function __construct(
    ?ResCommonDetailType $ServiceDetails,
    ?AmountType $Price,
    ?string $DescriptiveText,
    ?Description $Descriptions,
    ?Feature $Feature
  ) {
    $this->ServiceDetails = $ServiceDetails;
    $this->Price = $Price;
    $this->DescriptiveText = $DescriptiveText;
    $this->Descriptions = $Descriptions;
    $this->Feature = $Feature;
  }

}
