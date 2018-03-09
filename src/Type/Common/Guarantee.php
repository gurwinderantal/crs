<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Guarantee
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Guarantee {

    /**
     * @var array|\GurwinderAntal\crs\Type\Common\GuaranteeAccepted[]|null
     */
    public $GuaranteesAccepted;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Paragraph|null
     */
    public $GuaranteeDescription;

    /**
     * Currently unused.
     */
    public $AmountPercent;

    /**
     * Currently unused.
     */
    public $Deadline;

    /**
     * @var null|string
     */
    public $GuaranteeCode;

    /**
     * Guarantee constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\GuaranteeAccepted[]|null $GuaranteesAccepted
     * @param \GurwinderAntal\crs\Type\Common\Paragraph|null $GuaranteeDescription
     * @param $AmountPercent
     * @param $Deadline
     * @param null|string $GuaranteeCode
     */
    public function __construct(
        ?array $GuaranteesAccepted,
        ?Paragraph $GuaranteeDescription,
        $AmountPercent,
        $Deadline,
        ?string $GuaranteeCode
    ) {
        $this->GuaranteesAccepted = $GuaranteesAccepted;
        $this->GuaranteeDescription = $GuaranteeDescription;
        $this->AmountPercent = $AmountPercent;
        $this->GuaranteeCode = $GuaranteeCode;
    }

}
