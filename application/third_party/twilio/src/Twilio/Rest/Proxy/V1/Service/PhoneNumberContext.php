<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Proxy\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class PhoneNumberContext extends InstanceContext {
    /**
     * Initialize the PhoneNumberContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the parent Service resource of the
     *                           PhoneNumber resource to fetch
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Proxy\V1\Service\PhoneNumberContext
     */
    public function __construct(Version $version, $serviceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/PhoneNumbers/' . rawurlencode($sid) . '';
    }

    /**
     * Deletes the PhoneNumberInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Fetch a PhoneNumberInstance
     *
     * @return PhoneNumberInstance Fetched PhoneNumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new PhoneNumberInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the PhoneNumberInstance
     *
     * @param array|Options $options Optional Arguments
     * @return PhoneNumberInstance Updated PhoneNumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array('IsReserved' => Serialize::booleanToString($options['isReserved']), ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new PhoneNumberInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
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
        return '[Twilio.Proxy.V1.PhoneNumberContext ' . implode(' ', $context) . ']';
    }
}