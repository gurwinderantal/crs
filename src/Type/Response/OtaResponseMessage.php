<?php

namespace GurwinderAntal\crs\Type\Response;

use GurwinderAntal\crs\Type\Common\OtaMessage;

/**
 * Class OtaResponseMessage
 *
 * @package GurwinderAntal\crs\Type\Response
 */
abstract class OtaResponseMessage extends OtaMessage {

    /**
     * @var object
     */
    public $Success;

    /**
     * @var array
     */
    public $Warnings;

    /**
     * @var array
     */
    public $Errors;

}
