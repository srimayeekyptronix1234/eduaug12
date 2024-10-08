<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Marketplace\AvailableAddOn;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AvailableAddOnExtensionContext extends InstanceContext {
    /**
     * Initialize the AvailableAddOnExtensionContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $availableAddOnSid The available_add_on_sid
     * @param string $sid The unique Extension Sid
     * @return \Twilio\Rest\Preview\Marketplace\AvailableAddOn\AvailableAddOnExtensionContext
     */
    public function __construct(Version $version, $availableAddOnSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('availableAddOnSid' => $availableAddOnSid, 'sid' => $sid, );

        $this->uri = '/AvailableAddOns/' . rawurlencode($availableAddOnSid) . '/Extensions/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a AvailableAddOnExtensionInstance
     *
     * @return AvailableAddOnExtensionInstance Fetched
     *                                         AvailableAddOnExtensionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new AvailableAddOnExtensionInstance(
            $this->version,
            $payload,
            $this->solution['availableAddOnSid'],
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
        return '[Twilio.Preview.Marketplace.AvailableAddOnExtensionContext ' . implode(' ', $context) . ']';
    }
}