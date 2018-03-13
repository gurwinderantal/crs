<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class HotelResModify
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class HotelResModify extends HotelReservation {

  /**
   * @var \GurwinderAntal\crs\Type\Request\Verification|null
   */
  protected $Verification;

  /**
   * HotelResModify constructor.
   *
   * @param \GurwinderAntal\crs\Type\Request\UniqueID|null $UniqueId
   * @param array|null $RoomStays
   * @param array|null $ResGuests
   * @param \GurwinderAntal\crs\Type\Request\ResGlobalInfo|null $ResGlobalInfo
   * @param $TPA_Extensions
   * @param $WrittenConfInst
   * @param $Services
   * @param \GurwinderAntal\crs\Type\Request\POS|null $POS
   * @param null|string $CreateDateTime
   * @param bool|null $RoomStayReservation
   * @param null|string $CreatorID
   * @param null|string $LastModifyDateTime
   * @param null|string $LastModifierID
   * @param null|string $ResStatus
   * @param \GurwinderAntal\crs\Type\Request\Verification|null $Verification
   */
  public function __construct(
    ?UniqueID $UniqueId,
    ?array $RoomStays,
    ?array $ResGuests,
    ?ResGlobalInfo $ResGlobalInfo,
    $TPA_Extensions,
    $WrittenConfInst,
    $Services,
    ?POS $POS,
    ?string $CreateDateTime,
    ?bool $RoomStayReservation,
    ?string $CreatorID,
    ?string $LastModifyDateTime,
    ?string $LastModifierID,
    ?string $ResStatus,
    ?Verification $Verification
  ) {
    parent::__construct($UniqueId, $RoomStays, $ResGuests, $ResGlobalInfo, $TPA_Extensions, $WrittenConfInst, $Services, $POS, $CreateDateTime, $RoomStayReservation, $CreatorID, $LastModifyDateTime, $LastModifierID, $ResStatus);
    $this->Verification = $Verification;
  }

}
