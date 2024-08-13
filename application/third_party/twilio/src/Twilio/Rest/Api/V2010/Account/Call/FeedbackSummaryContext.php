<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class FeedbackSummaryContext extends InstanceContext {
    /**
     * Initialize the FeedbackSummaryContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The unique sid that identifies this account
     * @param string $sid A string that uniquely identifies this feedback summary
     *                    resource
     * @return \Twilio\Rest\Api\V2010\Account\Call\FeedbackSummaryContext
     */
    public function __construct(Version $version, $accountSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'sid' => $sid, );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Calls/FeedbackSummary/' . rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a FeedbackSummaryInstance
     *
     * @return FeedbackSummaryInstance Fetched FeedbackSummaryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new FeedbackSummaryInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the FeedbackSummaryInstance
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
        return '[Twilio.Api.V2010.FeedbackSummaryContext ' . implode(' ', $context) . ']';
    }
}