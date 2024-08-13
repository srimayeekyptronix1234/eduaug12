<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Conference;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class ParticipantContext extends InstanceContext {
    /**
     * Initialize the ParticipantContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the resource
     *                           to fetch
     * @param string $conferenceSid The SID of the conference with the participant
     *                              to fetch
     * @param string $callSid The Call SID of the resource to fetch
     * @return \Twilio\Rest\Api\V2010\Account\Conference\ParticipantContext
     */
    public function __construct(Version $version, $accountSid, $conferenceSid, $callSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'conferenceSid' => $conferenceSid,
            'callSid' => $callSid,
        );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Conferences/' . rawurlencode($conferenceSid) . '/Participants/' . rawurlencode($callSid) . '.json';
    }

    /**
     * Fetch a ParticipantInstance
     *
     * @return ParticipantInstance Fetched ParticipantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ParticipantInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['conferenceSid'],
            $this->solution['callSid']
        );
    }

    /**
     * Update the ParticipantInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ParticipantInstance Updated ParticipantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'Muted' => Serialize::booleanToString($options['muted']),
            'Hold' => Serialize::booleanToString($options['hold']),
            'HoldUrl' => $options['holdUrl'],
            'HoldMethod' => $options['holdMethod'],
            'AnnounceUrl' => $options['announceUrl'],
            'AnnounceMethod' => $options['announceMethod'],
            'WaitUrl' => $options['waitUrl'],
            'WaitMethod' => $options['waitMethod'],
            'BeepOnExit' => Serialize::booleanToString($options['beepOnExit']),
            'EndConferenceOnExit' => Serialize::booleanToString($options['endConferenceOnExit']),
            'Coaching' => Serialize::booleanToString($options['coaching']),
            'CallSidToCoach' => $options['callSidToCoach'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ParticipantInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['conferenceSid'],
            $this->solution['callSid']
        );
    }

    /**
     * Deletes the ParticipantInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Api.V2010.ParticipantContext ' . implode(' ', $context) . ']';
    }
}