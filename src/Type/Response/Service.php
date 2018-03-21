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
   * @var int|null
   */
  public $Quantity;

  /**
   * @var bool|null
   */
  public $Inclusive;

  /**
   * @var string|null
   */
  public $ServiceInventoryCode;

  /**
   * @var string|null
   */
  public $ServicePricingType;
  /**
   * @var string|null
   */
  public $ServiceRPH;

  /**
   * Service constructor.
   *
   * @param \GurwinderAntal\crs\Type\Response\ResCommonDetailType|null $ServiceDetails
   * @param \GurwinderAntal\crs\Type\Response\AmountType|null $Price
   * @param null|string $DescriptiveText
   * @param \GurwinderAntal\crs\Type\Response\Description|null $Descriptions
   * @param \GurwinderAntal\crs\Type\Response\Feature|null $Feature
   * @param int|null $Quantity
   * @param bool|null $Inclusive
   * @param string|null $ServiceInventoryCode
   * @param string|null $ServicePricingType
   * @param string|null $ServiceRPH
   */
  public function __construct(
    ?ResCommonDetailType $ServiceDetails,
    ?AmountType $Price,
    ?string $DescriptiveText,
    ?Description $Descriptions,
    ?Feature $Feature,
    ?int $Quantity,
    ?bool $Inclusive,
    ?string $ServiceInventoryCode,
    ?string $ServicePricingType,
    ?string $ServiceRPH
  ) {
    $this->ServiceDetails = $ServiceDetails;
    $this->Price = $Price;
    $this->DescriptiveText = $DescriptiveText;
    $this->Descriptions = $Descriptions;
    $this->Feature = $Feature;
    $this->Quantity = $Quantity;
    $this->Inclusive = $Inclusive;
    $this->ServiceInventoryCode = $ServiceInventoryCode;
    $this->ServicePricingType = $ServicePricingType;
    $this->ServiceRPH = $ServiceRPH;
  }

}
