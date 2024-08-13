<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Queue;

use Twilio\Options;
use Twilio\Values;

abstract class MemberOptions {
    /**
     * @param string $method How to pass the update request data
     * @return UpdateMemberOptions Options builder
     */
    public static function update($method = Values::NONE) {
        return new UpdateMemberOptions($method);
    }
}

class UpdateMemberOptions extends Options {
    /**
     * @param string $method How to pass the update request data
     */
    public function __construct($method = Values::NONE) {
        $this->options['method'] = $method;
    }

    /**
     * How to pass the update request data. Can be `GET` or `POST` and the default is `POST`. `POST` sends the data as encoded form data and `GET` sends the data as query parameters.
     *
     * @param string $method How to pass the update request data
     * @return $this Fluent Builder
     */
    public function setMethod($method) {
        $this->options['method'] = $method;
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
        return '[Twilio.Api.V2010.UpdateMemberOptions ' . implode(' ', $options) . ']';
    }
}