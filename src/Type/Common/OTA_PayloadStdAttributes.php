<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class OTA_PayloadStdAttributes
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class OTA_PayloadStdAttributes {

    /**
     * @var NULL|string
     */
    public $EchoToken;

    /**
     * @var NULL|string
     */
    public $PrimaryLangID;

    /**
     * @var NULL|string
     */
    public $AltLangID;

    /**
     * @var NULL|string
     */
    public $TimeStamp;

    /**
     * @var NULL|string
     */
    public $Target;

    /**
     * @var NULL|string
     */
    public $Version;

    /**
     * @var NULL|string
     */
    public $MessageContentCode;

    /**
     * OTA_PayloadStdAttributes constructor.
     *
     * @param string|NULL $EchoToken
     * @param string|NULL $PrimaryLangID
     * @param string|NULL $AltLangID
     * @param string|NULL $TimeStamp
     * @param string|NULL $Target
     * @param string|NULL $Version
     * @param string|NULL $MessageContentCode
     */
    public function __construct(
        ?string $EchoToken,
        ?string $PrimaryLangID,
        ?string $AltLangID,
        ?string $TimeStamp ,
        ?string $Target,
        ?string $Version,
        ?string $MessageContentCode
    ) {
        $this->EchoToken = $EchoToken;
        $this->PrimaryLangID = $PrimaryLangID;
        $this->AltLangID = $AltLangID;
        $this->TimeStamp = $TimeStamp;
        $this->Target = $Target;
        $this->Version = $Version;
        $this->MessageContentCode = $MessageContentCode;
    }

}
