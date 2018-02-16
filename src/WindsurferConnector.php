<?php

namespace GurwinderAntal\crs;

use GurwinderAntal\crs\DataType\HotelAvailRQ\AvailRequestSegment;
use GurwinderAntal\crs\DataType\HotelAvailRQ\Criterion;
use GurwinderAntal\crs\DataType\HotelAvailRQ\GuestCount;
use GurwinderAntal\crs\DataType\HotelAvailRQ\HotelAvailRQ;
use GurwinderAntal\crs\DataType\HotelAvailRQ\RoomStayCandidate;
use GurwinderAntal\crs\DataType\HotelAvailRQ\StayDateRange;
use GurwinderAntal\crs\DataType\shared\POS;

/**
 * Class WindsurferConnector
 * Provides functionality specific to Windsurfer.
 *
 * @package GurwinderAntal\crs
 */
class WindsurferConnector extends CrsConnectorBase {

    /**
     * {@inheritdoc}
     */
    public function __construct($wsdl, $credentials, array $options = []) {
        parent::__construct($wsdl, $credentials, $options);
        $this->setHeaders('http://htng.org/2009B');
    }

    /**
     * {@inheritdoc}
     */
    public function checkAvailability($hotelRef, $start_date, $end_date, $roomCount, $adultCount, $childCount) {
        // Build POS
        $pos = new POS($this->credentials);
        // Build GuestCounts
        $guestCounts = [
            new GuestCount(self::ADULT_AGE_QUALIFYING_CODE, $adultCount),
            new GuestCount(self::CHILD_AGE_QUALIFYING_CODE, $childCount),
        ];
        // Build RoomStayCandidates
        $roomStayCandidates = [
            new RoomStayCandidate($roomCount, $guestCounts),
        ];
        // Build criteria
        $criteria = [
            new Criterion($hotelRef),
        ];
        // Build StayDateRange
        $stayDateRange = new StayDateRange($start_date, $end_date);
        // Build AvailRequestSegments
        $availRequestSegments = [
            new AvailRequestSegment('AreaList', $stayDateRange, $roomStayCandidates, $criteria),
        ];
        // Build request
        $hotelAvailRQ = new HotelAvailRQ(10, 'en', FALSE, $pos, $availRequestSegments);
        $request = [
            'CheckHotelAvailability' => [
                'OTA_HotelAvailRQ' => $hotelAvailRQ->getRequestData(),
            ],
        ];
        $response = $this->client->__soapCall('CheckHotelAvailability', $request);
        return $response;
    }

}
