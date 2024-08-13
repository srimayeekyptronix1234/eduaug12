<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Authy\V1\Service\Entity\Factor;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $entitySid
 * @property string $identity
 * @property string $factorSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property \DateTime $dateResponded
 * @property \DateTime $expirationDate
 * @property string $status
 * @property string $respondedReason
 * @property string $details
 * @property string $hiddenDetails
 * @property string $factorType
 * @property string $factorStrength
 * @property string $url
 */
class ChallengeInstance extends InstanceResource {
    /**
     * Initialize the ChallengeInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid Service Sid.
     * @param string $identity Unique identity of the Entity
     * @param string $factorSid Factor Sid.
     * @param string $sid A string that uniquely identifies this Challenge, or
     *                    `latest`.
     * @return \Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $identity, $factorSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'entitySid' => Values::array_get($payload, 'entity_sid'),
            'identity' => Values::array_get($payload, 'identity'),
            'factorSid' => Values::array_get($payload, 'factor_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'dateResponded' => Deserialize::dateTime(Values::array_get($payload, 'date_responded')),
            'expirationDate' => Deserialize::dateTime(Values::array_get($payload, 'expiration_date')),
            'status' => Values::array_get($payload, 'status'),
            'respondedReason' => Values::array_get($payload, 'responded_reason'),
            'details' => Values::array_get($payload, 'details'),
            'hiddenDetails' => Values::array_get($payload, 'hidden_details'),
            'factorType' => Values::array_get($payload, 'factor_type'),
            'factorStrength' => Values::array_get($payload, 'factor_strength'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'identity' => $identity,
            'factorSid' => $factorSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeContext Context
     *                                                                      for
     *                                                                      this
     *                                                                      ChallengeInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ChallengeContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['identity'],
                $this->solution['factorSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Deletes the ChallengeInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Fetch a ChallengeInstance
     *
     * @return ChallengeInstance Fetched ChallengeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the ChallengeInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ChallengeInstance Updated ChallengeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
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
        return '[Twilio.Authy.V1.ChallengeInstance ' . implode(' ', $context) . ']';
    }
}