<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Message;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class MediaContext extends InstanceContext {
    /**
     * Initialize the MediaContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the
     *                           resource(s) to fetch
     * @param string $messageSid The SID of the Message resource that this Media
     *                           resource belongs to
     * @param string $sid The unique string that identifies this resource
     * @return \Twilio\Rest\Api\V2010\Account\Message\MediaContext
     */
    public function __construct(Version $version, $accountSid, $messageSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'messageSid' => $messageSid, 'sid' => $sid, );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Messages/' . rawurlencode($messageSid) . '/Media/' . rawurlencode($sid) . '.json';
    }

    /**
     * Deletes the MediaInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Fetch a MediaInstance
     *
     * @return MediaInstance Fetched MediaInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new MediaInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['messageSid'],
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
        return '[Twilio.Api.V2010.MediaContext ' . implode(' ', $context) . ']';
    }
}