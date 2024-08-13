<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Understand\Assistant;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class StyleSheetList extends ListResource {
    /**
     * Construct the StyleSheetList
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The unique ID of the Assistant
     * @return \Twilio\Rest\Preview\Understand\Assistant\StyleSheetList
     */
    public function __construct(Version $version, $assistantSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid, );
    }

    /**
     * Constructs a StyleSheetContext
     *
     * @return \Twilio\Rest\Preview\Understand\Assistant\StyleSheetContext
     */
    public function getContext() {
        return new StyleSheetContext($this->version, $this->solution['assistantSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.Understand.StyleSheetList]';
    }
}