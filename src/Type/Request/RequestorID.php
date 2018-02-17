<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RequestorID
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RequestorID {

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
     * @var string
     */
    protected $MessagePassword;

    /**
     * RequestorID constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\CompanyName $CompanyName
     * @param string $ID
     * @param string $ID_Context
     * @param string $Instance
     * @param string $PinNumber
     * @param string $MessagePassword
     */
    public function __construct(
        CompanyName $CompanyName,
        string $ID,
        string $ID_Context,
        string $Instance,
        string $PinNumber,
        string $MessagePassword
    ) {
        $this->CompanyName = $CompanyName;
        $this->ID = $ID;
        $this->ID_Context = $ID_Context;
        $this->Instance = $Instance;
        $this->PinNumber = $PinNumber;
        $this->MessagePassword = $MessagePassword;
    }

}
