<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Sync\Service;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class DocumentOptions {
    /**
     * @param string $uniqueName The unique_name
     * @param array $data The data
     * @return CreateDocumentOptions Options builder
     */
    public static function create($uniqueName = Values::NONE, $data = Values::NONE) {
        return new CreateDocumentOptions($uniqueName, $data);
    }
}

class CreateDocumentOptions extends Options {
    /**
     * @param string $uniqueName The unique_name
     * @param array $data The data
     */
    public function __construct($uniqueName = Values::NONE, $data = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['data'] = $data;
    }

    /**
     * The unique_name
     *
     * @param string $uniqueName The unique_name
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * The data
     *
     * @param array $data The data
     * @return $this Fluent Builder
     */
    public function setData($data) {
        $this->options['data'] = $data;
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
        return '[Twilio.Preview.Sync.CreateDocumentOptions ' . implode(' ', $options) . ']';
    }
}