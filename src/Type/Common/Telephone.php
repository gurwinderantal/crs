<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Telephone
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Telephone {

    /**
     * @var bool|null
     */
    public $FormattedInd;

    /**
     * @var null|string
     */
    public $PhoneTechType;

    /**
     * @var null|string
     */
    public $PhoneNumber;

    /**
     * @var null|string
     */
    public $PhoneUseType;

    /**
     * @var bool|null
     */
    public $DefaultInd;

    /**
     * Telephone constructor.
     *
     * @param bool|null $FormattedInd
     * @param null|string $PhoneTechType
     * @param null|string $PhoneNumber
     * @param null|string $PhoneUseType
     * @param bool|null $DefaultInd
     */
    public function __construct(
        ?bool $FormattedInd,
        ?string $PhoneTechType,
        ?string $PhoneNumber,
        ?string $PhoneUseType,
        ?bool $DefaultInd
    ) {
        $this->FormattedInd = $FormattedInd;
        $this->PhoneTechType = $PhoneTechType;
        $this->PhoneNumber = $PhoneNumber;
        $this->PhoneUseType = $PhoneUseType;
        $this->DefaultInd = $DefaultInd;
    }

}
