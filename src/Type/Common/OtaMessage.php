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
     * @var
     */
    public $TPA_Extensions;

    /**
     * OtaMessage constructor.
     *
     * @param NULL|string $EchoToken
     * @param NULL|string $PrimaryLangID
     * @param NULL|string $AltLangID
     * @param NULL|string $TimeStamp
     * @param NULL|string $Target
     * @param NULL|string $Version
     * @param NULL|string $MessageContentCode
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
