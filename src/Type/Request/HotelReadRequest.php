<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class HotelReadRequest
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class HotelReadRequest {

  /**
   * @var \GurwinderAntal\crs\Type\Request\UserID|null
   */
  protected $UserID;

  /**
   * @var string|null
   */
  protected $CityName;

  /**
   * @var \GurwinderAntal\crs\Type\Request\Verification|null
   */
  protected $Verification;

  /**
   * @var \GurwinderAntal\crs\Type\Request\SelectionCriteria|null
   */
  protected $SelectionCriteria;

  /**
   * Currently unused.
   */
  protected $TPA_Extensions;

  /**
   * HotelReadRequest constructor.
   *
   * @param \GurwinderAntal\crs\Type\Request\UserID|null $UserID
   * @param string|null $CityName
   * @param \GurwinderAntal\crs\Type\Request\Verification|null $Verification
   * @param \GurwinderAntal\crs\Type\Request\SelectionCriteria|null $SelectionCriteria
   * @param $TPA_Extensions
   */
  public function __construct(
    ?UserID $UserID,
    ?string $CityName,
    ?Verification $Verification,
    ?SelectionCriteria $SelectionCriteria,
    $TPA_Extensions
  ) {
    $this->UserID = $UserID;
    $this->CityName = $CityName;
    $this->Verification = $Verification;
    $this->UserID = $UserID;
    $this->SelectionCriteria = $SelectionCriteria;
    $this->TPA_Extensions = $TPA_Extensions;
  }

}
