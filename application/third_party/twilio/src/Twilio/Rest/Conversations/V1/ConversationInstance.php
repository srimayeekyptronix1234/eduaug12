<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Conversations\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $accountSid
 * @property string $chatServiceSid
 * @property string $messagingServiceSid
 * @property string $sid
 * @property string $friendlyName
 * @property string $attributes
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 */
class ConversationInstance extends InstanceResource {
    protected $_participants = null;
    protected $_messages = null;
    protected $_webhooks = null;

    /**
     * Initialize the ConversationInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     * @return \Twilio\Rest\Conversations\V1\ConversationInstance
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'chatServiceSid' => Values::array_get($payload, 'chat_service_sid'),
            'messagingServiceSid' => Values::array_get($payload, 'messaging_service_sid'),
            'sid' => Values::array_get($payload, 'sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'attributes' => Values::array_get($payload, 'attributes'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Conversations\V1\ConversationContext Context for this
     *                                                           ConversationInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ConversationContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Update the ConversationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ConversationInstance Updated ConversationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the ConversationInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Fetch a ConversationInstance
     *
     * @return ConversationInstance Fetched ConversationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Access the participants
     *
     * @return \Twilio\Rest\Conversations\V1\Conversation\ParticipantList
     */
    protected function getParticipants() {
        return $this->proxy()->participants;
    }

    /**
     * Access the messages
     *
     * @return \Twilio\Rest\Conversations\V1\Conversation\MessageList
     */
    protected function getMessages() {
        return $this->proxy()->messages;
    }

    /**
     * Access the webhooks
     *
     * @return \Twilio\Rest\Conversations\V1\Conversation\WebhookList
     */
    protected function getWebhooks() {
        return $this->proxy()->webhooks;
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
        return '[Twilio.Conversations.V1.ConversationInstance ' . implode(' ', $context) . ']';
    }
}