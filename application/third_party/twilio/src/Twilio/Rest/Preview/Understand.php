<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Preview\Understand\AssistantList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Preview\Understand\AssistantList $assistants
 * @method \Twilio\Rest\Preview\Understand\AssistantContext assistants(string $sid)
 */
class Understand extends Version {
    protected $_assistants = null;

    /**
     * Construct the Understand version of Preview
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Preview\Understand Understand version of Preview
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'understand';
    }

    /**
     * @return \Twilio\Rest\Preview\Understand\AssistantList
     */
    protected function getAssistants() {
        if (!$this->_assistants) {
            $this->_assistants = new AssistantList($this);
        }
        return $this->_assistants;
    }

    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
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
        return '[Twilio.Preview.Understand]';
    }
}