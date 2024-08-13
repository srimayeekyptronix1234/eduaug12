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
class MessagingConfigurationContext extends InstanceContext {
    /**
     * Initialize the MessagingConfigurationContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $country The ISO-3166-1 country code of the country or `all`.
     * @return \Twilio\Rest\Verify\V2\Service\MessagingConfigurationContext
     */
    public function __construct(Version $version, $serviceSid, $country) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'country' => $country, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/MessagingConfigurations/' . rawurlencode($country) . '';
    }

    /**
     * Update the MessagingConfigurationInstance
     *
     * @param string $messagingServiceSid The SID of the Messaging Service used for
     *                                    this configuration.
     * @return MessagingConfigurationInstance Updated MessagingConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($messagingServiceSid) {
        $data = Values::of(array('MessagingServiceSid' => $messagingServiceSid, ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new MessagingConfigurationInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['country']
        );
    }

    /**
     * Fetch a MessagingConfigurationInstance
     *
     * @return MessagingConfigurationInstance Fetched MessagingConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new MessagingConfigurationInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['country']
        );
    }

    /**
     * Deletes the MessagingConfigurationInstance
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
        return '[Twilio.Verify.V2.MessagingConfigurationContext ' . implode(' ', $context) . ']';
    }
}