<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\Policies;

/**
 * Class HotelDescriptiveInfo
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class HotelDescriptiveInfo {

    /**
     * Currently unused.
     */
    protected $HotelInfo;

    /**
     * Currently unused.
     */
    protected $FacilityInfo;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Policies|null
     */
    protected $Policies;

    /**
     * Currently unused.
     */
    protected $AreaInfo;

    /**
     * Currently unused.
     */
    protected $AffiliationInfo;

    /**
     * Currently unused.
     */
    protected $ContactInfo;

    /**
     * Currently unused.
     */
    protected $MultimediaObjects;

    /**
     * @var null|string
     */
    protected $ChainCode;

    /**
     * @var null|string
     */
    protected $BrandCode;

    /**
     * @var null|string
     */
    protected $HotelCode;

    /**
     * @var null|string
     */
    protected $HotelCityCode;

    /**
     * @var null|string
     */
    protected $HotelName;

    /**
     * @var null|string
     */
    protected $HotelCodeContext;

    /**
     * HotelDescriptiveInfo constructor.
     *
     * @param $HotelInfo
     * @param $FacilityInfo
     * @param \GurwinderAntal\crs\Type\Common\Policies|null $Policies
     * @param $AreaInfo
     * @param $AffiliationInfo
     * @param $ContactInfo
     * @param $MultimediaObjects
     * @param null|string $ChainCode
     * @param null|string $BrandCode
     * @param null|string $HotelCode
     * @param null|string $HotelCityCode
     * @param null|string $HotelName
     * @param null|string $HotelCodeContext
     */
    public function __construct(
        $HotelInfo,
        $FacilityInfo,
        ?Policies $Policies,
        $AreaInfo,
        $AffiliationInfo,
        $ContactInfo,
        $MultimediaObjects,
        ?string $ChainCode,
        ?string $BrandCode,
        ?string $HotelCode,
        ?string $HotelCityCode,
        ?string $HotelName,
        ?string $HotelCodeContext
    ) {
        $this->HotelInfo = $HotelInfo;
        $this->FacilityInfo = $FacilityInfo;
        $this->Policies = $Policies;
        $this->AreaInfo = $AreaInfo;
        $this->AffiliationInfo = $AffiliationInfo;
        $this->ContactInfo = $ContactInfo;
        $this->MultimediaObjects = $MultimediaObjects;
        $this->ChainCode = $ChainCode;
        $this->BrandCode = $BrandCode;
        $this->HotelCode = $HotelCode;
        $this->HotelCityCode = $HotelCityCode;
        $this->HotelName = $HotelName;
        $this->HotelCodeContext = $HotelCodeContext;
    }

}
