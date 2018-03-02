<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class UniqueID
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class UniqueID {

    /**
     * @var \GurwinderAntal\crs\Type\Request\CompanyName|null
     */
    protected $CompanyName;

    /**
     * @var null|string
     */
    protected $Type;

    /**
     * @var null|string
     */
    protected $ID;

    /**
     * @var null|string
     */
    protected $ID_Context;

    /**
     * @var null|string
     */
    protected $Instance;

    /**
     * @var null|string
     */
    protected $PinNumber;

    /**
     * UniqueID constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\CompanyName|null $CompanyName
     * @param null|string $Type
     * @param null|string $ID
     * @param null|string $ID_Context
     * @param null|string $Instance
     * @param null|string $PinNumber
     */
    public function __construct(
        ?CompanyName $CompanyName,
        ?string $Type,
        ?string $ID,
        ?string $ID_Context,
        ?string $Instance,
        ?string $PinNumber
    ) {
        $this->CompanyName = $CompanyName;
        $this->ID = $ID;
        $this->ID_Context = $ID_Context;
        $this->Instance = $Instance;
        $this->PinNumber = $PinNumber;
    }

}
