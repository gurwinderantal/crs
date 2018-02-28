<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class OtaMessage
 *
 * @package GurwinderAntal\crs\Type\Common
 */
abstract class OtaMessage extends OTA_PayloadStdAttributes {

    /**
     * Currently unused.
     */
    public $TPA_Extensions;

    /**
     * OtaMessage constructor.
     *
     * @param null|string $EchoToken
     * @param null|string $PrimaryLangID
     * @param null|string $AltLangID
     * @param null|string $TimeStamp
     * @param null|string $Target
     * @param null|string $Version
     * @param null|string $MessageContentCode
     * @param $TPA_Extensions
     */
    public function __construct(
        ?string $EchoToken,
        ?string $PrimaryLangID,
        ?string $AltLangID,
        ?string $TimeStamp,
        ?string $Target,
        ?string $Version,
        ?string $MessageContentCode,
        $TPA_Extensions
    ) {
        parent::__construct($EchoToken, $PrimaryLangID, $AltLangID, $TimeStamp, $Target, $Version, $MessageContentCode);
        $this->TPA_Extensions = $TPA_Extensions;
    }

}
