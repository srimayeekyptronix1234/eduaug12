<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Studio\V1\Flow;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Studio\V1\Flow\Engagement\EngagementContextList;
use Twilio\Rest\Studio\V1\Flow\Engagement\StepList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Studio\V1\Flow\Engagement\StepList $steps
 * @property \Twilio\Rest\Studio\V1\Flow\Engagement\EngagementContextList $engagementContext
 * @method \Twilio\Rest\Studio\V1\Flow\Engagement\StepContext steps(string $sid)
 * @method \Twilio\Rest\Studio\V1\Flow\Engagement\EngagementContextContext engagementContext()
 */
class EngagementContext extends InstanceContext {
    protected $_steps = null;
    protected $_engagementContext = null;

    /**
     * Initialize the EngagementContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $flowSid Flow SID
     * @param string $sid The SID of the Engagement resource to fetch
     * @return \Twilio\Rest\Studio\V1\Flow\EngagementContext
     */
    public function __construct(Version $version, $flowSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('flowSid' => $flowSid, 'sid' => $sid, );

        $this->uri = '/Flows/' . rawurlencode($flowSid) . '/Engagements/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a EngagementInstance
     *
     * @return EngagementInstance Fetched EngagementInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new EngagementInstance(
            $this->version,
            $payload,
            $this->solution['flowSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the EngagementInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the steps
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Engagement\StepList
     */
    protected function getSteps() {
        if (!$this->_steps) {
            $this->_steps = new StepList($this->version, $this->solution['flowSid'], $this->solution['sid']);
        }

        return $this->_steps;
    }

    /**
     * Access the engagementContext
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Engagement\EngagementContextList
     */
    protected function getEngagementContext() {
        if (!$this->_engagementContext) {
            $this->_engagementContext = new EngagementContextList(
                $this->version,
                $this->solution['flowSid'],
                $this->solution['sid']
            );
        }

        return $this->_engagementContext;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Studio.V1.EngagementContext ' . implode(' ', $context) . ']';
    }
}