<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\DeployedDevices\Fleet;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class KeyOptions {
    /**
     * @param string $friendlyName The human readable description for this Key.
     * @param string $deviceSid The unique identifier of a Key to be authenticated.
     * @return CreateKeyOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $deviceSid = Values::NONE) {
        return new CreateKeyOptions($friendlyName, $deviceSid);
    }

    /**
     * @param string $deviceSid Find all Keys authenticating specified Device.
     * @return ReadKeyOptions Options builder
     */
    public static function read($deviceSid = Values::NONE) {
        return new ReadKeyOptions($deviceSid);
    }

    /**
     * @param string $friendlyName The human readable description for this Key.
     * @param string $deviceSid The unique identifier of a Key to be authenticated.
     * @return UpdateKeyOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $deviceSid = Values::NONE) {
        return new UpdateKeyOptions($friendlyName, $deviceSid);
    }
}

class CreateKeyOptions extends Options {
    /**
     * @param string $friendlyName The human readable description for this Key.
     * @param string $deviceSid The unique identifier of a Key to be authenticated.
     */
    public function __construct($friendlyName = Values::NONE, $deviceSid = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['deviceSid'] = $deviceSid;
    }

    /**
     * Provides a human readable descriptive text for this Key credential, up to 256 characters long.
     *
     * @param string $friendlyName The human readable description for this Key.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provides the unique string identifier of an existing Device to become authenticated with this Key credential.
     *
     * @param string $deviceSid The unique identifier of a Key to be authenticated.
     * @return $this Fluent Builder
     */
    public function setDeviceSid($deviceSid) {
        $this->options['deviceSid'] = $deviceSid;
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
        return '[Twilio.Preview.DeployedDevices.CreateKeyOptions ' . implode(' ', $options) . ']';
    }
}

class ReadKeyOptions extends Options {
    /**
     * @param string $deviceSid Find all Keys authenticating specified Device.
     */
    public function __construct($deviceSid = Values::NONE) {
        $this->options['deviceSid'] = $deviceSid;
    }

    /**
     * Filters the resulting list of Keys by a unique string identifier of an authenticated Device.
     *
     * @param string $deviceSid Find all Keys authenticating specified Device.
     * @return $this Fluent Builder
     */
    public function setDeviceSid($deviceSid) {
        $this->options['deviceSid'] = $deviceSid;
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
        return '[Twilio.Preview.DeployedDevices.ReadKeyOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateKeyOptions extends Options {
    /**
     * @param string $friendlyName The human readable description for this Key.
     * @param string $deviceSid The unique identifier of a Key to be authenticated.
     */
    public function __construct($friendlyName = Values::NONE, $deviceSid = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['deviceSid'] = $deviceSid;
    }

    /**
     * Provides a human readable descriptive text for this Key credential, up to 256 characters long.
     *
     * @param string $friendlyName The human readable description for this Key.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provides the unique string identifier of an existing Device to become authenticated with this Key credential.
     *
     * @param string $deviceSid The unique identifier of a Key to be authenticated.
     * @return $this Fluent Builder
     */
    public function setDeviceSid($deviceSid) {
        $this->options['deviceSid'] = $deviceSid;
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
        return '[Twilio.Preview.DeployedDevices.UpdateKeyOptions ' . implode(' ', $options) . ']';
    }
}