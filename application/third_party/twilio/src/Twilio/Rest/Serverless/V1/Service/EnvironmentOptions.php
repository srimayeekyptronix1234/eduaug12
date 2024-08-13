<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1\Service;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class EnvironmentOptions {
    /**
     * @param string $domainSuffix A URL-friendly name that represents the
     *                             environment
     * @return CreateEnvironmentOptions Options builder
     */
    public static function create($domainSuffix = Values::NONE) {
        return new CreateEnvironmentOptions($domainSuffix);
    }
}

class CreateEnvironmentOptions extends Options {
    /**
     * @param string $domainSuffix A URL-friendly name that represents the
     *                             environment
     */
    public function __construct($domainSuffix = Values::NONE) {
        $this->options['domainSuffix'] = $domainSuffix;
    }

    /**
     * A URL-friendly name that represents the environment and forms part of the domain name. Must have fewer than 32 characters.
     *
     * @param string $domainSuffix A URL-friendly name that represents the
     *                             environment
     * @return $this Fluent Builder
     */
    public function setDomainSuffix($domainSuffix) {
        $this->options['domainSuffix'] = $domainSuffix;
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
        return '[Twilio.Serverless.V1.CreateEnvironmentOptions ' . implode(' ', $options) . ']';
    }
}