<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Conversations\V1\Conversation;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class WebhookContext extends InstanceContext {
    /**
     * Initialize the WebhookContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $conversationSid The unique id of the Conversation for this
     *                                webhook.
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     * @return \Twilio\Rest\Conversations\V1\Conversation\WebhookContext
     */
    public function __construct(Version $version, $conversationSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('conversationSid' => $conversationSid, 'sid' => $sid, );

        $this->uri = '/Conversations/' . rawurlencode($conversationSid) . '/Webhooks/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a WebhookInstance
     *
     * @return WebhookInstance Fetched WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new WebhookInstance(
            $this->version,
            $payload,
            $this->solution['conversationSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the WebhookInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WebhookInstance Updated WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'Configuration.Url' => $options['configurationUrl'],
            'Configuration.Method' => $options['configurationMethod'],
            'Configuration.Filters' => Serialize::map($options['configurationFilters'], function($e) { return $e; }),
            'Configuration.Triggers' => Serialize::map($options['configurationTriggers'], function($e) { return $e; }),
            'Configuration.FlowSid' => $options['configurationFlowSid'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new WebhookInstance(
            $this->version,
            $payload,
            $this->solution['conversationSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the WebhookInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Conversations.V1.WebhookContext ' . implode(' ', $context) . ']';
    }
}