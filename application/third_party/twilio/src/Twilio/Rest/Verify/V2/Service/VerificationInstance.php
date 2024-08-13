<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Verify\V2\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $serviceSid
 * @property string $accountSid
 * @property string $to
 * @property string $channel
 * @property string $status
 * @property bool $valid
 * @property array $lookup
 * @property string $amount
 * @property string $payee
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class VerificationInstance extends InstanceResource {
    /**
     * Initialize the VerificationInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Verify\V2\Service\VerificationInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'to' => Values::array_get($payload, 'to'),
            'channel' => Values::array_get($payload, 'channel'),
            'status' => Values::array_get($payload, 'status'),
            'valid' => Values::array_get($payload, 'valid'),
            'lookup' => Values::array_get($payload, 'lookup'),
            'amount' => Values::array_get($payload, 'amount'),
            'payee' => Values::array_get($payload, 'payee'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Verify\V2\Service\VerificationContext Context for this
     *                                                            VerificationInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new VerificationContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Update the VerificationInstance
     *
     * @param string $status The new status of the resource
     * @return VerificationInstance Updated VerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($status) {
        return $this->proxy()->update($status);
    }

    /**
     * Fetch a VerificationInstance
     *
     * @return VerificationInstance Fetched VerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
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
        return '[Twilio.Verify.V2.VerificationInstance ' . implode(' ', $context) . ']';
    }
}