<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Understand\Assistant\Task;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $accountSid
 * @property string $assistantSid
 * @property string $taskSid
 * @property int $samplesCount
 * @property int $fieldsCount
 * @property string $url
 */
class TaskStatisticsInstance extends InstanceResource {
    /**
     * Initialize the TaskStatisticsInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $assistantSid The unique ID of the parent Assistant.
     * @param string $taskSid The unique ID of the Task associated with this Field.
     * @return \Twilio\Rest\Preview\Understand\Assistant\Task\TaskStatisticsInstance
     */
    public function __construct(Version $version, array $payload, $assistantSid, $taskSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'assistantSid' => Values::array_get($payload, 'assistant_sid'),
            'taskSid' => Values::array_get($payload, 'task_sid'),
            'samplesCount' => Values::array_get($payload, 'samples_count'),
            'fieldsCount' => Values::array_get($payload, 'fields_count'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('assistantSid' => $assistantSid, 'taskSid' => $taskSid, );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Understand\Assistant\Task\TaskStatisticsContext Context for this TaskStatisticsInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new TaskStatisticsContext(
                $this->version,
                $this->solution['assistantSid'],
                $this->solution['taskSid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a TaskStatisticsInstance
     *
     * @return TaskStatisticsInstance Fetched TaskStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
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
        return '[Twilio.Preview.Understand.TaskStatisticsInstance ' . implode(' ', $context) . ']';
    }
}