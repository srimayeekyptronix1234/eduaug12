<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Insights\V1;

/**
 * @property \Twilio\Rest\Insights\V1 $v1
 * @property \Twilio\Rest\Insights\V1\CallSummaryList $summary
 * @method \Twilio\Rest\Insights\V1\CallSummaryContext summary(string $callSid)
 */
class Insights extends Domain {
    protected $_v1 = null;

    /**
     * Construct the Insights Domain
     *
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\Insights Domain for Insights
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://insights.twilio.com';
    }

    /**
     * @return \Twilio\Rest\Insights\V1 Version v1 of insights
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
     * @return \Twilio\Rest\Insights\V1\CallSummaryList
     */
    protected function getSummary() {
        return $this->v1->summary;
    }

    /**
     * @param string $callSid The call_sid
     * @return \Twilio\Rest\Insights\V1\CallSummaryContext
     */
    protected function contextSummary($callSid) {
        return $this->v1->summary($callSid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Insights]';
    }
}