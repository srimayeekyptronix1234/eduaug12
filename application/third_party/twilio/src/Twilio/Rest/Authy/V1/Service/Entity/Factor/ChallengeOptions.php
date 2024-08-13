<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Authy\V1\Service\Entity\Factor;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class ChallengeOptions {
    /**
     * @param \DateTime $expirationDate The future date in which this Challenge
     *                                  will expire
     * @param string $details Public details provided to contextualize the Challenge
     * @param string $hiddenDetails Hidden details provided to contextualize the
     *                              Challenge
     * @return CreateChallengeOptions Options builder
     */
    public static function create($expirationDate = Values::NONE, $details = Values::NONE, $hiddenDetails = Values::NONE) {
        return new CreateChallengeOptions($expirationDate, $details, $hiddenDetails);
    }

    /**
     * @param string $authPayload Optional payload to verify the Challenge
     * @return UpdateChallengeOptions Options builder
     */
    public static function update($authPayload = Values::NONE) {
        return new UpdateChallengeOptions($authPayload);
    }
}

class CreateChallengeOptions extends Options {
    /**
     * @param \DateTime $expirationDate The future date in which this Challenge
     *                                  will expire
     * @param string $details Public details provided to contextualize the Challenge
     * @param string $hiddenDetails Hidden details provided to contextualize the
     *                              Challenge
     */
    public function __construct($expirationDate = Values::NONE, $details = Values::NONE, $hiddenDetails = Values::NONE) {
        $this->options['expirationDate'] = $expirationDate;
        $this->options['details'] = $details;
        $this->options['hiddenDetails'] = $hiddenDetails;
    }

    /**
     * The future date in which this Challenge will expire, given in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $expirationDate The future date in which this Challenge
     *                                  will expire
     * @return $this Fluent Builder
     */
    public function setExpirationDate($expirationDate) {
        $this->options['expirationDate'] = $expirationDate;
        return $this;
    }

    /**
     * Details provided to give context about the Challenge. Shown to the end user.
     *
     * @param string $details Public details provided to contextualize the Challenge
     * @return $this Fluent Builder
     */
    public function setDetails($details) {
        $this->options['details'] = $details;
        return $this;
    }

    /**
     * Details provided to give context about the Challenge. Not shown to the end user.
     *
     * @param string $hiddenDetails Hidden details provided to contextualize the
     *                              Challenge
     * @return $this Fluent Builder
     */
    public function setHiddenDetails($hiddenDetails) {
        $this->options['hiddenDetails'] = $hiddenDetails;
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
        return '[Twilio.Authy.V1.CreateChallengeOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateChallengeOptions extends Options {
    /**
     * @param string $authPayload Optional payload to verify the Challenge
     */
    public function __construct($authPayload = Values::NONE) {
        $this->options['authPayload'] = $authPayload;
    }

    /**
     * The optional payload needed to verify the Challenge. E.g., a TOTP would use the numeric code.
     *
     * @param string $authPayload Optional payload to verify the Challenge
     * @return $this Fluent Builder
     */
    public function setAuthPayload($authPayload) {
        $this->options['authPayload'] = $authPayload;
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
        return '[Twilio.Authy.V1.UpdateChallengeOptions ' . implode(' ', $options) . ']';
    }
}