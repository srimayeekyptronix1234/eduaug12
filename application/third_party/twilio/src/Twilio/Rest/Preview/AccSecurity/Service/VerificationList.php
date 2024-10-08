<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\AccSecurity\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class VerificationList extends ListResource {
    /**
     * Construct the VerificationList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid Service Sid.
     * @return \Twilio\Rest\Preview\AccSecurity\Service\VerificationList
     */
    public function __construct(Version $version, $serviceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Verifications';
    }

    /**
     * Create a new VerificationInstance
     *
     * @param string $to To phonenumber
     * @param string $channel sms or call
     * @param array|Options $options Optional Arguments
     * @return VerificationInstance Newly created VerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($to, $channel, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'To' => $to,
            'Channel' => $channel,
            'CustomMessage' => $options['customMessage'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new VerificationInstance($this->version, $payload, $this->solution['serviceSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.AccSecurity.VerificationList]';
    }
}