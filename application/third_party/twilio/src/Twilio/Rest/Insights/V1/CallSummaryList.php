<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Insights\V1;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class CallSummaryList extends ListResource {
    /**
     * Construct the CallSummaryList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Insights\V1\CallSummaryList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a CallSummaryContext
     *
     * @param string $callSid The call_sid
     * @return \Twilio\Rest\Insights\V1\CallSummaryContext
     */
    public function getContext($callSid) {
        return new CallSummaryContext($this->version, $callSid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Insights.V1.CallSummaryList]';
    }
}