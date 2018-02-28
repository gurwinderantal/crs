<?php

namespace GurwinderAntal\crs;

use GurwinderAntal\crs\Type\Common\GuestCount;
use GurwinderAntal\crs\Type\Common\HotelReferenceGroup;
use GurwinderAntal\crs\Type\Common\HotelSearchCriterion;
use GurwinderAntal\crs\Type\Request\AvailRequestSegment;
use GurwinderAntal\crs\Type\Request\BookingChannel;
use GurwinderAntal\crs\Type\Request\CheckHotelAvailability;
use GurwinderAntal\crs\Type\Request\CompanyName;
use GurwinderAntal\crs\Type\Request\OTA_HotelAvailRQ;
use GurwinderAntal\crs\Type\Request\POS;
use GurwinderAntal\crs\Type\Request\RequestorID;
use GurwinderAntal\crs\Type\Request\RoomStayCandidate;
use GurwinderAntal\crs\Type\Request\Source;
use GurwinderAntal\crs\Type\Request\StayDateRange;

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
    public function checkAvailability($params) {
        // TODO: Implement checkAvailability() method.
    }

    /**
     * {@inheritdoc}
     */
    public function createReservation($params) {
        // TODO: Implement createReservation() method.
    }

    /**
     * {@inheritdoc}
     */
    public function modifyReservation($params) {
        // TODO: Implement modifyReservation() method.
    }

    /**
     * {@inheritdoc}
     */
    public function cancelReservation($params) {
        // TODO: Implement cancelReservation() method.
    }

}
