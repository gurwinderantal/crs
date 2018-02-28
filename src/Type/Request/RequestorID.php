<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RequestorID
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RequestorID extends UniqueID {

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
        CompanyName $CompanyName = NULL,
        string $ID = NULL,
        string $ID_Context = NULL,
        string $Instance = NULL,
        string $PinNumber = NULL,
        string $MessagePassword = NULL
    ) {
        parent::__construct($CompanyName, $ID, $ID_Context, $Instance, $PinNumber);
        $this->MessagePassword = $MessagePassword;
    }

}
