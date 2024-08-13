<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\BulkExports\Export;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $resourceType
 * @property string $friendlyName
 * @property array $details
 * @property string $startDay
 * @property string $endDay
 * @property string $jobSid
 * @property string $url
 */
class JobInstance extends InstanceResource {
    /**
     * Initialize the JobInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $jobSid The job_sid
     * @return \Twilio\Rest\Preview\BulkExports\Export\JobInstance
     */
    public function __construct(Version $version, array $payload, $jobSid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'resourceType' => Values::array_get($payload, 'resource_type'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'details' => Values::array_get($payload, 'details'),
            'startDay' => Values::array_get($payload, 'start_day'),
            'endDay' => Values::array_get($payload, 'end_day'),
            'jobSid' => Values::array_get($payload, 'job_sid'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('jobSid' => $jobSid ?: $this->properties['jobSid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\BulkExports\Export\JobContext Context for this
     *                                                            JobInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new JobContext($this->version, $this->solution['jobSid']);
        }

        return $this->context;
    }

    /**
     * Fetch a JobInstance
     *
     * @return JobInstance Fetched JobInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the JobInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Preview.BulkExports.JobInstance ' . implode(' ', $context) . ']';
    }
}