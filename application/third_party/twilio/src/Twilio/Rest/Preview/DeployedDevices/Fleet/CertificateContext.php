<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\DeployedDevices\Fleet;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class CertificateContext extends InstanceContext {
    /**
     * Initialize the CertificateContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $fleetSid The fleet_sid
     * @param string $sid A string that uniquely identifies the Certificate.
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\CertificateContext
     */
    public function __construct(Version $version, $fleetSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('fleetSid' => $fleetSid, 'sid' => $sid, );

        $this->uri = '/Fleets/' . rawurlencode($fleetSid) . '/Certificates/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a CertificateInstance
     *
     * @return CertificateInstance Fetched CertificateInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new CertificateInstance(
            $this->version,
            $payload,
            $this->solution['fleetSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the CertificateInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the CertificateInstance
     *
     * @param array|Options $options Optional Arguments
     * @return CertificateInstance Updated CertificateInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'DeviceSid' => $options['deviceSid'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new CertificateInstance(
            $this->version,
            $payload,
            $this->solution['fleetSid'],
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
        return '[Twilio.Preview.DeployedDevices.CertificateContext ' . implode(' ', $context) . ']';
    }
}