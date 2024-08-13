<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Authy\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class FormContext extends InstanceContext {
    /**
     * Initialize the FormContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $formType The Type of this Form
     * @return \Twilio\Rest\Authy\V1\FormContext
     */
    public function __construct(Version $version, $formType) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('formType' => $formType, );

        $this->uri = '/Forms/' . rawurlencode($formType) . '';
    }

    /**
     * Fetch a FormInstance
     *
     * @return FormInstance Fetched FormInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new FormInstance($this->version, $payload, $this->solution['formType']);
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
        return '[Twilio.Authy.V1.FormContext ' . implode(' ', $context) . ']';
    }
}