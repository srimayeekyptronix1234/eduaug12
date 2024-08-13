<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\Options;
use Twilio\Values;

abstract class FeedbackSummaryOptions {
    /**
     * @param bool $includeSubaccounts `true` includes feedback from the specified
     *                                 account and its subaccounts
     * @param string $statusCallback The URL that we will request when the feedback
     *                               summary is complete
     * @param string $statusCallbackMethod The HTTP method we use to make requests
     *                                     to the StatusCallback URL
     * @return CreateFeedbackSummaryOptions Options builder
     */
    public static function create($includeSubaccounts = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        return new CreateFeedbackSummaryOptions($includeSubaccounts, $statusCallback, $statusCallbackMethod);
    }
}

class CreateFeedbackSummaryOptions extends Options {
    /**
     * @param bool $includeSubaccounts `true` includes feedback from the specified
     *                                 account and its subaccounts
     * @param string $statusCallback The URL that we will request when the feedback
     *                               summary is complete
     * @param string $statusCallbackMethod The HTTP method we use to make requests
     *                                     to the StatusCallback URL
     */
    public function __construct($includeSubaccounts = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        $this->options['includeSubaccounts'] = $includeSubaccounts;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
    }

    /**
     * Whether to also include Feedback resources from all subaccounts. `true` includes feedback from all subaccounts and `false`, the default, includes feedback from only the specified account.
     *
     * @param bool $includeSubaccounts `true` includes feedback from the specified
     *                                 account and its subaccounts
     * @return $this Fluent Builder
     */
    public function setIncludeSubaccounts($includeSubaccounts) {
        $this->options['includeSubaccounts'] = $includeSubaccounts;
        return $this;
    }

    /**
     * The URL that we will request when the feedback summary is complete.
     *
     * @param string $statusCallback The URL that we will request when the feedback
     *                               summary is complete
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The HTTP method (`GET` or `POST`) we use to make the request to the `StatusCallback` URL.
     *
     * @param string $statusCallbackMethod The HTTP method we use to make requests
     *                                     to the StatusCallback URL
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
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
        return '[Twilio.Api.V2010.CreateFeedbackSummaryOptions ' . implode(' ', $options) . ']';
    }
}