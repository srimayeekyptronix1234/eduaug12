<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class NewSigningKeyOptions {
    /**
     * @param string $friendlyName A string to describe the resource
     * @return CreateNewSigningKeyOptions Options builder
     */
    public static function create($friendlyName = Values::NONE) {
        return new CreateNewSigningKeyOptions($friendlyName);
    }
}

class CreateNewSigningKeyOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     */
    public function __construct($friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Api.V2010.CreateNewSigningKeyOptions ' . implode(' ', $options) . ']';
    }
}