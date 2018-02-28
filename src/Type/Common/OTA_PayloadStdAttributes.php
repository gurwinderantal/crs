<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class OTA_PayloadStdAttributes
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class OTA_PayloadStdAttributes {

    /**
     * @var null|string
     */
    public $EchoToken;

    /**
     * @var null|string
     */
    public $PrimaryLangID;

    /**
     * @var null|string
     */
    public $AltLangID;

    /**
     * @var null|string
     */
    public $TimeStamp;

    /**
     * @var null|string
     */
    public $Target;

    /**
     * @var null|string
     */
    public $Version;

    /**
     * @var null|string
     */
    public $MessageContentCode;

    /**
     * OTA_PayloadStdAttributes constructor.
     *
     * @param null|string $EchoToken
     * @param null|string $PrimaryLangID
     * @param null|string $AltLangID
     * @param null|string $TimeStamp
     * @param null|string $Target
     * @param null|string $Version
     * @param null|string $MessageContentCode
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
