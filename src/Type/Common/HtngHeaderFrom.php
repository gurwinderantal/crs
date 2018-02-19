<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class HtngHeaderFrom
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class HtngHeaderFrom {

    /**
     * @var string
     */
    protected $systemId;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Credential
     */
    protected $Credential;

    /**
     * HtngHeaderFrom constructor.
     *
     * @param string|NULL $systemId
     * @param \GurwinderAntal\crs\Type\Common\Credential|NULL $Credential
     */
    public function __construct(
        string $systemId = NULL,
        Credential $Credential = NULL
    ) {
        $this->systemId = $systemId;
        $this->Credential = $Credential;
    }

}
