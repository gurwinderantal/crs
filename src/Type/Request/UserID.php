<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class UserID
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class UserID {

  /**
   * @var \GurwinderAntal\crs\Type\Request\CompanyName|null
   */
  protected $CompanyName;

  /**
   * @var string|null
   */
  protected $Type;

  /**
   * @var string|null
   */
  protected $URL;

  /**
   * @var string|null
   */
  protected $Instance;

  /**
   * @var string|null
   */
  protected $PinNumber;

  /**
   * @var string|null
   */
  protected $ID;

  /**
   * @var string|null
   */
  protected $ID_Context;

  /**
   * UserID constructor.
   *
   * @param \GurwinderAntal\crs\Type\Request\CompanyName|null $CompanyName
   * @param string|null $Type
   * @param string|null $URL
   * @param string|null $Instance
   * @param string|null $PinNumber
   * @param string|null $ID
   * @param string|null $ID_Context
   */
  public function __construct(
    ?CompanyName $CompanyName,
    ?string $Type,
    ?string $URL,
    ?string $Instance,
    ?string $PinNumber,
    ?string $ID,
    ?string $ID_Context
  ) {
    $this->CompanyName = $CompanyName;
    $this->Type = $Type;
    $this->URL = $URL;
    $this->Instance = $Instance;
    $this->PinNumber = $PinNumber;
    $this->ID = $ID;
    $this->ID_Context = $ID_Context;
  }

}
