<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Verify\V2\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class VerificationContext extends InstanceContext {
    /**
     * Initialize the VerificationContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the verification Service to fetch the
     *                           resource from
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Verify\V2\Service\VerificationContext
     */
    public function __construct(Version $version, $serviceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Verifications/' . rawurlencode($sid) . '';
    }

    /**
     * Update the VerificationInstance
     *
     * @param string $status The new status of the resource
     * @return VerificationInstance Updated VerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($status) {
        $data = Values::of(array('Status' => $status, ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new VerificationInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Fetch a VerificationInstance
     *
     * @return VerificationInstance Fetched VerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new VerificationInstance(
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
        return '[Twilio.Verify.V2.VerificationContext ' . implode(' ', $context) . ']';
    }
}