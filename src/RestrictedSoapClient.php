<?php

namespace GurwinderAntal\crs;

/**
 * SoapClient subclass to use when an actual request should not be made to the
 * SOAP API.
 *
 * @package GurwinderAntal\crs
 */
class RestrictedSoapClient extends \SoapClient {

    /**
     * @var string
     */
    private $secret_key;

    /**
     * @var string
     */
    private $base_url;

    /**
     * RestrictedSoapClient constructor.
     *
     * @param $wsdl
     * @param array|NULL $options
     * @param $config
     */
    public function __construct($wsdl, array $options = NULL, $config) {
        $this->secret_key = $config['key'];
        $this->base_url = $config['url'];
        parent::__construct($wsdl, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function __doRequest($request, $location, $action, $version, $one_way = 0) {
        // Make myCheck request here itself?
        $params = [
            'pciRequest' => [
                'url'         => '',
                'preActions'  => [],
                'postActions' => [],
                'pciEntity'   => 'MYCHECK',
                'headers'     => new \stdClass(),
                'query'       => '',
                'method'      => '',
                'body'        => '',
            ],
            'posRequest' => [
                'posEntity'    => 'INFOR',
                'responseType' => '',
                'url'          => $location,
                'soapAction'   => '',
                'preActions'   => [
                    'MMYY_EXP_DATE',
                    'MAP_CC_TYPE',
                ],
                'mappings'     => [
                    'cardTypes' => [],
                ],
                'postActions'  => [],
                'json'         => [],
                'query'        => '',
                'method'       => 'SOAP',
                'body'         => '',
            ],
        ];
        $crs = strpos($location, 'synxis') !== FALSE ? 'synxis' : 'windsurfer';
        // Windsurfer's WSDL lists the service endpoint as http instead of https. MyCheck no likey.
        if ($crs == 'windsurfer') {
            $params['posRequest']['url'] = str_replace('http://', 'https://', $location);
            $params['posRequest']['mappings']['cardTypes'] = [
                'VISA'       => 'VISA',
                'MASTERCARD' => 'MASTER',
                'AMEX'       => 'AMEX',
                'DISCOVER'   => 'DISCOVER',
                'DINERS'     => 'DINERSCLUB',
                'JCB'        => 'JCB',
                'MAESTRO'    => 'MASTER',
            ];
        }
        else {
            $params['posRequest']['mappings']['cardTypes'] = [
                'VISA'       => 'VI',
                'MASTERCARD' => 'MC',
                'AMEX'       => 'AX',
                'DISCOVER'   => 'DS',
                'DINERS'     => 'DN',
                'JCB'        => 'JC',
                'MAESTRO'    => 'SW',
            ];
        }
        $params['pciRequest']['body'] = $this->extractToken($crs, $request);
        $params['posRequest']['body'] = urlencode($request);
        $proxy_response = $this->sendRequest(json_encode($params, JSON_UNESCAPED_SLASHES));
        $response_array = json_decode($proxy_response, TRUE);
        if ($response_array['status'] == 'OK') {
            $response = urldecode($response_array['message']);
        }
        else {
            $response = NULL;
        }
        return $response;
    }

    /**
     *  Replace the CardNumber field in the request markup.
     *
     * @param $request
     *
     * @return string
     */
    private function extractToken($crs, &$request) {
        $xml = simplexml_load_string($request, 'SimpleXMLElement');
        if ($crs == 'synxis') {
            $token = $xml
                ->children('http://schemas.xmlsoap.org/soap/envelope/')
                ->Body
                ->children('http://www.opentravel.org/OTA/2003/05')
                ->OTA_HotelResRQ
                ->HotelReservations
                ->HotelReservation
                ->ResGlobalInfo
                ->Guarantee
                ->GuaranteesAccepted
                ->GuaranteeAccepted
                ->PaymentCard
                ->attributes()
                ->CardNumber
                ->__toString();
            $xml->children('http://schemas.xmlsoap.org/soap/envelope/')
                ->Body
                ->children('http://www.opentravel.org/OTA/2003/05')
                ->OTA_HotelResRQ
                ->HotelReservations
                ->HotelReservation
                ->ResGlobalInfo
                ->Guarantee
                ->GuaranteesAccepted
                ->GuaranteeAccepted
                ->PaymentCard
                ->attributes()
                ->CardNumber = '{cardNumber}';
        }
        else {
            $token = $xml
                ->children('http://schemas.xmlsoap.org/soap/envelope/')
                ->Body
                ->children('http://htng.org/2009B')
                ->ProcessHotelReservation
                ->children('http://www.opentravel.org/OTA/2003/05')
                ->OTA_HotelResRQ
                ->HotelReservations
                ->HotelReservation
                ->RoomStays
                ->RoomStay
                ->Guarantee
                ->GuaranteesAccepted
                ->GuaranteeAccepted
                ->PaymentCard
                ->attributes()
                ->CardNumber
                ->__toString();
            $xml->children('http://schemas.xmlsoap.org/soap/envelope/')
                ->Body
                ->children('http://htng.org/2009B')
                ->ProcessHotelReservation
                ->children('http://www.opentravel.org/OTA/2003/05')
                ->OTA_HotelResRQ
                ->HotelReservations
                ->HotelReservation
                ->RoomStays
                ->RoomStay
                ->Guarantee
                ->GuaranteesAccepted
                ->GuaranteeAccepted
                ->PaymentCard
                ->attributes()
                ->CardNumber = '{cardNumber}';
        }
        $request = $xml->asXML();
        return $token;
    }

  /**
   * @param string $data
   *
   * @return mixed
   */
    private function sendRequest(string $data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'SecretKey: ' . $this->secret_key,
        ]);
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_URL, $this->base_url . '/wallet/api/v1/billing/proxy');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function logRequest($request, $filename) {
        $dir = $_SERVER['DOCUMENT_ROOT']. '/sites/default/files/messages';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, TRUE);
        }
        $reqFile = fopen($dir . '/' . $filename, 'w');
        fwrite($reqFile, $request);
        fclose($reqFile);
    }

}
