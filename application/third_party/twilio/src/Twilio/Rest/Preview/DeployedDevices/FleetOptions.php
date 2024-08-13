<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\DeployedDevices;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class FleetOptions {
    /**
     * @param string $friendlyName A human readable description for this Fleet.
     * @return CreateFleetOptions Options builder
     */
    public static function create($friendlyName = Values::NONE) {
        return new CreateFleetOptions($friendlyName);
    }

    /**
     * @param string $friendlyName A human readable description for this Fleet.
     * @param string $defaultDeploymentSid A default Deployment SID.
     * @return UpdateFleetOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $defaultDeploymentSid = Values::NONE) {
        return new UpdateFleetOptions($friendlyName, $defaultDeploymentSid);
    }
}

class CreateFleetOptions extends Options {
    /**
     * @param string $friendlyName A human readable description for this Fleet.
     */
    public function __construct($friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * Provides a human readable descriptive text for this Fleet, up to 256 characters long.
     *
     * @param string $friendlyName A human readable description for this Fleet.
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
        return '[Twilio.Preview.DeployedDevices.CreateFleetOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateFleetOptions extends Options {
    /**
     * @param string $friendlyName A human readable description for this Fleet.
     * @param string $defaultDeploymentSid A default Deployment SID.
     */
    public function __construct($friendlyName = Values::NONE, $defaultDeploymentSid = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['defaultDeploymentSid'] = $defaultDeploymentSid;
    }

    /**
     * Provides a human readable descriptive text for this Fleet, up to 256 characters long.
     *
     * @param string $friendlyName A human readable description for this Fleet.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provides a string identifier of a Deployment that is going to be used as a default one for this Fleet.
     *
     * @param string $defaultDeploymentSid A default Deployment SID.
     * @return $this Fluent Builder
     */
    public function setDefaultDeploymentSid($defaultDeploymentSid) {
        $this->options['defaultDeploymentSid'] = $defaultDeploymentSid;
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
        return '[Twilio.Preview.DeployedDevices.UpdateFleetOptions ' . implode(' ', $options) . ']';
    }
}