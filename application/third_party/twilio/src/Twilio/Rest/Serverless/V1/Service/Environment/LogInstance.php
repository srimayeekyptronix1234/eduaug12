<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1\Service\Environment;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $environmentSid
 * @property string $deploymentSid
 * @property string $functionSid
 * @property string $requestSid
 * @property string $level
 * @property string $message
 * @property \DateTime $dateCreated
 * @property string $url
 */
class LogInstance extends InstanceResource {
    /**
     * Initialize the LogInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the Log resource is
     *                           associated with
     * @param string $environmentSid The SID of the environment in which the log
     *                               occurred
     * @param string $sid The SID that identifies the Log resource to fetch
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\LogInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $environmentSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'environmentSid' => Values::array_get($payload, 'environment_sid'),
            'deploymentSid' => Values::array_get($payload, 'deployment_sid'),
            'functionSid' => Values::array_get($payload, 'function_sid'),
            'requestSid' => Values::array_get($payload, 'request_sid'),
            'level' => Values::array_get($payload, 'level'),
            'message' => Values::array_get($payload, 'message'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'environmentSid' => $environmentSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\LogContext Context
     *                                                                   for this
     *                                                                   LogInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new LogContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['environmentSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a LogInstance
     *
     * @return LogInstance Fetched LogInstance
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
        return '[Twilio.Serverless.V1.LogInstance ' . implode(' ', $context) . ']';
    }
}