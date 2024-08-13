<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Studio\V1\Flow\Execution;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property array $context
 * @property string $flowSid
 * @property string $executionSid
 * @property string $url
 */
class ExecutionContextInstance extends InstanceResource {
    /**
     * Initialize the ExecutionContextInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $flowSid The SID of the Flow
     * @param string $executionSid The SID of the Execution
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionContextInstance
     */
    public function __construct(Version $version, array $payload, $flowSid, $executionSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'context' => Values::array_get($payload, 'context'),
            'flowSid' => Values::array_get($payload, 'flow_sid'),
            'executionSid' => Values::array_get($payload, 'execution_sid'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('flowSid' => $flowSid, 'executionSid' => $executionSid, );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionContextContext Context for this ExecutionContextInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ExecutionContextContext(
                $this->version,
                $this->solution['flowSid'],
                $this->solution['executionSid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a ExecutionContextInstance
     *
     * @return ExecutionContextInstance Fetched ExecutionContextInstance
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
        return '[Twilio.Studio.V1.ExecutionContextInstance ' . implode(' ', $context) . ']';
    }
}