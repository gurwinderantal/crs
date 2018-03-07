<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\AddressInfo;
use GurwinderAntal\crs\Type\Common\Email;
use GurwinderAntal\crs\Type\Common\PersonName;

/**
 * Class ContactPerson
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ContactPerson {

  /**
   * @var \GurwinderAntal\crs\Type\Common\PersonName
   */
  protected $PersonName;

  /**
   * @var \GurwinderAntal\crs\Type\Common\Email
   */
  protected $Email;

  /**
   * @var \GurwinderAntal\crs\Type\Request\TelephoneInfo
   */
  protected $Telephone;

  /**
   * @var \GurwinderAntal\crs\Type\Common\AddressInfo
   */
  protected $Address;

  /**
   * @var string|null
   */
  protected $ContactType;

  /**
   * ContactPerson constructor.
   *
   * @param \GurwinderAntal\crs\Type\Common\PersonName|null $PersonName
   * @param \GurwinderAntal\crs\Type\Common\Email|null $Email
   * @param \GurwinderAntal\crs\Type\Request\TelephoneInfo|null $Telephone
   * @param \GurwinderAntal\crs\Type\Common\AddressInfo|null $Address
   * @param string|null $ContactType
   **/
  public function __construct(
    ?PersonName $PersonName,
    ?Email $Email,
    ?TelephoneInfo $Telephone,
    ?AddressInfo $Address,
    ?string $ContactType
  ) {
    $this->PersonName = $PersonName;
    $this->Email = $Email;
    $this->Telephone = $Telephone;
    $this->Address = $Address;
    $this->ContactType = $ContactType;
  }

}
