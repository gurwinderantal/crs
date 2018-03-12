<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class OTA_HotelGetMsgRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelGetMsgRQ extends OtaRequestMessage {

  /**
   * @var \GurwinderAntal\crs\Type\Request\MessageType[]|null
   */
  protected $Messages;

  /**
   * OTA_HotelGetMsgRQ constructor.
   *
   * @param null|string $EchoToken
   * @param null|string $PrimaryLangID
   * @param null|string $AltLangID
   * @param null|string $TimeStamp
   * @param null|string $Target
   * @param null|string $Version
   * @param null|string $MessageContentCode
   * @param $TPA_Extensions
   * @param array|null $Messages
   */
  public function __construct(
    ?string $EchoToken,
    ?string $PrimaryLangID,
    ?string $AltLangID,
    ?string $TimeStamp,
    ?string $Target,
    ?string $Version,
    ?string $MessageContentCode,
    $TPA_Extensions,
    ?array $Messages
  ) {
    parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode, $TPA_Extensions);
    $this->Messages = $Messages;
  }

}
