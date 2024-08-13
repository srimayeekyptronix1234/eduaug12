<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\TrustedComms;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class BrandedCallOptions {
    /**
     * @param string $callSid The Call sid this Branded Call should link to
     * @return CreateBrandedCallOptions Options builder
     */
    public static function create($callSid = Values::NONE) {
        return new CreateBrandedCallOptions($callSid);
    }
}

class CreateBrandedCallOptions extends Options {
    /**
     * @param string $callSid The Call sid this Branded Call should link to
     */
    public function __construct($callSid = Values::NONE) {
        $this->options['callSid'] = $callSid;
    }

    /**
     * The Call sid this Branded Call should link to.
     *
     * @param string $callSid The Call sid this Branded Call should link to
     * @return $this Fluent Builder
     */
    public function setCallSid($callSid) {
        $this->options['callSid'] = $callSid;
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
        return '[Twilio.Preview.TrustedComms.CreateBrandedCallOptions ' . implode(' ', $options) . ']';
    }
}