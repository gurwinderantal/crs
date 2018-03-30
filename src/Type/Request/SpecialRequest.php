<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\Paragraph;

/**
 * Class SpecialRequest
 */
class SpecialRequest extends Paragraph {

    /**
     * @var null|string
     */
    protected $RequestCode;

    /**
     * @var null|string
     */
    protected $Description;

    /**
     * SpecialRequest constructor.
     *
     * @param null|string $Text
     * @param null|string $Name
     * @param null|string $RequestCode
     * @param null|string $Description
     */
    public function __construct(
        ?string $Text,
        ?string $Name,
        ?string $RequestCode,
        ?string $Description
    ) {
        parent::__construct($Text, NULL, NULL, $Name);
        $this->RequestCode = $RequestCode;
        $this->Description = $Description;
    }

}
