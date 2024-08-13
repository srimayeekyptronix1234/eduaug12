<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Usage;

use Twilio\Options;
use Twilio\Values;

abstract class TriggerOptions {
    /**
     * @param string $callbackMethod The HTTP method to use to call callback_url
     * @param string $callbackUrl The URL we call when the trigger fires
     * @param string $friendlyName A string to describe the resource
     * @return UpdateTriggerOptions Options builder
     */
    public static function update($callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $friendlyName = Values::NONE) {
        return new UpdateTriggerOptions($callbackMethod, $callbackUrl, $friendlyName);
    }

    /**
     * @param string $callbackMethod The HTTP method to use to call callback_url
     * @param string $friendlyName A string to describe the resource
     * @param string $recurring The frequency of a recurring UsageTrigger
     * @param string $triggerBy The field in the UsageRecord resource that fires
     *                          the trigger
     * @return CreateTriggerOptions Options builder
     */
    public static function create($callbackMethod = Values::NONE, $friendlyName = Values::NONE, $recurring = Values::NONE, $triggerBy = Values::NONE) {
        return new CreateTriggerOptions($callbackMethod, $friendlyName, $recurring, $triggerBy);
    }

    /**
     * @param string $recurring The frequency of recurring UsageTriggers to read
     * @param string $triggerBy The trigger field of the UsageTriggers to read
     * @param string $usageCategory The usage category of the UsageTriggers to read
     * @return ReadTriggerOptions Options builder
     */
    public static function read($recurring = Values::NONE, $triggerBy = Values::NONE, $usageCategory = Values::NONE) {
        return new ReadTriggerOptions($recurring, $triggerBy, $usageCategory);
    }
}

class UpdateTriggerOptions extends Options {
    /**
     * @param string $callbackMethod The HTTP method to use to call callback_url
     * @param string $callbackUrl The URL we call when the trigger fires
     * @param string $friendlyName A string to describe the resource
     */
    public function __construct($callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['callbackMethod'] = $callbackMethod;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The HTTP method we should use to call `callback_url`. Can be: `GET` or `POST` and the default is `POST`.
     *
     * @param string $callbackMethod The HTTP method to use to call callback_url
     * @return $this Fluent Builder
     */
    public function setCallbackMethod($callbackMethod) {
        $this->options['callbackMethod'] = $callbackMethod;
        return $this;
    }

    /**
     * The URL we should call using `callback_method` when the trigger fires.
     *
     * @param string $callbackUrl The URL we call when the trigger fires
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl) {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
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
        return '[Twilio.Api.V2010.UpdateTriggerOptions ' . implode(' ', $options) . ']';
    }
}

class CreateTriggerOptions extends Options {
    /**
     * @param string $callbackMethod The HTTP method to use to call callback_url
     * @param string $friendlyName A string to describe the resource
     * @param string $recurring The frequency of a recurring UsageTrigger
     * @param string $triggerBy The field in the UsageRecord resource that fires
     *                          the trigger
     */
    public function __construct($callbackMethod = Values::NONE, $friendlyName = Values::NONE, $recurring = Values::NONE, $triggerBy = Values::NONE) {
        $this->options['callbackMethod'] = $callbackMethod;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['recurring'] = $recurring;
        $this->options['triggerBy'] = $triggerBy;
    }

    /**
     * The HTTP method we should use to call `callback_url`. Can be: `GET` or `POST` and the default is `POST`.
     *
     * @param string $callbackMethod The HTTP method to use to call callback_url
     * @return $this Fluent Builder
     */
    public function setCallbackMethod($callbackMethod) {
        $this->options['callbackMethod'] = $callbackMethod;
        return $this;
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
     * The frequency of a recurring UsageTrigger.  Can be: `daily`, `monthly`, or `yearly` for recurring triggers or empty for non-recurring triggers. A trigger will only fire once during each period. Recurring times are in GMT.
     *
     * @param string $recurring The frequency of a recurring UsageTrigger
     * @return $this Fluent Builder
     */
    public function setRecurring($recurring) {
        $this->options['recurring'] = $recurring;
        return $this;
    }

    /**
     * The field in the [UsageRecord](https://www.twilio.com/docs/usage/api/usage-record) resource that should fire the trigger.  Can be: `count`, `usage`, or `price` as described in the [UsageRecords documentation](https://www.twilio.com/docs/usage/api/usage-record#usage-count-price).  The default is `usage`.
     *
     * @param string $triggerBy The field in the UsageRecord resource that fires
     *                          the trigger
     * @return $this Fluent Builder
     */
    public function setTriggerBy($triggerBy) {
        $this->options['triggerBy'] = $triggerBy;
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
        return '[Twilio.Api.V2010.CreateTriggerOptions ' . implode(' ', $options) . ']';
    }
}

class ReadTriggerOptions extends Options {
    /**
     * @param string $recurring The frequency of recurring UsageTriggers to read
     * @param string $triggerBy The trigger field of the UsageTriggers to read
     * @param string $usageCategory The usage category of the UsageTriggers to read
     */
    public function __construct($recurring = Values::NONE, $triggerBy = Values::NONE, $usageCategory = Values::NONE) {
        $this->options['recurring'] = $recurring;
        $this->options['triggerBy'] = $triggerBy;
        $this->options['usageCategory'] = $usageCategory;
    }

    /**
     * The frequency of recurring UsageTriggers to read. Can be: `daily`, `monthly`, or `yearly` to read recurring UsageTriggers. An empty value or a value of `alltime` reads non-recurring UsageTriggers.
     *
     * @param string $recurring The frequency of recurring UsageTriggers to read
     * @return $this Fluent Builder
     */
    public function setRecurring($recurring) {
        $this->options['recurring'] = $recurring;
        return $this;
    }

    /**
     * The trigger field of the UsageTriggers to read.  Can be: `count`, `usage`, or `price` as described in the [UsageRecords documentation](https://www.twilio.com/docs/usage/api/usage-record#usage-count-price).
     *
     * @param string $triggerBy The trigger field of the UsageTriggers to read
     * @return $this Fluent Builder
     */
    public function setTriggerBy($triggerBy) {
        $this->options['triggerBy'] = $triggerBy;
        return $this;
    }

    /**
     * The usage category of the UsageTriggers to read. Must be a supported [usage categories](https://www.twilio.com/docs/usage/api/usage-record#usage-categories).
     *
     * @param string $usageCategory The usage category of the UsageTriggers to read
     * @return $this Fluent Builder
     */
    public function setUsageCategory($usageCategory) {
        $this->options['usageCategory'] = $usageCategory;
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
        return '[Twilio.Api.V2010.ReadTriggerOptions ' . implode(' ', $options) . ']';
    }
}