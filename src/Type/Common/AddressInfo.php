<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class AddressInfo
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class AddressInfo extends Address {

    public function __construct(
        $AddressLine,
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
        parent::__construct($AddressLine, $CityName, $PostalCode, $StateProv, $CountryName, $Type, $Remark, $CompanyName, $FormattedInd, $DefaultInd);
    }

}
