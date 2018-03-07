<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class ResGuestRPH
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class ResGuestRPH {

    /**
     * @var null|string
     */
    public $RPH;

    /**
     * ResGuestRPH constructor.
     *
     * @param null|string $RPH
     */
    public function __construct(?string $RPH) {
        $this->RPH = $RPH;
    }

}
