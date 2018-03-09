<?php

namespace GurwinderAntal\crs\Type\Common;

use GurwinderAntal\crs\Type\Request\LoyaltyRedemption;
use GurwinderAntal\crs\Type\Request\PaymentCard;

/**
 * Class GuaranteeAccepted
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class GuaranteeAccepted {

    /**
     * @var \GurwinderAntal\crs\Type\Request\PaymentCard|null
     */
    protected $PaymentCard;

    /**
     * @var \GurwinderAntal\crs\Type\Request\LoyaltyRedemption|null
     */
    protected $LoyaltyRedemption;

    /**
     * @var null|string
     */
    protected $PaymentTransactionTypeCode;

    /**
     * GuaranteeAccepted constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\PaymentCard|null $PaymentCard
     * @param \GurwinderAntal\crs\Type\Request\LoyaltyRedemption|null $LoyaltyRedemption
     * @param null|string $PaymentTransactionTypeCode
     */
    public function __construct(
        ?PaymentCard $PaymentCard,
        ?LoyaltyRedemption $LoyaltyRedemption,
        ?string $PaymentTransactionTypeCode
    ) {
        $this->PaymentCard = $PaymentCard;
        $this->LoyaltyRedemption = $LoyaltyRedemption;
        $this->PaymentTransactionTypeCode = $PaymentTransactionTypeCode;
    }

}
