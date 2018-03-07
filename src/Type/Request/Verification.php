<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\AddressInfo;
use GurwinderAntal\crs\Type\Common\Email;
use GurwinderAntal\crs\Type\Common\PersonName;

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
   * @var \GurwinderAntal\crs\Type\Common\Email
   */
  protected $Email;

  /**
   * Currently unused
   */
  protected $TPA_Extensions;

  /**
   * Verification constructor.
   * @param \GurwinderAntal\crs\Type\Common\PersonName $PersonName
   * @param \GurwinderAntal\crs\Type\Request\PaymentCard $PaymentCard
   * @param \GurwinderAntal\crs\Type\Request\DateTimeSpanType $ReservationTimeSpan
   * @param \GurwinderAntal\crs\Type\Request\TelephoneInfo $TelephoneInfo
   * @param \GurwinderAntal\crs\Type\Common\AddressInfo $AddressInfo
   * @param \GurwinderAntal\crs\Type\Common\Email $Email
   * @param $TPA_Extensions
   */
  public function __construct(
    ?PersonName $PersonName,
    ?PaymentCard $PaymentCard,
    ?DateTimeSpanType $ReservationTimeSpan,
    ?TelephoneInfo $TelephoneInfo,
    ?AddressInfo $AddressInfo,
    ?Email $Email,
    $TPA_Extensions
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
