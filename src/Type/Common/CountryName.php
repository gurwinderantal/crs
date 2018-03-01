<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class CountryName
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class CountryName {

    /**
     * @var null|string
     */
    public $Code;

    /**
     * CountryName constructor.
     *
     * @param null|string $Code
     */
    public function __construct(?string $Code) {
        $this->Code = $Code;
    }

}
