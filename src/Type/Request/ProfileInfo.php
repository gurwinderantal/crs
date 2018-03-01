<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\Profile;

/**
 * Class ProfileInfo
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class ProfileInfo {

    /**
     * @var \GurwinderAntal\crs\Type\Request\UniqueID|null
     */
    protected $UniqueID;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Profile|null
     */
    protected $Profile;

    /**
     * Currently unused.
     */
    protected $CompanyInfo;

    /**
     * ProfileInfo constructor.
     *
     * @param \GurwinderAntal\crs\Type\Request\UniqueID|null $UniqueID
     * @param \GurwinderAntal\crs\Type\Common\Profile|null $Profile
     * @param $CompanyInfo
     */
    public function __construct(
        ?UniqueID $UniqueID,
        ?Profile $Profile,
        $CompanyInfo
    ) {
        $this->UniqueID = $UniqueID;
        $this->Profile = $Profile;
        $this->CompanyInfo = $CompanyInfo;
    }

}
