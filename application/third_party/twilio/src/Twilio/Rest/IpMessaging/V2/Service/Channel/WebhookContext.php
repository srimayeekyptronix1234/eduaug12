<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\IpMessaging\V2\Service\Channel;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class WebhookContext extends InstanceContext {
    /**
     * Initialize the WebhookContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service with the Channel to fetch
     *                           the Webhook resource from
     * @param string $channelSid The SID of the Channel the resource to fetch
     *                           belongs to
     * @param string $sid The SID of the Channel Webhook resource to fetch
     * @return \Twilio\Rest\IpMessaging\V2\Service\Channel\WebhookContext
     */
    public function __construct(Version $version, $serviceSid, $channelSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'channelSid' => $channelSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Channels/' . rawurlencode($channelSid) . '/Webhooks/' . rawurlencode($sid) . '';
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
            $this->solution['serviceSid'],
            $this->solution['channelSid'],
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
            'Configuration.RetryCount' => $options['configurationRetryCount'],
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
            $this->solution['serviceSid'],
            $this->solution['channelSid'],
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
        return '[Twilio.IpMessaging.V2.WebhookContext ' . implode(' ', $context) . ']';
    }
}