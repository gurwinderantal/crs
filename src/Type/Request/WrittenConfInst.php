<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class WrittenConfInst
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class WrittenConfInst {

    /**
     * @var \GurwinderAntal\crs\Type\Request\SupplementalData|null
     */
    protected $SupplementalData;

    /**
     * @var null|string
     */
    protected $LanguageID;

    /**
     * @var null|string
     */
    protected $AddresseeName;

    /**
     * @var
     */
    protected $Address;

    /**
     * @var null|string
     */
    protected $Telephone;

    /**
     * WrittenConfInst constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\SupplementalData|null $SupplementalData
     * @param null|string $LanguageID
     * @param null|string $AddresseeName
     * @param null|string $Address
     * @param null|string $Telephone
     */
    public function __construct(
        ?SupplementalData $SupplementalData,
        ?string $LanguageID,
        ?string $AddresseeName,
        ?string $Address,
        ?string $Telephone
    ) {
        $this->SupplementalData = $SupplementalData;
        $this->LanguageID = $LanguageID;
        $this->AddresseeName = $AddresseeName;
        $this->Address = $Address;
        $this->Telephone = $Telephone;
    }

}
