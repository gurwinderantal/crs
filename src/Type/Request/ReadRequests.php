<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class ReadRequests
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ReadRequests {

  /**
   * @var \GurwinderAntal\crs\Type\Request\ReadRequest|null
   */
  protected $ReadRequest;

  /**
   * @var \GurwinderAntal\crs\Type\Request\HotelReadRequest|null
   */
  protected $HotelReadRequest;

  /**
   * @var \GurwinderAntal\crs\Type\Request\GlobalReservationReadRequest|null
   */
  protected $GlobalReservationReadRequest;

  /**
   * @var \GurwinderAntal\crs\Type\Request\ProfileReadRequest|null
   */
  protected $ProfileReadRequest;

  /**
   * ReadRequests constructor.
   *
   * @param \GurwinderAntal\crs\Type\Request\ReadRequest|null $ReadRequest
   * @param \GurwinderAntal\crs\Type\Request\HotelReadRequest|null $HotelReadRequest
   * @param \GurwinderAntal\crs\Type\Request\GlobalReservationReadRequest|null $GlobalReservationReadRequest
   * @param \GurwinderAntal\crs\Type\Request\ProfileReadRequest|null $ProfileReadRequest
   */
  public function __construct(
    ?ReadRequest $ReadRequest,
    ?HotelReadRequest $HotelReadRequest,
    ?GlobalReservationReadRequest $GlobalReservationReadRequest,
    ?ProfileReadRequest $ProfileReadRequest
  ) {
    $this->ReadRequest = $ReadRequest;
    $this->HotelReadRequest = $HotelReadRequest;
    $this->GlobalReservationReadRequest = $GlobalReservationReadRequest;
    $this->ProfileReadRequest = $ProfileReadRequest;
  }

}
