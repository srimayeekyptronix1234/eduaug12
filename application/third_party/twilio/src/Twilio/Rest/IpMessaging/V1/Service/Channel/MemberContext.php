<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\IpMessaging\V1\Service\Channel;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class MemberContext extends InstanceContext {
    /**
     * Initialize the MemberContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service to fetch the resource from
     * @param string $channelSid The unique ID of the channel the member belongs to
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\IpMessaging\V1\Service\Channel\MemberContext
     */
    public function __construct(Version $version, $serviceSid, $channelSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'channelSid' => $channelSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Channels/' . rawurlencode($channelSid) . '/Members/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a MemberInstance
     *
     * @return MemberInstance Fetched MemberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new MemberInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['channelSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the MemberInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the MemberInstance
     *
     * @param array|Options $options Optional Arguments
     * @return MemberInstance Updated MemberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'RoleSid' => $options['roleSid'],
            'LastConsumedMessageIndex' => $options['lastConsumedMessageIndex'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new MemberInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['channelSid'],
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
        return '[Twilio.IpMessaging.V1.MemberContext ' . implode(' ', $context) . ']';
    }
}