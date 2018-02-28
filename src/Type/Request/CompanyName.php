<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class CompanyName
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class CompanyName {

    /**
     * @var null|string
     */
    protected $CodeContext;

    /**
     * @var null|string
     */
    protected $CompanyShortName;

    /**
     * @var null|string
     */
    protected $TravelSelector;

    /**
     * @var null|string
     */
    protected $Code;

    /**
     * CompanyName constructor.
     *
     * @param null|string $CodeContext
     * @param null|string $CompanyShortName
     * @param null|string $TravelSelector
     * @param null|string $Code
     */
    public function __construct(
        ?string $CodeContext,
        ?string $CompanyShortName,
        ?string $TravelSelector,
        ?string $Code
    ) {
        $this->CodeContext = $CodeContext;
        $this->CompanyShortName = $CompanyShortName;
        $this->TravelSelector = $TravelSelector;
        $this->Code = $Code;
    }

}
