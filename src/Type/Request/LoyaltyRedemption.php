<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class LoyaltyRedemption
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class LoyaltyRedemption {

    /**
     * @var \GurwinderAntal\crs\Type\Request\LoyaltyCertificate|null
     */
    protected $LoyaltyCertificate;

    /**
     * @var null|string
     */
    protected $RedemptionQuantity;

    /**
     * LoyaltyRedemption constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\LoyaltyCertificate|null $LoyaltyCertificate
     * @param null|string $RedemptionQuantity
     */
    public function __construct(
        ?LoyaltyCertificate $LoyaltyCertificate,
        ?string $RedemptionQuantity
    ) {
        $this->LoyaltyCertificate = $LoyaltyCertificate;
        $this->RedemptionQuantity = $RedemptionQuantity;
    }

}
