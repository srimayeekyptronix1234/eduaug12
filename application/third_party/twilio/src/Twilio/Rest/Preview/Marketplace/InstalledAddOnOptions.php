<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Marketplace;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class InstalledAddOnOptions {
    /**
     * @param array $configuration The JSON object representing the configuration
     * @param string $uniqueName The string that uniquely identifies this Add-on
     *                           installation
     * @return CreateInstalledAddOnOptions Options builder
     */
    public static function create($configuration = Values::NONE, $uniqueName = Values::NONE) {
        return new CreateInstalledAddOnOptions($configuration, $uniqueName);
    }

    /**
     * @param array $configuration The JSON object representing the configuration
     * @param string $uniqueName The string that uniquely identifies this Add-on
     *                           installation
     * @return UpdateInstalledAddOnOptions Options builder
     */
    public static function update($configuration = Values::NONE, $uniqueName = Values::NONE) {
        return new UpdateInstalledAddOnOptions($configuration, $uniqueName);
    }
}

class CreateInstalledAddOnOptions extends Options {
    /**
     * @param array $configuration The JSON object representing the configuration
     * @param string $uniqueName The string that uniquely identifies this Add-on
     *                           installation
     */
    public function __construct($configuration = Values::NONE, $uniqueName = Values::NONE) {
        $this->options['configuration'] = $configuration;
        $this->options['uniqueName'] = $uniqueName;
    }

    /**
     * The JSON object representing the configuration of the new Add-on installation.
     *
     * @param array $configuration The JSON object representing the configuration
     * @return $this Fluent Builder
     */
    public function setConfiguration($configuration) {
        $this->options['configuration'] = $configuration;
        return $this;
    }

    /**
     * The human-readable string that uniquely identifies this Add-on installation for an Account.
     *
     * @param string $uniqueName The string that uniquely identifies this Add-on
     *                           installation
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
        return '[Twilio.Preview.Marketplace.CreateInstalledAddOnOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateInstalledAddOnOptions extends Options {
    /**
     * @param array $configuration The JSON object representing the configuration
     * @param string $uniqueName The string that uniquely identifies this Add-on
     *                           installation
     */
    public function __construct($configuration = Values::NONE, $uniqueName = Values::NONE) {
        $this->options['configuration'] = $configuration;
        $this->options['uniqueName'] = $uniqueName;
    }

    /**
     * Valid JSON object that conform to the configuration schema exposed by the associated Available Add-on resource. This is only required by Add-ons that need to be configured
     *
     * @param array $configuration The JSON object representing the configuration
     * @return $this Fluent Builder
     */
    public function setConfiguration($configuration) {
        $this->options['configuration'] = $configuration;
        return $this;
    }

    /**
     * The human-readable string that uniquely identifies this Add-on installation for an Account.
     *
     * @param string $uniqueName The string that uniquely identifies this Add-on
     *                           installation
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
        return '[Twilio.Preview.Marketplace.UpdateInstalledAddOnOptions ' . implode(' ', $options) . ']';
    }
}