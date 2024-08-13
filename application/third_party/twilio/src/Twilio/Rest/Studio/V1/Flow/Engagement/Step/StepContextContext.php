<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Studio\V1\Flow\Engagement\Step;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class StepContextContext extends InstanceContext {
    /**
     * Initialize the StepContextContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $flowSid The SID of the Flow
     * @param string $engagementSid The SID of the Engagement
     * @param string $stepSid Step SID
     * @return \Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextContext
     */
    public function __construct(Version $version, $flowSid, $engagementSid, $stepSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'flowSid' => $flowSid,
            'engagementSid' => $engagementSid,
            'stepSid' => $stepSid,
        );

        $this->uri = '/Flows/' . rawurlencode($flowSid) . '/Engagements/' . rawurlencode($engagementSid) . '/Steps/' . rawurlencode($stepSid) . '/Context';
    }

    /**
     * Fetch a StepContextInstance
     *
     * @return StepContextInstance Fetched StepContextInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new StepContextInstance(
            $this->version,
            $payload,
            $this->solution['flowSid'],
            $this->solution['engagementSid'],
            $this->solution['stepSid']
        );
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
        return '[Twilio.Studio.V1.StepContextContext ' . implode(' ', $context) . ']';
    }
}