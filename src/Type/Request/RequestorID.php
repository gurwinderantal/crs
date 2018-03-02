<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class RequestorID
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class RequestorID extends UniqueID {

    /**
     * @var null|string
     */
    protected $MessagePassword;

    /**
     * RequestorID constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\CompanyName|null $CompanyName
     * @param null|string $Type
     * @param null|string $ID
     * @param null|string $ID_Context
     * @param null|string $Instance
     * @param null|string $PinNumber
     * @param null|string $MessagePassword
     */
    public function __construct(
        ?CompanyName $CompanyName,
        ?string $Type,
        ?string $ID,
        ?string $ID_Context,
        ?string $Instance,
        ?string $PinNumber,
        ?string $MessagePassword
    ) {
        parent::__construct($CompanyName, $Type, $ID, $ID_Context, $Instance, $PinNumber);
        $this->MessagePassword = $MessagePassword;
    }

}
