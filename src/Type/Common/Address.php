<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Address
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Address {

    /**
     * @var null|string[]
     */
    public $AddressLine;

    /**
     * @var null|string
     */
    public $CityName;

    /**
     * @var null|string
     */
    public $PostalCode;

    /**
     * @var \GurwinderAntal\crs\Type\Common\StateProv|null
     */
    public $StateProv;

    /**
     * @var \GurwinderAntal\crs\Type\Common\CountryName|null
     */
    public $CountryName;

    /**
     * @var null|string
     */
    public $Type;

    /**
     * @var null|string
     */
    public $Remark;

    /**
     * @var null|string
     */
    public $CompanyName;

    /**
     * @var bool
     */
    public $FormattedInd;

    /**
     * @var bool
     */
    public $DefaultInd;

    /**
     * Address constructor.
     *
     * @param string[]|null $AddressLine
     * @param null|string $CityName
     * @param null|string $PostalCode
     * @param \GurwinderAntal\crs\Type\Common\StateProv|null $StateProv
     * @param \GurwinderAntal\crs\Type\Common\CountryName|null $CountryName
     * @param null|string $Type
     * @param null|string $Remark
     * @param null|string $CompanyName
     * @param bool $FormattedInd
     * @param bool $DefaultInd
     */
    public function __construct(
        ?array $AddressLine,
        ?string $CityName,
        ?string $PostalCode,
        ?StateProv $StateProv,
        ?CountryName $CountryName,
        ?string $Type,
        ?string $Remark,
        ?string $CompanyName,
        bool $FormattedInd,
        bool $DefaultInd
    ) {
        $this->AddressLine = $AddressLine;
        $this->CityName = $CityName;
        $this->PostalCode = $PostalCode;
        $this->StateProv = $StateProv;
        $this->CountryName = $CountryName;
        $this->Type = $Type;
        $this->Remark = $Remark;
        $this->CompanyName = $CompanyName;
        $this->FormattedInd = $FormattedInd;
        $this->DefaultInd = $DefaultInd;
    }

}
