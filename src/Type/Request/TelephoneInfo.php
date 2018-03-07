<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class TelephoneInfo
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class TelephoneInfo {

  /**
   * @var bool|null
   */
  protected $FormattedInd;

  /**
   * @var string|null
   */
  protected $PhoneTechType;

  /**
   * @var string|null
   */
  protected $PhoneNumber;

  /**
   * @var string|null
   */
  protected $PhoneUseType;

  /**
   * @var bool|null
   */
  protected $DefaultInd;

  /**
   * DateTimeSpanType constructor.
   *
   * @param bool|null $FormattedInd
   * @param string|null $PhoneTechType
   * @param string|null $PhoneNumber
   * @param string|null $PhoneUseType
   * @param bool|null $DefaultInd
   *
   */
  public function __construct(
    ?bool $FormattedInd,
    ?string $PhoneTechType,
    ?string $PhoneNumber,
    ?string $PhoneUseType,
    ?bool $DefaultInd
  ) {
    $this->FormattedInd = $FormattedInd;
    $this->PhoneTechType = $PhoneTechType;
    $this->PhoneNumber = $PhoneNumber;
    $this->PhoneNumber = $PhoneNumber;
    $this->PhoneUseType = $PhoneUseType;
    $this->DefaultInd = $DefaultInd;
  }

}
