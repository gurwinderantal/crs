<?php

namespace GurwinderAntal\crs\Type\Response;

/**
 * Class OTA_HotelAvailRS
 *
 * @package GurwinderAntal\crs\Type\Response
 */
class OTA_HotelAvailRS extends OtaResponseMessage {

    /**
     * @var array
     */
    public $Services;

    /**
     * @var array
     */
    public $Profiles;

    /**
     * @var array
     */
    public $RoomStays;

    /**
     * @var array
     */
    public $HotelStays;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HotelSearchCriterion[]
     */
    public $Criteria;

}
