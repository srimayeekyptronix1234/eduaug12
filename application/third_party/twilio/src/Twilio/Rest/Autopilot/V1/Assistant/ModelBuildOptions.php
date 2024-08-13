<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Autopilot\V1\Assistant;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class ModelBuildOptions {
    /**
     * @param string $statusCallback The URL we should call using a POST method to
     *                               send status information to your application
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the new resource
     * @return CreateModelBuildOptions Options builder
     */
    public static function create($statusCallback = Values::NONE, $uniqueName = Values::NONE) {
        return new CreateModelBuildOptions($statusCallback, $uniqueName);
    }

    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @return UpdateModelBuildOptions Options builder
     */
    public static function update($uniqueName = Values::NONE) {
        return new UpdateModelBuildOptions($uniqueName);
    }
}

class CreateModelBuildOptions extends Options {
    /**
     * @param string $statusCallback The URL we should call using a POST method to
     *                               send status information to your application
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the new resource
     */
    public function __construct($statusCallback = Values::NONE, $uniqueName = Values::NONE) {
        $this->options['statusCallback'] = $statusCallback;
        $this->options['uniqueName'] = $uniqueName;
    }

    /**
     * The URL we should call using a POST method to send status information to your application.
     *
     * @param string $statusCallback The URL we should call using a POST method to
     *                               send status information to your application
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * An application-defined string that uniquely identifies the new resource. This value must be a unique string of no more than 64 characters. It can be used as an alternative to the `sid` in the URL path to address the resource.
     *
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the new resource
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
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
        return '[Twilio.Autopilot.V1.CreateModelBuildOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateModelBuildOptions extends Options {
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     */
    public function __construct($uniqueName = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
    }

    /**
     * An application-defined string that uniquely identifies the resource. This value must be a unique string of no more than 64 characters. It can be used as an alternative to the `sid` in the URL path to address the resource.
     *
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
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
        return '[Twilio.Autopilot.V1.UpdateModelBuildOptions ' . implode(' ', $options) . ']';
    }
}