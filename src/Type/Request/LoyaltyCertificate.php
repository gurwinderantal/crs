<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class LoyaltyCertificate
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class LoyaltyCertificate {

    /**
     * @var null|string
     */
    protected $CertificateNumber;

    /**
     * @var null|string
     */
    protected $MemberNumber;

    /**
     * @var null|string
     */
    protected $ProgramName;

    /**
     * @var null|string
     */
    protected $EffectiveDate;

    /**
     * @var null|string
     */
    protected $ExpireDate;

    /**
     * @var bool
     */
    protected $ExpireDateExclusiveIndicator;

    /**
     * @var null|string
     */
    protected $NmbrOfNights;

    /**
     * @var null|string
     */
    protected $Status;

    /**
     * LoyaltyCertificate constructor.
     *
     * @param null|string $CertificateNumber
     * @param null|string $MemberNumber
     * @param null|string $ProgramName
     * @param null|string $EffectiveDate
     * @param null|string $ExpireDate
     * @param bool $ExpireDateExclusiveIndicator
     * @param null|string $NmbrOfNights
     * @param null|string $Status
     */
    public function __construct(
        ?string $CertificateNumber,
        ?string $MemberNumber,
        ?string $ProgramName,
        ?string $EffectiveDate,
        ?string $ExpireDate,
        bool $ExpireDateExclusiveIndicator,
        ?string $NmbrOfNights,
        ?string $Status
    ) {
        $this->CertificateNumber = $CertificateNumber;
        $this->MemberNumber = $MemberNumber;
        $this->ProgramName = $ProgramName;
        $this->EffectiveDate = $EffectiveDate;
        $this->ExpireDate = $ExpireDate;
        $this->ExpireDateExclusiveIndicator = $ExpireDateExclusiveIndicator;
        $this->NmbrOfNights = $NmbrOfNights;
        $this->Status = $Status;
    }

}
