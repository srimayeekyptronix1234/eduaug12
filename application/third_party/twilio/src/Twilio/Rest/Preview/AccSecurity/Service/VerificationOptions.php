<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\AccSecurity\Service;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class VerificationOptions {
    /**
     * @param string $customMessage A custom message for this verification
     * @return CreateVerificationOptions Options builder
     */
    public static function create($customMessage = Values::NONE) {
        return new CreateVerificationOptions($customMessage);
    }
}

class CreateVerificationOptions extends Options {
    /**
     * @param string $customMessage A custom message for this verification
     */
    public function __construct($customMessage = Values::NONE) {
        $this->options['customMessage'] = $customMessage;
    }

    /**
     * A character string containing a custom message for this verification
     *
     * @param string $customMessage A custom message for this verification
     * @return $this Fluent Builder
     */
    public function setCustomMessage($customMessage) {
        $this->options['customMessage'] = $customMessage;
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
        return '[Twilio.Preview.AccSecurity.CreateVerificationOptions ' . implode(' ', $options) . ']';
    }
}