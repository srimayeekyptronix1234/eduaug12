<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Preview\BulkExports\ExportConfigurationList;
use Twilio\Rest\Preview\BulkExports\ExportList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Preview\BulkExports\ExportList $exports
 * @property \Twilio\Rest\Preview\BulkExports\ExportConfigurationList $exportConfiguration
 * @method \Twilio\Rest\Preview\BulkExports\ExportContext exports(string $resourceType)
 * @method \Twilio\Rest\Preview\BulkExports\ExportConfigurationContext exportConfiguration(string $resourceType)
 */
class BulkExports extends Version {
    protected $_exports = null;
    protected $_exportConfiguration = null;

    /**
     * Construct the BulkExports version of Preview
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Preview\BulkExports BulkExports version of Preview
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'BulkExports';
    }

    /**
     * @return \Twilio\Rest\Preview\BulkExports\ExportList
     */
    protected function getExports() {
        if (!$this->_exports) {
            $this->_exports = new ExportList($this);
        }
        return $this->_exports;
    }

    /**
     * @return \Twilio\Rest\Preview\BulkExports\ExportConfigurationList
     */
    protected function getExportConfiguration() {
        if (!$this->_exportConfiguration) {
            $this->_exportConfiguration = new ExportConfigurationList($this);
        }
        return $this->_exportConfiguration;
    }

    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.BulkExports]';
    }
}