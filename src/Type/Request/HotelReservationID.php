<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class HotelReservationID
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class HotelReservationID {

  /**
   * @var string|null
   */
  protected $ResID_Type;

  /**
   * @var string|null
   */
  protected $ResID_Value;

  /**
   * @var string|null
   */
  protected $ResID_Source;

  /**
   * @var string|null
   */
  protected $ResID_SourceContext;

  /**
   * @var string|null
   */
  protected $ResID_Date;

 /**
  * HotelReservationID constructor.
  *
  * @param string|null $ResID_Type
  * @param string|null $ResID_Value
  * @param string|null $ResID_Source
  * @param string|null $ResID_SourceContext
  * @param string|null $ResID_Date
  */
  public function __construct(
    ?string $ResID_Type,
    ?string $ResID_Value,
    ?string $ResID_Source,
    ?string $ResID_SourceContext,
    ?string $ResID_Date
  ) {
    $this->ResID_Type = $ResID_Type;
    $this->ResID_Value = $ResID_Value;
    $this->ResID_Source = $ResID_Source;
    $this->ResID_SourceContext = $ResID_SourceContext;
    $this->ResID_Date = $ResID_Date;
  }

}
