<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class PersonName
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class PersonName {

    /**
     * @var null|string
     */
    public $NamePrefix;

    /**
     * @var null|string
     */
    public $NameTitle;

    /**
     * @var null|string
     */
    public $GivenName;

    /**
     * @var null|string
     */
    public $MiddleName;

    /**
     * @var null|string
     */
    public $Surname;

    /**
     * @var null|string
     */
    public $NameSuffix;

    /**
     * @var null|string
     */
    public $NameType;

    /**
     * PersonName constructor.
     *
     * @param null|string $NamePrefix
     * @param null|string $NameTitle
     * @param null|string $GivenName
     * @param null|string $MiddleName
     * @param null|string $Surname
     * @param null|string $NameSuffix
     * @param null|string $NameType
     */
    public function __construct(
        ?string $NamePrefix,
        ?string $NameTitle,
        ?string$GivenName,
        ?string $MiddleName,
        ?string $Surname,
        ?string $NameSuffix,
        ?string $NameType
    ) {
        $this->NamePrefix = $NamePrefix;
        $this->NameTitle = $NameTitle;
        $this->GivenName = $GivenName;
        $this->MiddleName = $MiddleName;
        $this->Surname = $Surname;
        $this->NameSuffix = $NameSuffix;
        $this->NameType = $NameType;
    }

}
