<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\AccSecurity;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Preview\AccSecurity\Service\VerificationCheckList;
use Twilio\Rest\Preview\AccSecurity\Service\VerificationList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Preview\AccSecurity\Service\VerificationList $verifications
 * @property \Twilio\Rest\Preview\AccSecurity\Service\VerificationCheckList $verificationChecks
 */
class ServiceContext extends InstanceContext {
    protected $_verifications = null;
    protected $_verificationChecks = null;

    /**
     * Initialize the ServiceContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid Verification Service Instance SID.
     * @return \Twilio\Rest\Preview\AccSecurity\ServiceContext
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ServiceInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array('Name' => $options['name'], 'CodeLength' => $options['codeLength'], ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ServiceInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Access the verifications
     *
     * @return \Twilio\Rest\Preview\AccSecurity\Service\VerificationList
     */
    protected function getVerifications() {
        if (!$this->_verifications) {
            $this->_verifications = new VerificationList($this->version, $this->solution['sid']);
        }

        return $this->_verifications;
    }

    /**
     * Access the verificationChecks
     *
     * @return \Twilio\Rest\Preview\AccSecurity\Service\VerificationCheckList
     */
    protected function getVerificationChecks() {
        if (!$this->_verificationChecks) {
            $this->_verificationChecks = new VerificationCheckList($this->version, $this->solution['sid']);
        }

        return $this->_verificationChecks;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Preview.AccSecurity.ServiceContext ' . implode(' ', $context) . ']';
    }
}