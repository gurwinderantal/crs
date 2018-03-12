<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\HotelReferenceGroup;

/**
 * Class HotelStay
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class HotelStay {

  /**
   * @var \GurwinderAntal\crs\Type\Response\Availability|null
   */
  public $Availability;

  /**
   * @var \GurwinderAntal\crs\Type\Response\Price|null
   */
  public $Price;

  /**
   * @var \GurwinderAntal\crs\Type\Common\HotelReferenceGroup|null
   */
  public $BasicPropertyInfo;

  /**
   * HotelStay constructor.
   *
   * @param \GurwinderAntal\crs\Type\Response\Availability|null $Availability
   * @param \GurwinderAntal\crs\Type\Response\Price|null $Price
   * @param \GurwinderAntal\crs\Type\Common\HotelReferenceGroup|null $BasicPropertyInfo
   */
  public function __construct(
    ?Availability $Availability,
    ?Price $Price,
    ?HotelReferenceGroup $BasicPropertyInfo
  ) {
    $this->Availability = $Availability;
    $this->Price = $Price;
    $this->BasicPropertyInfo = $BasicPropertyInfo;
  }

}
