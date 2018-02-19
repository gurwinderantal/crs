<?php

namespace GurwinderAntal\crs;

use GurwinderAntal\crs\Type\Common\HotelReferenceGroup;
use GurwinderAntal\crs\Type\Common\HotelSearchCriterion;
use GurwinderAntal\crs\Type\Request\AvailRequestSegment;
use GurwinderAntal\crs\Type\Request\CompanyName;
use GurwinderAntal\crs\Type\Request\GuestCount;
use GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ;
use GurwinderAntal\crs\Type\Request\POS;
use GurwinderAntal\crs\Type\Request\RequestorID;
use GurwinderAntal\crs\Type\Request\RoomStayCandidate;
use GurwinderAntal\crs\Type\Request\Source;
use GurwinderAntal\crs\Type\Request\StayDateRange;

/**
 * Class SynxisConnector
 * Provides functionality specific to SynXis.
 *
 * @package GurwinderAntal\crs
 */
class SynxisConnector extends CrsConnectorBase {

    /**
     * {@inheritdoc}
     */
    public function checkAvailability($hotelCode, $start, $end, $roomCount, $adultCount, $childCount) {
        $this->client = new \SoapClient($this->wsdl, [
            'classmap' => [
                'OTA_HotelAvailRQ' => 'GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ',
                'OTA_HotelAvailRS' => 'GurwinderAntal\crs\Type\Response\OTA_HotelAvailRS',
            ],
        ]);
        $this->setHeaders('http://htng.org/1.1/Header/');
        // Build POS
        $companyName = new CompanyName(NULL, NULL, NULL, 'WSBE');
        $requestorId = new RequestorID($companyName, '10', 'Synxis', NULL, NULL, NULL);
        $source = new Source(NULL, $requestorId);
        $pos = new POS($source);
        // Build AvailRequestSegments
        $stayDateRange = new StayDateRange($start, $end, NULL);
        $guestCounts = [
            new GuestCount(self::ADULT_AGE_QUALIFYING_CODE, $adultCount, NULL),
            new GuestCount(self::CHILD_AGE_QUALIFYING_CODE, $childCount, NULL),
        ];
        $roomStayCandidates = [
            new RoomStayCandidate($guestCounts, $roomCount, NULL, NULL, NULL, NULL, NULL),
        ];
        $hotelRef = new HotelReferenceGroup($hotelCode, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
        $hotelSearchCriteria = [
            new HotelSearchCriterion(NULL, NULL, $hotelRef, NULL, NULL, NULL, NULL),
        ];
        $availRequestSegments = [
            new AvailRequestSegment($stayDateRange, NULL, NULL, NULL, $roomStayCandidates, $hotelSearchCriteria, NULL, NULL, 'Room', NULL),
        ];
        // Build Request
        $request = new OTA_HotelAvailRQ($pos, $availRequestSegments, NULL, 10, NULL, FALSE, FALSE, FALSE, FALSE, NULL, TRUE);
        $response = $this->client->CheckAvailability($request);
        return $response;
    }

}
