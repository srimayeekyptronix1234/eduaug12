<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Verify\V2\Service\RateLimit;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $rateLimitSid
 * @property string $serviceSid
 * @property string $accountSid
 * @property int $max
 * @property int $interval
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class BucketInstance extends InstanceResource {
    /**
     * Initialize the BucketInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $rateLimitSid Rate Limit Sid.
     * @param string $sid A string that uniquely identifies this Bucket.
     * @return \Twilio\Rest\Verify\V2\Service\RateLimit\BucketInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $rateLimitSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'rateLimitSid' => Values::array_get($payload, 'rate_limit_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'max' => Values::array_get($payload, 'max'),
            'interval' => Values::array_get($payload, 'interval'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'rateLimitSid' => $rateLimitSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Verify\V2\Service\RateLimit\BucketContext Context for
     *                                                                this
     *                                                                BucketInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new BucketContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['rateLimitSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Update the BucketInstance
     *
     * @param array|Options $options Optional Arguments
     * @return BucketInstance Updated BucketInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Fetch a BucketInstance
     *
     * @return BucketInstance Fetched BucketInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the BucketInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
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
        return '[Twilio.Verify.V2.BucketInstance ' . implode(' ', $context) . ']';
    }
}