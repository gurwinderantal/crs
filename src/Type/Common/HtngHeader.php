<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class HtngHeader
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class HtngHeader {

    /**
     * @var \GurwinderAntal\crs\Type\Common\HtngHeaderFrom
     */
    protected $From;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HtngHeaderTo
     */
    protected $To;

    /**
     * @var string
     */
    protected $timeStamp;

    /**
     * @var string
     */
    protected $echoToken;

    /**
     * @var string
     */
    protected $transactionId;

    /**
     * @var string
     */
    protected $action;

    /**
     * HtngHeader constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\HtngHeaderFrom|NULL $From
     * @param \GurwinderAntal\crs\Type\Common\HtngHeaderTo|NULL $To
     * @param string|NULL $timeStamp
     * @param string|NULL $echoToken
     * @param string|NULL $transactionId
     * @param string|NULL $action
     */
    public function __construct(
        HtngHeaderFrom $From = NULL,
        HtngHeaderTo $To = NULL,
        string $timeStamp = NULL,
        string $echoToken = NULL,
        string $transactionId = NULL,
        string $action = NULL
    ) {
        $this->From = $From;
        $this->To = $To;
        $this->timeStamp = $timeStamp;
        $this->echoToken = $echoToken;
        $this->transactionId = $transactionId;
        $this->action = $action;
    }

}
