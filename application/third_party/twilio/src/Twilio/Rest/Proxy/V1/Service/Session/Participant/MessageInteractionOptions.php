<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Proxy\V1\Service\Session\Participant;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class MessageInteractionOptions {
    /**
     * @param string $body Message body
     * @param string $mediaUrl Reserved
     * @return CreateMessageInteractionOptions Options builder
     */
    public static function create($body = Values::NONE, $mediaUrl = Values::NONE) {
        return new CreateMessageInteractionOptions($body, $mediaUrl);
    }
}

class CreateMessageInteractionOptions extends Options {
    /**
     * @param string $body Message body
     * @param string $mediaUrl Reserved
     */
    public function __construct($body = Values::NONE, $mediaUrl = Values::NONE) {
        $this->options['body'] = $body;
        $this->options['mediaUrl'] = $mediaUrl;
    }

    /**
     * The message to send to the participant
     *
     * @param string $body Message body
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * Reserved. Not currently supported.
     *
     * @param string $mediaUrl Reserved
     * @return $this Fluent Builder
     */
    public function setMediaUrl($mediaUrl) {
        $this->options['mediaUrl'] = $mediaUrl;
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
        return '[Twilio.Proxy.V1.CreateMessageInteractionOptions ' . implode(' ', $options) . ']';
    }
}