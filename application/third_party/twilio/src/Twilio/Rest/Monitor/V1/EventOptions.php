<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Monitor\V1;

use Twilio\Options;
use Twilio\Values;

abstract class EventOptions {
    /**
     * @param string $actorSid Only include events initiated by this Actor
     * @param string $eventType Only include events of this Event Type
     * @param string $resourceSid Only include events that refer to this resource
     * @param string $sourceIpAddress Only include events that originated from this
     *                                IP address
     * @param \DateTime $startDate Only include events that occurred on or after
     *                             this date
     * @param \DateTime $endDate Only include events that occurred on or before
     *                           this date
     * @return ReadEventOptions Options builder
     */
    public static function read($actorSid = Values::NONE, $eventType = Values::NONE, $resourceSid = Values::NONE, $sourceIpAddress = Values::NONE, $startDate = Values::NONE, $endDate = Values::NONE) {
        return new ReadEventOptions($actorSid, $eventType, $resourceSid, $sourceIpAddress, $startDate, $endDate);
    }
}

class ReadEventOptions extends Options {
    /**
     * @param string $actorSid Only include events initiated by this Actor
     * @param string $eventType Only include events of this Event Type
     * @param string $resourceSid Only include events that refer to this resource
     * @param string $sourceIpAddress Only include events that originated from this
     *                                IP address
     * @param \DateTime $startDate Only include events that occurred on or after
     *                             this date
     * @param \DateTime $endDate Only include events that occurred on or before
     *                           this date
     */
    public function __construct($actorSid = Values::NONE, $eventType = Values::NONE, $resourceSid = Values::NONE, $sourceIpAddress = Values::NONE, $startDate = Values::NONE, $endDate = Values::NONE) {
        $this->options['actorSid'] = $actorSid;
        $this->options['eventType'] = $eventType;
        $this->options['resourceSid'] = $resourceSid;
        $this->options['sourceIpAddress'] = $sourceIpAddress;
        $this->options['startDate'] = $startDate;
        $this->options['endDate'] = $endDate;
    }

    /**
     * Only include events initiated by this Actor. Useful for auditing actions taken by specific users or API credentials.
     *
     * @param string $actorSid Only include events initiated by this Actor
     * @return $this Fluent Builder
     */
    public function setActorSid($actorSid) {
        $this->options['actorSid'] = $actorSid;
        return $this;
    }

    /**
     * Only include events of this [Event Type](https://www.twilio.com/docs/usage/monitor-events#event-types).
     *
     * @param string $eventType Only include events of this Event Type
     * @return $this Fluent Builder
     */
    public function setEventType($eventType) {
        $this->options['eventType'] = $eventType;
        return $this;
    }

    /**
     * Only include events that refer to this resource. Useful for discovering the history of a specific resource.
     *
     * @param string $resourceSid Only include events that refer to this resource
     * @return $this Fluent Builder
     */
    public function setResourceSid($resourceSid) {
        $this->options['resourceSid'] = $resourceSid;
        return $this;
    }

    /**
     * Only include events that originated from this IP address. Useful for tracking suspicious activity originating from the API or the Twilio Console.
     *
     * @param string $sourceIpAddress Only include events that originated from this
     *                                IP address
     * @return $this Fluent Builder
     */
    public function setSourceIpAddress($sourceIpAddress) {
        $this->options['sourceIpAddress'] = $sourceIpAddress;
        return $this;
    }

    /**
     * Only include events that occurred on or after this date. Specify the date in GMT and [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $startDate Only include events that occurred on or after
     *                             this date
     * @return $this Fluent Builder
     */
    public function setStartDate($startDate) {
        $this->options['startDate'] = $startDate;
        return $this;
    }

    /**
     * Only include events that occurred on or before this date. Specify the date in GMT and [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $endDate Only include events that occurred on or before
     *                           this date
     * @return $this Fluent Builder
     */
    public function setEndDate($endDate) {
        $this->options['endDate'] = $endDate;
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
        return '[Twilio.Monitor.V1.ReadEventOptions ' . implode(' ', $options) . ']';
    }
}