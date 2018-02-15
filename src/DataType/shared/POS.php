<?php

namespace GurwinderAntal\Synxis\DataType\shared;

/**
 * Class POS
 *
 * @package GurwinderAntal\Synxis\DataType\shared
 */
class POS {

    /**
     * @var string
     */
    protected $channelCode;

    /**
     * @var int
     */
    protected $channelId;

    /**
     * Pos constructor.
     *
     * @param $channelCode
     * @param $channelId
     */
    public function __construct($channelCode, $channelId) {
        $this->channelCode = $channelCode;
        $this->channelId = $channelId;
    }

    /**
     * @return array
     */
    public function getRequestData() {
        return [
            'Source' => [
                'RequestorId' => [
                    'CompanyName' => [
                        'Code' => $this->channelCode,
                    ],
                    'ID'          => $this->channelId,
                    'ID_Context'  => 'Synxis',
                ],
            ],
        ];
    }

}
