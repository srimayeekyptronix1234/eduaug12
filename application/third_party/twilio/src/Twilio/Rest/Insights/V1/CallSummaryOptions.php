<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Insights\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class CallSummaryOptions {
    /**
     * @param string $processingState The processing_state
     * @return FetchCallSummaryOptions Options builder
     */
    public static function fetch($processingState = Values::NONE) {
        return new FetchCallSummaryOptions($processingState);
    }
}

class FetchCallSummaryOptions extends Options {
    /**
     * @param string $processingState The processing_state
     */
    public function __construct($processingState = Values::NONE) {
        $this->options['processingState'] = $processingState;
    }

    /**
     * The processing_state
     *
     * @param string $processingState The processing_state
     * @return $this Fluent Builder
     */
    public function setProcessingState($processingState) {
        $this->options['processingState'] = $processingState;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Insights.V1.FetchCallSummaryOptions ' . implode(' ', $options) . ']';
    }
}