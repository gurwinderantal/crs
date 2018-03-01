<?php

namespace GurwinderAntal\crs\Type\Request;

/**
 * Class Comment
 *
 * @package GurwinderAntal\crs\Type\Request
 */
class Comment {

    /**
     * @var string
     */
    protected $Text;

    /**
     * Comment constructor.
     *
     * @param string $Text
     */
    public function __construct(string $Text) {
        $this->Text = $Text;
    }

}
