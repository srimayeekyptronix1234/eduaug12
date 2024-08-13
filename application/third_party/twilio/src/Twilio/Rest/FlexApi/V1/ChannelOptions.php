<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Options;
use Twilio\Values;

abstract class ChannelOptions {
    /**
     * @param string $target The Target Contact Identity
     * @param string $chatUniqueName The chat channel's unique name
     * @param string $preEngagementData The pre-engagement data
     * @param string $taskSid The SID of the TaskRouter task
     * @param string $taskAttributes The task attributes to be added for the
     *                               TaskRouter Task
     * @param bool $longLived Whether to create the channel as long-lived
     * @return CreateChannelOptions Options builder
     */
    public static function create($target = Values::NONE, $chatUniqueName = Values::NONE, $preEngagementData = Values::NONE, $taskSid = Values::NONE, $taskAttributes = Values::NONE, $longLived = Values::NONE) {
        return new CreateChannelOptions($target, $chatUniqueName, $preEngagementData, $taskSid, $taskAttributes, $longLived);
    }
}

class CreateChannelOptions extends Options {
    /**
     * @param string $target The Target Contact Identity
     * @param string $chatUniqueName The chat channel's unique name
     * @param string $preEngagementData The pre-engagement data
     * @param string $taskSid The SID of the TaskRouter task
     * @param string $taskAttributes The task attributes to be added for the
     *                               TaskRouter Task
     * @param bool $longLived Whether to create the channel as long-lived
     */
    public function __construct($target = Values::NONE, $chatUniqueName = Values::NONE, $preEngagementData = Values::NONE, $taskSid = Values::NONE, $taskAttributes = Values::NONE, $longLived = Values::NONE) {
        $this->options['target'] = $target;
        $this->options['chatUniqueName'] = $chatUniqueName;
        $this->options['preEngagementData'] = $preEngagementData;
        $this->options['taskSid'] = $taskSid;
        $this->options['taskAttributes'] = $taskAttributes;
        $this->options['longLived'] = $longLived;
    }

    /**
     * The Target Contact Identity, for example the phone number of an SMS.
     *
     * @param string $target The Target Contact Identity
     * @return $this Fluent Builder
     */
    public function setTarget($target) {
        $this->options['target'] = $target;
        return $this;
    }

    /**
     * The chat channel's unique name.
     *
     * @param string $chatUniqueName The chat channel's unique name
     * @return $this Fluent Builder
     */
    public function setChatUniqueName($chatUniqueName) {
        $this->options['chatUniqueName'] = $chatUniqueName;
        return $this;
    }

    /**
     * The pre-engagement data.
     *
     * @param string $preEngagementData The pre-engagement data
     * @return $this Fluent Builder
     */
    public function setPreEngagementData($preEngagementData) {
        $this->options['preEngagementData'] = $preEngagementData;
        return $this;
    }

    /**
     * The SID of the TaskRouter task.
     *
     * @param string $taskSid The SID of the TaskRouter task
     * @return $this Fluent Builder
     */
    public function setTaskSid($taskSid) {
        $this->options['taskSid'] = $taskSid;
        return $this;
    }

    /**
     * The task attributes to be added for the TaskRouter Task.
     *
     * @param string $taskAttributes The task attributes to be added for the
     *                               TaskRouter Task
     * @return $this Fluent Builder
     */
    public function setTaskAttributes($taskAttributes) {
        $this->options['taskAttributes'] = $taskAttributes;
        return $this;
    }

    /**
     * Whether to create the channel as long-lived.
     *
     * @param bool $longLived Whether to create the channel as long-lived
     * @return $this Fluent Builder
     */
    public function setLongLived($longLived) {
        $this->options['longLived'] = $longLived;
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
        return '[Twilio.FlexApi.V1.CreateChannelOptions ' . implode(' ', $options) . ']';
    }
}