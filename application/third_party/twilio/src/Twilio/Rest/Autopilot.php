<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Autopilot\V1;

/**
 * @property \Twilio\Rest\Autopilot\V1 $v1
 * @property \Twilio\Rest\Autopilot\V1\AssistantList $assistants
 * @method \Twilio\Rest\Autopilot\V1\AssistantContext assistants(string $sid)
 */
class Autopilot extends Domain {
    protected $_v1 = null;

    /**
     * Construct the Autopilot Domain
     *
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\Autopilot Domain for Autopilot
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://autopilot.twilio.com';
    }

    /**
     * @return \Twilio\Rest\Autopilot\V1 Version v1 of autopilot
     */
    protected function getV1() {
        if (!$this->_v1) {
            $this->_v1 = new V1($this);
        }
        return $this->_v1;
    }

    /**
     * Magic getter to lazy load version
     *
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws TwilioException For unknown versions
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown version ' . $name);
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
        $method = 'context' . ucfirst($name);
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $arguments);
        }

        throw new TwilioException('Unknown context ' . $name);
    }

    /**
     * @return \Twilio\Rest\Autopilot\V1\AssistantList
     */
    protected function getAssistants() {
        return $this->v1->assistants;
    }

    /**
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Autopilot\V1\AssistantContext
     */
    protected function contextAssistants($sid) {
        return $this->v1->assistants($sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Autopilot]';
    }
}