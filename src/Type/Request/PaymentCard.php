<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class PaymentCard
 *
 * @package GurwinderAntal\crs\Type\Request
 */

class PaymentCard {

  /**
   * @var string|null
   */
  protected $CardHolderName;

  /**
   * @var \GurwinderAntal\crs\Type\Request\CardIssuerName|null
   */
  protected $CardIssuerName;

  /**
   * Currently unused.
   */
  protected $TPA_Extensions;

  /**
   * @var string|null
   */
  protected $CardType;

  /**
   * @var string|null
   */
  protected $CardCode;

  /**
   * @var string|null
   */
  protected $CardNumber;

  /**
   * @var string|null
   */
  protected $SeriesCode;

  /**
   * @var string|null
   */
  protected $ExpireDate;

  /**
   * PaymentCard constructor.
   *
   * @param string|null $CardHolderName
   * @param \GurwinderAntal\crs\Type\Request\CardIssuerName|null $CardIssuerName
   * @param $TPA_Extensions
   * @param string|null $CardType
   * @param string|null $CardCode
   * @param string|null $CardNumber
   * @param string|null $SeriesCode
   * @param string|null $ExpireDate
   */
  public function __construct(
    ?string $CardHolderName,
    ?CardIssuerName $CardIssuerName,
    $TPA_Extensions,
    ?string $CardType,
    ?string $CardCode,
    ?string $CardNumber,
    ?string $SeriesCode,
    ?string $ExpireDate
  ) {
    $this->CardHolderName = $CardHolderName;
    $this->CardIssuerName = $CardIssuerName;
    $this->TPA_Extensions = $TPA_Extensions;
    $this->CardType = $CardType;
    $this->CardCode = $CardCode;
    $this->CardNumber = $CardNumber;
    $this->SeriesCode = $SeriesCode;
    $this->ExpireDate = $ExpireDate;
  }

}
