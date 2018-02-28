<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class UniqueID
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class UniqueID {

    /**
     * @var \GurwinderAntal\crs\Type\Request\CompanyName
     */
    protected $CompanyName;

    /**
     * @var string
     */
    protected $ID;

    /**
     * @var string
     */
    protected $ID_Context;

    /**
     * @var string
     */
    protected $Instance;

    /**
     * @var string
     */
    protected $PinNumber;

    /**
     * UniqueID constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\CompanyName|NULL $CompanyName
     * @param string|NULL $ID
     * @param string|NULL $ID_Context
     * @param string|NULL $Instance
     * @param string|NULL $PinNumber
     */
    public function __construct(
        CompanyName $CompanyName = NULL,
        string $ID = NULL,
        string $ID_Context = NULL,
        string $Instance = NULL,
        string $PinNumber = NULL
    ) {
        $this->CompanyName = $CompanyName;
        $this->ID = $ID;
        $this->ID_Context = $ID_Context;
        $this->Instance = $Instance;
        $this->PinNumber = $PinNumber;
    }

}
