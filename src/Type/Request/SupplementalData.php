<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class SupplementalData
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class SupplementalData {

    /**
     * Currently unused.
     */
    protected $Text;

    /**
     * @var null|string
     */
    protected $Name;

    /**
     * @var null|string
     */
    protected $ParagraphNumber;

    /**
     * @var null|string
     */
    protected $CreateDateTime;

    /**
     * @var null|string
     */
    protected $CreatorID;

    /**
     * @var null|string
     */
    protected $LastModifyDateTime;

    /**
     * @var null|string
     */
    protected $LastModifierID;

    /**
     * @var null|string
     */
    protected $Language;

    /**
     * SupplementalData constructor.
     *
     * @param $Text
     * @param null|string $Name
     * @param null|string $ParagraphNumber
     * @param null|string $CreateDateTime
     * @param null|string $CreatorID
     * @param null|string $LastModifyDateTime
     * @param null|string $LastModifierID
     * @param null|string $Language
     */
    public function __construct(
        $Text,
        ?string $Name,
        ?string $ParagraphNumber,
        ?string $CreateDateTime,
        ?string $CreatorID,
        ?string $LastModifyDateTime,
        ?string $LastModifierID,
        ?string $Language
    ) {
        $this->Text = $Text;
        $this->Name = $Name;
        $this->ParagraphNumber = $ParagraphNumber;
        $this->CreateDateTime = $CreateDateTime;
        $this->CreatorID = $CreatorID;
        $this->LastModifyDateTime = $LastModifyDateTime;
        $this->LastModifierID = $LastModifierID;
        $this->Language = $Language;
    }

}
