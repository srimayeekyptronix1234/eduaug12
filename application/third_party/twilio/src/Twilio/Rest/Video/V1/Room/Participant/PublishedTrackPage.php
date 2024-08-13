<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Video\V1\Room\Participant;

use Twilio\Page;

class PublishedTrackPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new PublishedTrackInstance(
            $this->version,
            $payload,
            $this->solution['roomSid'],
            $this->solution['participantSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Video.V1.PublishedTrackPage]';
    }
}