<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class CompanyName
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class CompanyName {

    /**
     * @var string
     */
    protected $CodeContext;

    /**
     * @var string
     */
    protected $CompanyShortName;

    /**
     * @var string
     */
    protected $TravelSelector;

    /**
     * @var string
     */
    protected $Code;

    /**
     * CompanyName constructor.
     *
     * @param string $CodeContext
     * @param string $CompanyShortName
     * @param string $TravelSelector
     * @param string $Code
     */
    public function __construct(
        string $CodeContext,
        string $CompanyShortName,
        string $TravelSelector,
        string $Code
    ) {
        $this->CodeContext = $CodeContext;
        $this->CompanyShortName = $CompanyShortName;
        $this->TravelSelector = $TravelSelector;
        $this->Code = $Code;
    }

}
