<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Profile
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Profile {

    /**
     * Currently unused.
     */
    public $Comments;

    /**
     * Currently unused.
     */
    public $Accesses;

    /**
     * @var \GurwinderAntal\crs\Type\Common\Customer|null
     */
    public $Customer;

    /**
     * Currently unused.
     */
    public $Affiliations;

    /**
     * Currently unused.
     */
    public $CompanyInfo;

    /**
     * Currently unused.
     */
    public $PrefCollections;

    /**
     * Currently unused.
     */
    public $UserID;

    /**
     * @var null|string
     */
    public $ProfileType;

    /**
     * @var null|string
     */
    public $CreateDateTime;

    /**
     * @var null|string
     */
    public $LastModifyDateTime;

    /**
     * @var null|string
     */
    public $CreatorID;

    /**
     * @var null|string
     */
    public $ShareAllMarketInd;

    /**
     * Profile constructor.
     *
     * @param $Comments
     * @param $Accesses
     * @param \GurwinderAntal\crs\Type\Common\Customer|null $Customer
     * @param $Affiliations
     * @param $CompanyInfo
     * @param $PrefCollections
     * @param $UserID
     * @param null|string $ProfileType
     * @param null|string $CreateDateTime
     * @param null|string $LastModifyDateTime
     * @param null|string $CreatorID
     * @param null|string $ShareAllMarketInd
     */
    public function __construct(
        $Comments,
        $Accesses,
        ?Customer $Customer,
        $Affiliations,
        $CompanyInfo,
        $PrefCollections,
        $UserID,
        ?string $ProfileType,
        ?string $CreateDateTime,
        ?string $LastModifyDateTime,
        ?string $CreatorID,
        ?string $ShareAllMarketInd
    ) {
        $this->Comments = $Comments;
        $this->Accesses = $Accesses;
        $this->Customer = $Customer;
        $this->Affiliations = $Affiliations;
        $this->CompanyInfo = $CompanyInfo;
        $this->PrefCollections = $PrefCollections;
        $this->UserID = $UserID;
        $this->ProfileType = $ProfileType;
        $this->CreateDateTime = $CreateDateTime;
        $this->LastModifyDateTime = $LastModifyDateTime;
        $this->CreatorID = $CreatorID;
        $this->ShareAllMarketInd = $ShareAllMarketInd;
    }

}
