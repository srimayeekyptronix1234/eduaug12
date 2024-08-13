<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Video\V1\Room\Participant;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class PublishedTrackContext extends InstanceContext {
    /**
     * Initialize the PublishedTrackContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $roomSid The SID of the Room resource where the Track resource
     *                        to fetch is published
     * @param string $participantSid The SID of the Participant resource with the
     *                               published track to fetch
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\Room\Participant\PublishedTrackContext
     */
    public function __construct(Version $version, $roomSid, $participantSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('roomSid' => $roomSid, 'participantSid' => $participantSid, 'sid' => $sid, );

        $this->uri = '/Rooms/' . rawurlencode($roomSid) . '/Participants/' . rawurlencode($participantSid) . '/PublishedTracks/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a PublishedTrackInstance
     *
     * @return PublishedTrackInstance Fetched PublishedTrackInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new PublishedTrackInstance(
            $this->version,
            $payload,
            $this->solution['roomSid'],
            $this->solution['participantSid'],
            $this->solution['sid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Video.V1.PublishedTrackContext ' . implode(' ', $context) . ']';
    }
}