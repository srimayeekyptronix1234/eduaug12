<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\FlexApi\V1;

/**
 * @property \Twilio\Rest\FlexApi\V1 $v1
 * @property \Twilio\Rest\FlexApi\V1\ChannelList $channel
 * @property \Twilio\Rest\FlexApi\V1\ConfigurationList $configuration
 * @property \Twilio\Rest\FlexApi\V1\FlexFlowList $flexFlow
 * @property \Twilio\Rest\FlexApi\V1\WebChannelList $webChannel
 * @method \Twilio\Rest\FlexApi\V1\ChannelContext channel(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\ConfigurationContext configuration()
 * @method \Twilio\Rest\FlexApi\V1\FlexFlowContext flexFlow(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\WebChannelContext webChannel(string $sid)
 */
class FlexApi extends Domain {
    protected $_v1 = null;

    /**
     * Construct the FlexApi Domain
     *
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\FlexApi Domain for FlexApi
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://flex-api.twilio.com';
    }

    /**
     * @return \Twilio\Rest\FlexApi\V1 Version v1 of flex_api
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
     * @return \Twilio\Rest\FlexApi\V1\ChannelList
     */
    protected function getChannel() {
        return $this->v1->channel;
    }

    /**
     * @param string $sid The SID that identifies the Flex chat channel resource to
     *                    fetch
     * @return \Twilio\Rest\FlexApi\V1\ChannelContext
     */
    protected function contextChannel($sid) {
        return $this->v1->channel($sid);
    }

    /**
     * @return \Twilio\Rest\FlexApi\V1\ConfigurationList
     */
    protected function getConfiguration() {
        return $this->v1->configuration;
    }

    /**
     * @return \Twilio\Rest\FlexApi\V1\ConfigurationContext
     */
    protected function contextConfiguration() {
        return $this->v1->configuration();
    }

    /**
     * @return \Twilio\Rest\FlexApi\V1\FlexFlowList
     */
    protected function getFlexFlow() {
        return $this->v1->flexFlow;
    }

    /**
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\FlexApi\V1\FlexFlowContext
     */
    protected function contextFlexFlow($sid) {
        return $this->v1->flexFlow($sid);
    }

    /**
     * @return \Twilio\Rest\FlexApi\V1\WebChannelList
     */
    protected function getWebChannel() {
        return $this->v1->webChannel;
    }

    /**
     * @param string $sid The SID of the WebChannel resource to fetch
     * @return \Twilio\Rest\FlexApi\V1\WebChannelContext
     */
    protected function contextWebChannel($sid) {
        return $this->v1->webChannel($sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.FlexApi]';
    }
}