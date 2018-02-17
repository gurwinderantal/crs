<?php

namespace GurwinderAntal\crs\Type\Request;

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
    protected $HotelCode;

    /**
     * @var string
     */
    protected $HotelName;

    /**
     * @var string
     */
    protected $AreaID;

    /**
     * @var string
     */
    protected $HotelCodeContext;

    /**
     * @var string
     */
    protected $ChainCode;

    /**
     * @var string
     */
    protected $ChainName;

    /**
     * @var string
     */
    protected $BrandCode;

    /**
     * @var string
     */
    protected $BrandName;

    /**
     * @var string
     */
    protected $HotelCityCode;

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
        string $HotelCode,
        string $HotelName,
        string $AreaID,
        string $HotelCodeContext,
        string $ChainCode,
        string $ChainName,
        string $BrandCode,
        string $BrandName,
        string $HotelCityCode
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
