<?php

namespace GurwinderAntal\crs\DataType\HotelAvailRQ;

/**
 * Class HotelAvailRQ
 *
 * @package GurwinderAntal\crs\DataType\HotelAvailRQ
 */
class HotelAvailRQ {

    /**
     * @var int
     */
    protected $maxResponses;

    /**
     * @var string
     */
    protected $primaryLang;

    /**
     * @var bool
     */
    protected $exactMatchOnly;

    /**
     * @var \GurwinderAntal\crs\DataType\shared\POS
     */
    protected $pos;

    /**
     * @var \GurwinderAntal\crs\DataType\HotelAvailRQ\AvailRequestSegment[]
     */
    protected $availRequestSegments;

    /**
     * HotelAvailRQ constructor.
     *
     * @param $maxResponses
     * @param $primaryLang
     * @param $exactMatchOnly
     * @param $pos
     * @param $availRequestSegments
     */
    public function __construct($maxResponses, $primaryLang, $exactMatchOnly, $pos, $availRequestSegments) {
        $this->maxResponses = $maxResponses;
        $this->primaryLang = $primaryLang;
        $this->exactMatchOnly = $exactMatchOnly;
        $this->pos = $pos;
        $this->availRequestSegments = $availRequestSegments;
    }

    public function getRequestData() {
        $data = [
            'MaxResponses'         => $this->maxResponses,
            'PrimaryLang'          => $this->primaryLang,
            'ExactMatchOnly'       => $this->exactMatchOnly,
            'POS'                  => $this->pos->getRequestData(),
            'AvailRequestSegments' => [
                'AvailRequestSegment' => [],
            ],
        ];
        foreach ($this->availRequestSegments as $availRequestSegment) {
            $data['AvailRequestSegments']['AvailRequestSegment'][] = $availRequestSegment->getRequestData();
        }
        return $data;
    }

}
