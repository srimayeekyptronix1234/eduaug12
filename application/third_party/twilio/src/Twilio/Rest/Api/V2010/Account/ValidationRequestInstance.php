<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $phoneNumber
 * @property string $friendlyName
 * @property int $validationCode
 * @property string $callSid
 */
class ValidationRequestInstance extends InstanceResource {
    /**
     * Initialize the ValidationRequestInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the Account that created the resource
     * @return \Twilio\Rest\Api\V2010\Account\ValidationRequestInstance
     */
    public function __construct(Version $version, array $payload, $accountSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'phoneNumber' => Values::array_get($payload, 'phone_number'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'validationCode' => Values::array_get($payload, 'validation_code'),
            'callSid' => Values::array_get($payload, 'call_sid'),
        );

        $this->solution = array('accountSid' => $accountSid, );
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
        return '[Twilio.Api.V2010.ValidationRequestInstance]';
    }
}