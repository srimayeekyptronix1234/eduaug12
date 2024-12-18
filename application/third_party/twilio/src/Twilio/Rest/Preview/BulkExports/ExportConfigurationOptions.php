<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\BulkExports;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class ExportConfigurationOptions {
    /**
     * @param bool $enabled The enabled
     * @param string $webhookUrl The webhook_url
     * @param string $webhookMethod The webhook_method
     * @return UpdateExportConfigurationOptions Options builder
     */
    public static function update($enabled = Values::NONE, $webhookUrl = Values::NONE, $webhookMethod = Values::NONE) {
        return new UpdateExportConfigurationOptions($enabled, $webhookUrl, $webhookMethod);
    }
}

class UpdateExportConfigurationOptions extends Options {
    /**
     * @param bool $enabled The enabled
     * @param string $webhookUrl The webhook_url
     * @param string $webhookMethod The webhook_method
     */
    public function __construct($enabled = Values::NONE, $webhookUrl = Values::NONE, $webhookMethod = Values::NONE) {
        $this->options['enabled'] = $enabled;
        $this->options['webhookUrl'] = $webhookUrl;
        $this->options['webhookMethod'] = $webhookMethod;
    }

    /**
     * The enabled
     *
     * @param bool $enabled The enabled
     * @return $this Fluent Builder
     */
    public function setEnabled($enabled) {
        $this->options['enabled'] = $enabled;
        return $this;
    }

    /**
     * The webhook_url
     *
     * @param string $webhookUrl The webhook_url
     * @return $this Fluent Builder
     */
    public function setWebhookUrl($webhookUrl) {
        $this->options['webhookUrl'] = $webhookUrl;
        return $this;
    }

    /**
     * The webhook_method
     *
     * @param string $webhookMethod The webhook_method
     * @return $this Fluent Builder
     */
    public function setWebhookMethod($webhookMethod) {
        $this->options['webhookMethod'] = $webhookMethod;
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
        return '[Twilio.Preview.BulkExports.UpdateExportConfigurationOptions ' . implode(' ', $options) . ']';
    }
}