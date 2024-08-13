<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Lookups\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property array $callerName
 * @property string $countryCode
 * @property string $phoneNumber
 * @property string $nationalFormat
 * @property array $carrier
 * @property array $addOns
 * @property string $url
 */
class PhoneNumberInstance extends InstanceResource {
    /**
     * Initialize the PhoneNumberInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $phoneNumber The phone number to fetch in E.164 format
     * @return \Twilio\Rest\Lookups\V1\PhoneNumberInstance
     */
    public function __construct(Version $version, array $payload, $phoneNumber = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'callerName' => Values::array_get($payload, 'caller_name'),
            'countryCode' => Values::array_get($payload, 'country_code'),
            'phoneNumber' => Values::array_get($payload, 'phone_number'),
            'nationalFormat' => Values::array_get($payload, 'national_format'),
            'carrier' => Values::array_get($payload, 'carrier'),
            'addOns' => Values::array_get($payload, 'add_ons'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('phoneNumber' => $phoneNumber ?: $this->properties['phoneNumber'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Lookups\V1\PhoneNumberContext Context for this
     *                                                    PhoneNumberInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new PhoneNumberContext($this->version, $this->solution['phoneNumber']);
        }

        return $this->context;
    }

    /**
     * Fetch a PhoneNumberInstance
     *
     * @param array|Options $options Optional Arguments
     * @return PhoneNumberInstance Fetched PhoneNumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array()) {
        return $this->proxy()->fetch($options);
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Lookups.V1.PhoneNumberInstance ' . implode(' ', $context) . ']';
    }
}