<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class HtngHeaderTo
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class HtngHeaderTo {

    /**
     * @var string
     */
    protected $systemId;

    /**
     * HtngHeaderTo constructor.
     *
     * @param string|NULL $systemId
     */
    public function __construct(string $systemId = NULL) {
        $this->systemId = $systemId;
    }

}
