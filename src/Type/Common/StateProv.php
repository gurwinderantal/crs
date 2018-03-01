<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class CountryName
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class StateProv {

    /**
     * @var null|string
     */
    public $StateCode;

    /**
     * CountryName constructor.
     *
     * @param null|string $StateCode
     */
    public function __construct(?string $StateCode) {
        $this->StateCode = $StateCode;
    }

}
