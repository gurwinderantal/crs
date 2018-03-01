<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class Paragraph
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class Paragraph {

    /**
     * @var null|string
     */
    public $Text;

    /**
     * @var null|string
     */
    public $Image;

    /**
     * @var null|string
     */
    public $URL;

    /**
     * @var null|string
     */
    public $Name;

    /**
     * Paragraph constructor.
     *
     * @param null|string $Text
     * @param null|string $Image
     * @param null|string $URL
     * @param null|string $Name
     */
    public function __construct(
        ?string $Text,
        ?string $Image,
        ?string $URL,
        ?string $Name
    ) {
        $this->Text = $Text;
        $this->Image = $Image;
        $this->URL = $URL;
        $this->Name = $Name;
    }

}
