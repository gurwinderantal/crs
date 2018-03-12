<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\Address;
use GurwinderAntal\crs\Type\Common\Email;

/**
 * Class CompanyInfo
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class CompanyInfo {

  /**
   * @var \GurwinderAntal\crs\Type\Request\CompanyName
   */
  protected $CompanyName;

  /**
   * @var \GurwinderAntal\crs\Type\Request\TelephoneInfo
   */
  protected $TelephoneInfo;

  /**
   * @var \GurwinderAntal\crs\Type\Common\Email
   */
  protected $Email;

  /**
   * @var string|null
   */
  protected $URL;

  /**
   * @var \GurwinderAntal\crs\Type\Common\Address
   */
  protected $BusinessLocale;

  /**
   * @var \GurwinderAntal\crs\Type\Request\ContactPerson
   */
  protected $ContactPerson;

  /**
   * CompanyInfo constructor.
   *
   * @param \GurwinderAntal\crs\Type\Request\CompanyName|null $CompanyName
   * @param \GurwinderAntal\crs\Type\Request\TelephoneInfo|null $TelephoneInfo
   * @param \GurwinderAntal\crs\Type\Common\Email|null $Email
   * @param null|string $URL
   * @param \GurwinderAntal\crs\Type\Common\Address|null $BusinessLocale
   * @param \GurwinderAntal\crs\Type\Request\ContactPerson|null $ContactPerson
   */
  public function __construct(
    ?CompanyName $CompanyName,
    ?TelephoneInfo $TelephoneInfo,
    ?Email $Email,
    ?string $URL,
    ?Address $BusinessLocale,
    ?ContactPerson $ContactPerson
  ) {
    $this->CompanyName = $CompanyName;
    $this->TelephoneInfo = $TelephoneInfo;
    $this->Email = $Email;
    $this->URL = $URL;
    $this->BusinessLocale = $BusinessLocale;
    $this->ContactPerson = $ContactPerson;
  }

}
