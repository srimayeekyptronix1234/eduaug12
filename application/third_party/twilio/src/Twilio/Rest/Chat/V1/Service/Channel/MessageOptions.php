<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Chat\V1\Service\Channel;

use Twilio\Options;
use Twilio\Values;

abstract class MessageOptions {
    /**
     * @param string $from The identity of the new message's author
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @return CreateMessageOptions Options builder
     */
    public static function create($from = Values::NONE, $attributes = Values::NONE) {
        return new CreateMessageOptions($from, $attributes);
    }

    /**
     * @param string $order The sort order of the returned messages
     * @return ReadMessageOptions Options builder
     */
    public static function read($order = Values::NONE) {
        return new ReadMessageOptions($order);
    }

    /**
     * @param string $body The message to send to the channel
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @return UpdateMessageOptions Options builder
     */
    public static function update($body = Values::NONE, $attributes = Values::NONE) {
        return new UpdateMessageOptions($body, $attributes);
    }
}

class CreateMessageOptions extends Options {
    /**
     * @param string $from The identity of the new message's author
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     */
    public function __construct($from = Values::NONE, $attributes = Values::NONE) {
        $this->options['from'] = $from;
        $this->options['attributes'] = $attributes;
    }

    /**
     * The [identity](https://www.twilio.com/docs/api/chat/guides/identity) of the new message's author. The default value is `system`.
     *
     * @param string $from The identity of the new message's author
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * A valid JSON string that contains application-specific data.
     *
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
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
        return '[Twilio.Chat.V1.CreateMessageOptions ' . implode(' ', $options) . ']';
    }
}

class ReadMessageOptions extends Options {
    /**
     * @param string $order The sort order of the returned messages
     */
    public function __construct($order = Values::NONE) {
        $this->options['order'] = $order;
    }

    /**
     * The sort order of the returned messages. Can be: `asc` (ascending) or `desc` (descending) with `asc` as the default.
     *
     * @param string $order The sort order of the returned messages
     * @return $this Fluent Builder
     */
    public function setOrder($order) {
        $this->options['order'] = $order;
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
        return '[Twilio.Chat.V1.ReadMessageOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateMessageOptions extends Options {
    /**
     * @param string $body The message to send to the channel
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     */
    public function __construct($body = Values::NONE, $attributes = Values::NONE) {
        $this->options['body'] = $body;
        $this->options['attributes'] = $attributes;
    }

    /**
     * The message to send to the channel. Can also be an empty string or `null`, which sets the value as an empty string. You can send structured data in the body by serializing it as a string.
     *
     * @param string $body The message to send to the channel
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * A valid JSON string that contains application-specific data.
     *
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
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
        return '[Twilio.Chat.V1.UpdateMessageOptions ' . implode(' ', $options) . ']';
    }
}