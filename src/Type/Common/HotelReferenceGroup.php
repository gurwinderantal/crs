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
     * @var string
     */
    public $HotelCode;

    /**
     * @var string
     */
    public $HotelName;

    /**
     * @var string
     */
    public $AreaID;

    /**
     * @var string
     */
    public $HotelCodeContext;

    /**
     * @var string
     */
    public $ChainCode;

    /**
     * @var string
     */
    public $ChainName;

    /**
     * @var string
     */
    public $BrandCode;

    /**
     * @var string
     */
    public $BrandName;

    /**
     * @var string
     */
    public $HotelCityCode;

    /**
     * HotelReferenceGroup constructor.
     *
     * @param string $HotelCode
     * @param string $HotelName
     * @param string $AreaID
     * @param string $HotelCodeContext
     * @param string $ChainCode
     * @param string $ChainName
     * @param string $BrandCode
     * @param string $BrandName
     * @param string $HotelCityCode
     */
    public function __construct(
        string $HotelCode = NULL,
        string $HotelName = NULL,
        string $AreaID = NULL,
        string $HotelCodeContext = NULL,
        string $ChainCode = NULL,
        string $ChainName = NULL,
        string $BrandCode = NULL,
        string $BrandName = NULL,
        string $HotelCityCode = NULL
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
