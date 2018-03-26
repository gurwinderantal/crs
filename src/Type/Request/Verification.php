<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\AddressInfo;
use GurwinderAntal\crs\Type\Common\Email;
use GurwinderAntal\crs\Type\Common\PersonName;
use GurwinderAntal\crs\Type\Common\TPA_Extensions;

/**
 * Class Verification
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class Verification {

  /**
   * @var \GurwinderAntal\crs\Type\Common\PersonName
   */
  protected $PersonName;

  /**
   * @var \GurwinderAntal\crs\Type\Request\PaymentCard
   */
  protected $PaymentCard;

  /**
   * @var \GurwinderAntal\crs\Type\Request\DateTimeSpanType;
   */
  protected $ReservationTimeSpan;

  /**
   * @var \GurwinderAntal\crs\Type\Request\TelephoneInfo
   */
  protected $TelephoneInfo;

  /**
   * @var \GurwinderAntal\crs\Type\Common\AddressInfo
   */
  protected $AddressInfo;

  /**
   * @var null|string
   */
  protected $Email;

    /**
     * @var \GurwinderAntal\crs\Type\Common\TPA_Extensions|null
     */
  protected $TPA_Extensions;

  /**
   * Verification constructor.
   *
   * @param \GurwinderAntal\crs\Type\Common\PersonName|null $PersonName
   * @param \GurwinderAntal\crs\Type\Request\PaymentCard|null $PaymentCard
   * @param \GurwinderAntal\crs\Type\Request\DateTimeSpanType|null $ReservationTimeSpan
   * @param \GurwinderAntal\crs\Type\Request\TelephoneInfo|null $TelephoneInfo
   * @param \GurwinderAntal\crs\Type\Common\AddressInfo|null $AddressInfo
   * @param null|string $Email
   * @param \GurwinderAntal\crs\Type\Common\TPA_Extensions|null $TPA_Extensions
   */
  public function __construct(
    ?PersonName $PersonName,
    ?PaymentCard $PaymentCard,
    ?DateTimeSpanType $ReservationTimeSpan,
    ?TelephoneInfo $TelephoneInfo,
    ?AddressInfo $AddressInfo,
    ?string $Email,
    ?TPA_Extensions $TPA_Extensions
  ) {
    $this->PersonName = $PersonName;
    $this->PaymentCard = $PaymentCard;
    $this->ReservationTimeSpan = $ReservationTimeSpan;
    $this->TelephoneInfo = $TelephoneInfo;
    $this->AddressInfo = $AddressInfo;
    $this->Email = $Email;
    $this->TPA_Extensions = $TPA_Extensions;
  }

}
