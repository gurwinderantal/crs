<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class MessageType
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class MessageType {

  /**
   * @var string|null
   */
  protected $MessageContent;

  /**
   * @var string|null
   */
  protected $HotelCodeContext;

  /**
   * @var string|null
   */
  protected $ReasonForRequest;

  /**
   * @var string|null
   */
  protected $ConfirmationID;

  /**
   * MessageType constructor.
   *
   * @param null|string $MessageContent
   * @param null|string $HotelCodeContext
   * @param null|string $ReasonForRequest
   * @param null|string $ConfirmationID
   */
  public function __construct(
    ?string $MessageContent,
    ?string $HotelCodeContext,
    ?string $ReasonForRequest,
    ?string $ConfirmationID
  ) {
    $this->MessageContent = $MessageContent;
    $this->HotelCodeContext = $HotelCodeContext;
    $this->ReasonForRequest = $ReasonForRequest;
    $this->ConfirmationID = $ConfirmationID;
  }

}
