<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class HotelReferenceGroup
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class HotelReferenceGroup {

    /**
     * All elements currently unused; only attributes have been included.
     */

    /**
     * @var null|string
     */
    public $HotelCode;

    /**
     * @var null|string
     */
    public $HotelName;

    /**
     * @var null|string
     */
    public $AreaID;

    /**
     * @var null|string
     */
    public $HotelCodeContext;

    /**
     * @var null|string
     */
    public $ChainCode;

    /**
     * @var null|string
     */
    public $ChainName;

    /**
     * @var null|string
     */
    public $BrandCode;

    /**
     * @var null|string
     */
    public $BrandName;

    /**
     * @var null|string
     */
    public $HotelCityCode;

    /**
     * HotelReferenceGroup constructor.
     *
     * @param null|string $HotelCode
     * @param null|string $HotelName
     * @param null|string $AreaID
     * @param null|string $HotelCodeContext
     * @param null|string $ChainCode
     * @param null|string $ChainName
     * @param null|string $BrandCode
     * @param null|string $BrandName
     * @param null|string $HotelCityCode
     */
    public function __construct(
        ?string $HotelCode,
        ?string $HotelName,
        ?string $AreaID,
        ?string $HotelCodeContext,
        ?string $ChainCode,
        ?string $ChainName,
        ?string $BrandCode,
        ?string $BrandName,
        ?string $HotelCityCode
    ) {
        $this->HotelCode = $HotelCode;
        $this->HotelName = $HotelName;
        $this->AreaID = $AreaID;
        $this->HotelCodeContext = $HotelCodeContext;
        $this->ChainCode = $ChainCode;
        $this->ChainName = $ChainName;
        $this->BrandCode = $BrandCode;
        $this->BrandName = $BrandName;
        $this->HotelCityCode = $HotelCityCode;
    }

}
