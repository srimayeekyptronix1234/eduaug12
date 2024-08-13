<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property int $avgTaskAcceptanceTime
 * @property \DateTime $startTime
 * @property \DateTime $endTime
 * @property int $reservationsCreated
 * @property int $reservationsAccepted
 * @property int $reservationsRejected
 * @property int $reservationsTimedOut
 * @property int $reservationsCanceled
 * @property int $reservationsRescinded
 * @property array $splitByWaitTime
 * @property array $waitDurationUntilAccepted
 * @property array $waitDurationUntilCanceled
 * @property int $tasksCanceled
 * @property int $tasksCompleted
 * @property int $tasksCreated
 * @property int $tasksDeleted
 * @property int $tasksMoved
 * @property int $tasksTimedOutInWorkflow
 * @property string $workspaceSid
 * @property string $url
 */
class WorkspaceCumulativeStatisticsInstance extends InstanceResource {
    /**
     * Initialize the WorkspaceCumulativeStatisticsInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsInstance
     */
    public function __construct(Version $version, array $payload, $workspaceSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'avgTaskAcceptanceTime' => Values::array_get($payload, 'avg_task_acceptance_time'),
            'startTime' => Deserialize::dateTime(Values::array_get($payload, 'start_time')),
            'endTime' => Deserialize::dateTime(Values::array_get($payload, 'end_time')),
            'reservationsCreated' => Values::array_get($payload, 'reservations_created'),
            'reservationsAccepted' => Values::array_get($payload, 'reservations_accepted'),
            'reservationsRejected' => Values::array_get($payload, 'reservations_rejected'),
            'reservationsTimedOut' => Values::array_get($payload, 'reservations_timed_out'),
            'reservationsCanceled' => Values::array_get($payload, 'reservations_canceled'),
            'reservationsRescinded' => Values::array_get($payload, 'reservations_rescinded'),
            'splitByWaitTime' => Values::array_get($payload, 'split_by_wait_time'),
            'waitDurationUntilAccepted' => Values::array_get($payload, 'wait_duration_until_accepted'),
            'waitDurationUntilCanceled' => Values::array_get($payload, 'wait_duration_until_canceled'),
            'tasksCanceled' => Values::array_get($payload, 'tasks_canceled'),
            'tasksCompleted' => Values::array_get($payload, 'tasks_completed'),
            'tasksCreated' => Values::array_get($payload, 'tasks_created'),
            'tasksDeleted' => Values::array_get($payload, 'tasks_deleted'),
            'tasksMoved' => Values::array_get($payload, 'tasks_moved'),
            'tasksTimedOutInWorkflow' => Values::array_get($payload, 'tasks_timed_out_in_workflow'),
            'workspaceSid' => Values::array_get($payload, 'workspace_sid'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('workspaceSid' => $workspaceSid, );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsContext Context for this
     *                                                                                   WorkspaceCumulativeStatisticsInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new WorkspaceCumulativeStatisticsContext(
                $this->version,
                $this->solution['workspaceSid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a WorkspaceCumulativeStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkspaceCumulativeStatisticsInstance Fetched
     *                                               WorkspaceCumulativeStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array()) {
        return $this->proxy()->fetch($options);
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
        return '[Twilio.Taskrouter.V1.WorkspaceCumulativeStatisticsInstance ' . implode(' ', $context) . ']';
    }
}