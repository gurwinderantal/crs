<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Customer
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Customer {

    /**
     * @var \GurwinderAntal\crs\Type\Common\PersonName|null
     */
    public $PersonName;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Telephone|null
     */
    public $Telephone;

    /**
     * @var null|string
     */
    public $Email;

    /**
     * @var \GurwinderAntal\crs\Type\Common\AddressInfo|null
     */
    public $Address;

    /**
     * Currently unused.
     */
    public $PaymentForm;

    /**
     * @var \GurwinderAntal\crs\Type\Common\CustLoyalty|null
     */
    public $CustLoyalty;

    /**
     * Currently unused.
     */
    public $TPA_Extensions;

    /**
     * Currently unused.
     */
    public $RelatedTraveler;

    /**
     * Currently unused.
     */
    public $ContactPerson;

    /**
     * Currently unused.
     */
    public $AlternateLanguage;

    /**
     * @var null|string
     */
    public $BirthDate;

    /**
     * @var null|string
     */
    public $Gender;

    /**
     * @var null|string
     */
    public $CustomerValue;

    /**
     * @var null|string
     */
    public $LockoutType;

    /**
     * @var null|string
     */
    public $Language;

    /**
     * Customer constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\PersonName|null $PersonName
     * @param \GurwinderAntal\crs\Type\Common\Telephone|null $Telephone
     * @param null|string $Email
     * @param \GurwinderAntal\crs\Type\Common\AddressInfo|null $Address
     * @param $PaymentForm
     * @param $CustLoyalty
     * @param $TPA_Extensions
     * @param $RelatedTraveler
     * @param $ContactPerson
     * @param $AlternateLanguage
     * @param null|string $BirthDate
     * @param null|string $Gender
     * @param null|string $CustomerValue
     * @param null|string $LockoutType
     * @param null|string $Language
     */
    public function __construct(
        ?PersonName $PersonName,
        ?Telephone $Telephone,
        ?string $Email,
        ?AddressInfo $Address,
        $PaymentForm,
        $CustLoyalty,
        $TPA_Extensions,
        $RelatedTraveler,
        $ContactPerson,
        $AlternateLanguage,
        ?string $BirthDate,
        ?string $Gender,
        ?string $CustomerValue,
        ?string $LockoutType,
        ?string $Language
    ) {
        $this->PersonName = $PersonName;
        $this->Telephone = $Telephone;
        $this->Email = $Email;
        $this->Address = $Address;
        $this->PaymentForm = $PaymentForm;
        $this->CustLoyalty = $CustLoyalty;
        $this->TPA_Extensions = $TPA_Extensions;
        $this->RelatedTraveler = $RelatedTraveler;
        $this->ContactPerson = $ContactPerson;
        $this->AlternateLanguage = $AlternateLanguage;
        $this->BirthDate = $BirthDate;
        $this->Gender = $Gender;
        $this->CustomerValue = $CustomerValue;
        $this->LockoutType = $LockoutType;
        $this->Language = $Language;
    }

}
