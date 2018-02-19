<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class POS
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class POS {

    /**
     * @var \GurwinderAntal\crs\Type\Request\Source
     */
    protected $Source;

    /**
     * POS constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\Source $Source
     */
    public function __construct(Source $Source = NULL) {
        $this->Source = $Source;
    }

}
