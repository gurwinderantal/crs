<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\Customer;

/**
 * Class ProfileReadRequest
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ProfileReadRequest {

  /**
   * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
   */
  protected $UniqueID;

  /**
   * @var \GurwinderAntal\crs\Type\Request\CompanyInfo|null
   */
  protected $CompanyInfo;

  /**
   * @var \GurwinderAntal\crs\Type\Common\Customer|null
   */
  protected $Customer;

  /**
   * ProfileReadRequest constructor.
   *
   * @param \GurwinderAntal\crs\Type\Request\UniqueID|null $UniqueID
   * @param \GurwinderAntal\crs\Type\Request\CompanyInfo|null $CompanyInfo
   * @param \GurwinderAntal\crs\Type\Common\Customer|null $Customer
   */
  public function __construct(
    ?UniqueID $UniqueID,
    ?CompanyInfo $CompanyInfo,
    ?Customer $Customer
  ) {
    $this->UniqueID = $UniqueID;
    $this->CompanyInfo = $CompanyInfo;
    $this->Customer = $Customer;
  }

}
