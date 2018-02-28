<?php

namespace GurwinderAntal\crs\Type\Common;

/**
 * Class HtngHeader
 *
 * @package GurwinderAntal\crs\Type\Common
 */
class HtngHeader {

    /**
     * @var \GurwinderAntal\crs\Type\Common\HtngHeaderFrom|null
     */
    protected $From;

    /**
     * @var \GurwinderAntal\crs\Type\Common\HtngHeaderTo|null
     */
    protected $To;

    /**
     * @var null|string
     */
    protected $timeStamp;

    /**
     * @var null|string
     */
    protected $echoToken;

    /**
     * @var null|string
     */
    protected $transactionId;

    /**
     * @var null|string
     */
    protected $action;

    /**
     * HtngHeader constructor.
     *
     * @param \GurwinderAntal\crs\Type\Common\HtngHeaderFrom|null $From
     * @param \GurwinderAntal\crs\Type\Common\HtngHeaderTo|null $To
     * @param null|string $timeStamp
     * @param null|string $echoToken
     * @param null|string $transactionId
     * @param null|string $action
     */
    public function __construct(
        ?HtngHeaderFrom $From,
        ?HtngHeaderTo $To,
        ?string $timeStamp,
        ?string $echoToken,
        ?string $transactionId,
        ?string $action
    ) {
        $this->From = $From;
        $this->To = $To;
        $this->timeStamp = $timeStamp;
        $this->echoToken = $echoToken;
        $this->transactionId = $transactionId;
        $this->action = $action;
    }

}
