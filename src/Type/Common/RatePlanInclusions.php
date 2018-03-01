<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class RatePlanInclusions
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class RatePlanInclusions {

    /**
     * @var bool|null
     */
    public $TaxInclusive;

    /**
     * RatePlanInclusions constructor.
     *
     * @param bool|null $TaxInclusive
     */
    public function __construct(?bool $TaxInclusive) {
        $this->TaxInclusive = $TaxInclusive;
    }

}
