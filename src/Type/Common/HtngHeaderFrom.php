<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class HtngHeaderFrom
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class HtngHeaderFrom {

    /**
     * @var null|string
     */
    protected $systemId;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Credential|null
     */
    protected $Credential;

    /**
     * HtngHeaderFrom constructor.
     *
     * @param null|string $systemId
     * @param \GurwinderAntal\crs\Type\Common\Credential|null $Credential
     */
    public function __construct(
        ?string $systemId,
        ?Credential $Credential
    ) {
        $this->systemId = $systemId;
        $this->Credential = $Credential;
    }

}
