<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class HtngHeaderTo
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class HtngHeaderTo {

    /**
     * @var null|string
     */
    protected $systemId;

    /**
     * HtngHeaderTo constructor.
     *
     * @param null|string $systemId
     */
    public function __construct(?string $systemId) {
        $this->systemId = $systemId;
    }

}
