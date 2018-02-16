<?php

namespace GurwinderAntal\crs\DataType\shared;

/**
 * Class POS
 *
 * @package GurwinderAntal\crs\DataType\shared
 */
class POS {

    /**
     * @var string
     *    The type of booking channel.
     */
    protected $bookingChannelType;

    /**
     * @var string
     *    The booking channel identifying code.
     */
    protected $companyNameCode;

    /**
     * @var string
     *    The booking channel short name.
     */
    protected $companyShortName;

    /**
     * @var int
     *    Unique ID assigned to the source by the CRS.
     */
    protected $requestorId;

    /**
     * @var string
     *    The source of the ID (eg. IATA, Open Hospitality).
     */
    protected $idContext;

    /**
     * Pos constructor.
     *
     * @param array $params
     */
    public function __construct($params) {
        $this->bookingChannelType = array_key_exists('Type', $params) ? $params['Type'] : NULL;
        $this->companyNameCode = array_key_exists('Code', $params) ? $params['Code'] : NULL;
        $this->companyShortName = array_key_exists('CompanyShortName', $params) ? $params['CompanyShortName'] : NULL;
        $this->requestorId = array_key_exists('ID', $params) ? $params['ID'] : NULL;
        $this->idContext = array_key_exists('ID_Context', $params) ? $params['ID_Context'] : NULL;
    }

    /**
     * @return array
     */
    public function getRequestData() {
        $data = [
            'Source' => [],
        ];
        if (strtolower($this->idContext) == 'synxis') {
            $data['Source'] = [
                'RequestorId' => [
                    'ID'          => $this->requestorId,
                    'ID_Context'  => $this->idContext,
                    'CompanyName' => [
                        'Code' => $this->companyNameCode,
                    ],
                ],
            ];
        }
        else {
            $data['Source'] = [
                'BookingChannel' => [
                    'Primary'     => TRUE,
                    'Type'        => $this->bookingChannelType,
                    'CompanyName' => [
                        'Code'             => $this->companyNameCode,
                        'CompanyShortName' => $this->companyShortName,
                    ],
                ],
                'RequestorID'    => [
                    'ID'         => $this->requestorId,
                    'ID_Context' => $this->idContext,
                    'Type'       => 1,
                ],
            ];
        }
        return $data;
    }

}
