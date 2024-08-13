<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\BulkExports;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Preview\BulkExports\Export\DayList;
use Twilio\Rest\Preview\BulkExports\Export\ExportCustomJobList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Preview\BulkExports\Export\DayList $days
 * @property \Twilio\Rest\Preview\BulkExports\Export\ExportCustomJobList $exportCustomJobs
 */
class ExportContext extends InstanceContext {
    protected $_days = null;
    protected $_exportCustomJobs = null;

    /**
     * Initialize the ExportContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $resourceType The resource_type
     * @return \Twilio\Rest\Preview\BulkExports\ExportContext
     */
    public function __construct(Version $version, $resourceType) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('resourceType' => $resourceType, );

        $this->uri = '/Exports/' . rawurlencode($resourceType) . '';
    }

    /**
     * Fetch a ExportInstance
     *
     * @return ExportInstance Fetched ExportInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ExportInstance($this->version, $payload, $this->solution['resourceType']);
    }

    /**
     * Access the days
     *
     * @return \Twilio\Rest\Preview\BulkExports\Export\DayList
     */
    protected function getDays() {
        if (!$this->_days) {
            $this->_days = new DayList($this->version, $this->solution['resourceType']);
        }

        return $this->_days;
    }

    /**
     * Access the exportCustomJobs
     *
     * @return \Twilio\Rest\Preview\BulkExports\Export\ExportCustomJobList
     */
    protected function getExportCustomJobs() {
        if (!$this->_exportCustomJobs) {
            $this->_exportCustomJobs = new ExportCustomJobList($this->version, $this->solution['resourceType']);
        }

        return $this->_exportCustomJobs;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.BulkExports.ExportContext ' . implode(' ', $context) . ']';
    }
}