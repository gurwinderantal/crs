<?php

namespace GurwinderAntal\crs\Type\Common;

class Tax {

    /**
     * @var \GurwinderAntal\crs\Type\Common\Paragraph|null
     */
    public $TaxDescription;

    /**
     * @var null|string
     */
    public $Amount;

    /**
     * @var null|string
     */
    public $Percent;

    /**
     * @var null|string
     */
    public $CurrencyCode;

    /**
     * @var null|string
     */
    public $Type;

    /**
     * @var null|string
     */
    public $Code;

    /**
     * @var null|string
     */
    public $EffectiveDate;

    /**
     * @var null|string
     */
    public $ExpireDate;

    /**
     * @var null|string
     */
    public $ChargeFrequency;

    /**
     * @var null|string
     */
    public $ChargeUnit;

    /**
     * Tax constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\Paragraph|null $TaxDescription
     * @param null|string $Amount
     * @param null|string $Percent
     * @param null|string $CurrencyCode
     * @param null|string $Type
     * @param null|string $Code
     * @param null|string $EffectiveDate
     * @param null|string $ExpireDate
     * @param null|string $ChargeFrequency
     * @param null|string $ChargeUnit
     */
    public function __construct(
        ?Paragraph$TaxDescription,
        ?string $Amount,
        ?string $Percent,
        ?string $CurrencyCode,
        ?string $Type,
        ?string $Code,
        ?string $EffectiveDate,
        ?string $ExpireDate,
        ?string $ChargeFrequency,
        ?string $ChargeUnit
    ) {
        $this->TaxDescription = $TaxDescription;
        $this->Amount = $Amount;
        $this->Percent = $Percent;
        $this->CurrencyCode = $CurrencyCode;
        $this->Type = $Type;
        $this->Code = $Code;
        $this->EffectiveDate = $EffectiveDate;
        $this->ExpireDate = $ExpireDate;
        $this->ChargeFrequency = $ChargeFrequency;
        $this->ChargeUnit = $ChargeUnit;
    }

}
