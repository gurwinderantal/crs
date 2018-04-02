<?php

namespace GurwinderAntal\crs\Type\Request;

use GurwinderAntal\crs\Type\Common\TPA_Extensions;

/**
 * Class OTA_HotelDescriptiveInfoRQ
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class OTA_HotelDescriptiveInfoRQ extends OtaRequestMessage {

    /**
     * @var array|\GurwinderAntal\crs\Type\Request\HotelDescriptiveInfo[]|null
     */
    protected $HotelDescriptiveInfos;

    /**
     * @var \GurwinderAntal\crs\Type\Request\POS|null
     */
    protected $POS;

    /**
     * OTA_HotelDescriptiveInfoRQ constructor.
     *
     * @param null|string $EchoToken
     * @param null|string $PrimaryLangID
     * @param null|string $AltLangID
     * @param null|string $TimeStamp
     * @param null|string $Target
     * @param null|string $Version
     * @param null|string $MessageContentCode
     * @param \GurwinderAntal\crs\Type\Common\TPA_Extensions|null $TPA_Extensions
     * @param \GurwinderAntal\crs\Type\Request\HotelDescriptiveInfo[]|null $HotelDescriptiveInfos
     * @param \GurwinderAntal\crs\Type\Request\POS|null $POS
     */
    public function __construct(
        ?string $EchoToken,
        ?string $PrimaryLangID,
        ?string $AltLangID, ?string $TimeStamp,
        ?string $Target, ?string $Version,
        ?string $MessageContentCode,
        ?TPA_Extensions $TPA_Extensions,
        ?array $HotelDescriptiveInfos,
        ?POS $POS
    ) {
        parent::__construct(
            $EchoToken,
            $PrimaryLangID,
            $AltLangID,
            $TimeStamp,
            $Target,
            $Version,
            $MessageContentCode,
            $TPA_Extensions
        );
        $this->HotelDescriptiveInfos = $HotelDescriptiveInfos;
        $this->POS = $POS;
    }

}
