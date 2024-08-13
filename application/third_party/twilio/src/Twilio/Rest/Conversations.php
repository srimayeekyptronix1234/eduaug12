<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Conversations\V1;

/**
 * @property \Twilio\Rest\Conversations\V1 $v1
 * @property \Twilio\Rest\Conversations\V1\ConversationList $conversations
 * @property \Twilio\Rest\Conversations\V1\WebhookList $webhooks
 * @method \Twilio\Rest\Conversations\V1\ConversationContext conversations(string $sid)
 * @method \Twilio\Rest\Conversations\V1\WebhookContext webhooks()
 */
class Conversations extends Domain {
    protected $_v1 = null;

    /**
     * Construct the Conversations Domain
     *
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\Conversations Domain for Conversations
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://conversations.twilio.com';
    }

    /**
     * @return \Twilio\Rest\Conversations\V1 Version v1 of conversations
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
     * @return \Twilio\Rest\Conversations\V1\ConversationList
     */
    protected function getConversations() {
        return $this->v1->conversations;
    }

    /**
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     * @return \Twilio\Rest\Conversations\V1\ConversationContext
     */
    protected function contextConversations($sid) {
        return $this->v1->conversations($sid);
    }

    /**
     * @return \Twilio\Rest\Conversations\V1\WebhookList
     */
    protected function getWebhooks() {
        return $this->v1->webhooks;
    }

    /**
     * @return \Twilio\Rest\Conversations\V1\WebhookContext
     */
    protected function contextWebhooks() {
        return $this->v1->webhooks();
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Conversations]';
    }
}