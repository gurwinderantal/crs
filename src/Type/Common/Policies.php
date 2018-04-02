<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Policies
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Policies {

    /**
     * Currently unused.
     */
    protected $Policy;

    /**
     * @var null|string
     */
    protected $SendPolicies;

    /**
     * Policies constructor.
     *
     * @param $Policy
     * @param null|string $SendPolicies
     */
    public function __construct(
        $Policy,
        ?string $SendPolicies
    ) {
        $this->Policy = $Policy;
        $this->SendPolicies = $SendPolicies;
    }

}
