<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Options;
use Twilio\Values;

abstract class WorkerOptions {
    /**
     * @param string $activityName The activity_name of the Worker resources to read
     * @param string $activitySid The activity_sid of the Worker resources to read
     * @param string $available Whether to return Worker resources that are
     *                          available or unavailable
     * @param string $friendlyName The friendly_name of the Worker resources to read
     * @param string $targetWorkersExpression Filter by Workers that would match an
     *                                        expression on a TaskQueue
     * @param string $taskQueueName The friendly_name of the TaskQueue that the
     *                              Workers to read are eligible for
     * @param string $taskQueueSid The SID of the TaskQueue that the Workers to
     *                             read are eligible for
     * @return ReadWorkerOptions Options builder
     */
    public static function read($activityName = Values::NONE, $activitySid = Values::NONE, $available = Values::NONE, $friendlyName = Values::NONE, $targetWorkersExpression = Values::NONE, $taskQueueName = Values::NONE, $taskQueueSid = Values::NONE) {
        return new ReadWorkerOptions($activityName, $activitySid, $available, $friendlyName, $targetWorkersExpression, $taskQueueName, $taskQueueSid);
    }

    /**
     * @param string $activitySid The SID of a valid Activity that describes the
     *                            new Worker's initial state
     * @param string $attributes A valid JSON string that describes the new Worker
     * @return CreateWorkerOptions Options builder
     */
    public static function create($activitySid = Values::NONE, $attributes = Values::NONE) {
        return new CreateWorkerOptions($activitySid, $attributes);
    }

    /**
     * @param string $activitySid The SID of the Activity that describes the
     *                            Worker's initial state
     * @param string $attributes The JSON string that describes the Worker
     * @param string $friendlyName A string to describe the Worker
     * @param bool $rejectPendingReservations Whether to reject pending reservations
     * @return UpdateWorkerOptions Options builder
     */
    public static function update($activitySid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE, $rejectPendingReservations = Values::NONE) {
        return new UpdateWorkerOptions($activitySid, $attributes, $friendlyName, $rejectPendingReservations);
    }
}

class ReadWorkerOptions extends Options {
    /**
     * @param string $activityName The activity_name of the Worker resources to read
     * @param string $activitySid The activity_sid of the Worker resources to read
     * @param string $available Whether to return Worker resources that are
     *                          available or unavailable
     * @param string $friendlyName The friendly_name of the Worker resources to read
     * @param string $targetWorkersExpression Filter by Workers that would match an
     *                                        expression on a TaskQueue
     * @param string $taskQueueName The friendly_name of the TaskQueue that the
     *                              Workers to read are eligible for
     * @param string $taskQueueSid The SID of the TaskQueue that the Workers to
     *                             read are eligible for
     */
    public function __construct($activityName = Values::NONE, $activitySid = Values::NONE, $available = Values::NONE, $friendlyName = Values::NONE, $targetWorkersExpression = Values::NONE, $taskQueueName = Values::NONE, $taskQueueSid = Values::NONE) {
        $this->options['activityName'] = $activityName;
        $this->options['activitySid'] = $activitySid;
        $this->options['available'] = $available;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['targetWorkersExpression'] = $targetWorkersExpression;
        $this->options['taskQueueName'] = $taskQueueName;
        $this->options['taskQueueSid'] = $taskQueueSid;
    }

    /**
     * The `activity_name` of the Worker resources to read.
     *
     * @param string $activityName The activity_name of the Worker resources to read
     * @return $this Fluent Builder
     */
    public function setActivityName($activityName) {
        $this->options['activityName'] = $activityName;
        return $this;
    }

    /**
     * The `activity_sid` of the Worker resources to read.
     *
     * @param string $activitySid The activity_sid of the Worker resources to read
     * @return $this Fluent Builder
     */
    public function setActivitySid($activitySid) {
        $this->options['activitySid'] = $activitySid;
        return $this;
    }

    /**
     * Whether to return only Worker resources that are available or unavailable. Can be `true`, `1`, or `yes` to return Worker resources that are available, and `false`, or any value returns the Worker resources that are not available.
     *
     * @param string $available Whether to return Worker resources that are
     *                          available or unavailable
     * @return $this Fluent Builder
     */
    public function setAvailable($available) {
        $this->options['available'] = $available;
        return $this;
    }

    /**
     * The `friendly_name` of the Worker resources to read.
     *
     * @param string $friendlyName The friendly_name of the Worker resources to read
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Filter by Workers that would match an expression on a TaskQueue. This is helpful for debugging which Workers would match a potential queue.
     *
     * @param string $targetWorkersExpression Filter by Workers that would match an
     *                                        expression on a TaskQueue
     * @return $this Fluent Builder
     */
    public function setTargetWorkersExpression($targetWorkersExpression) {
        $this->options['targetWorkersExpression'] = $targetWorkersExpression;
        return $this;
    }

    /**
     * The `friendly_name` of the TaskQueue that the Workers to read are eligible for.
     *
     * @param string $taskQueueName The friendly_name of the TaskQueue that the
     *                              Workers to read are eligible for
     * @return $this Fluent Builder
     */
    public function setTaskQueueName($taskQueueName) {
        $this->options['taskQueueName'] = $taskQueueName;
        return $this;
    }

    /**
     * The SID of the TaskQueue that the Workers to read are eligible for.
     *
     * @param string $taskQueueSid The SID of the TaskQueue that the Workers to
     *                             read are eligible for
     * @return $this Fluent Builder
     */
    public function setTaskQueueSid($taskQueueSid) {
        $this->options['taskQueueSid'] = $taskQueueSid;
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
        return '[Twilio.Taskrouter.V1.ReadWorkerOptions ' . implode(' ', $options) . ']';
    }
}

class CreateWorkerOptions extends Options {
    /**
     * @param string $activitySid The SID of a valid Activity that describes the
     *                            new Worker's initial state
     * @param string $attributes A valid JSON string that describes the new Worker
     */
    public function __construct($activitySid = Values::NONE, $attributes = Values::NONE) {
        $this->options['activitySid'] = $activitySid;
        $this->options['attributes'] = $attributes;
    }

    /**
     * The SID of a valid Activity that will describe the new Worker's initial state. See [Activities](https://www.twilio.com/docs/taskrouter/api/activity) for more information. If not provided, the new Worker's initial state is the `default_activity_sid` configured on the Workspace.
     *
     * @param string $activitySid The SID of a valid Activity that describes the
     *                            new Worker's initial state
     * @return $this Fluent Builder
     */
    public function setActivitySid($activitySid) {
        $this->options['activitySid'] = $activitySid;
        return $this;
    }

    /**
     * A valid JSON string that describes the new Worker. For example: `{ "email": "Bob@example.com", "phone": "+5095551234" }`. This data is passed to the `assignment_callback_url` when TaskRouter assigns a Task to the Worker. Defaults to {}.
     *
     * @param string $attributes A valid JSON string that describes the new Worker
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
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
        return '[Twilio.Taskrouter.V1.CreateWorkerOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateWorkerOptions extends Options {
    /**
     * @param string $activitySid The SID of the Activity that describes the
     *                            Worker's initial state
     * @param string $attributes The JSON string that describes the Worker
     * @param string $friendlyName A string to describe the Worker
     * @param bool $rejectPendingReservations Whether to reject pending reservations
     */
    public function __construct($activitySid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE, $rejectPendingReservations = Values::NONE) {
        $this->options['activitySid'] = $activitySid;
        $this->options['attributes'] = $attributes;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['rejectPendingReservations'] = $rejectPendingReservations;
    }

    /**
     * The SID of a valid Activity that will describe the Worker's initial state. See [Activities](https://www.twilio.com/docs/taskrouter/api/activity) for more information.
     *
     * @param string $activitySid The SID of the Activity that describes the
     *                            Worker's initial state
     * @return $this Fluent Builder
     */
    public function setActivitySid($activitySid) {
        $this->options['activitySid'] = $activitySid;
        return $this;
    }

    /**
     * The JSON string that describes the Worker. For example: `{ "email": "Bob@example.com", "phone": "+5095551234" }`. This data is passed to the `assignment_callback_url` when TaskRouter assigns a Task to the Worker. Defaults to {}.
     *
     * @param string $attributes The JSON string that describes the Worker
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * A descriptive string that you create to describe the Worker. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the Worker
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Whether to reject pending reservations.
     *
     * @param bool $rejectPendingReservations Whether to reject pending reservations
     * @return $this Fluent Builder
     */
    public function setRejectPendingReservations($rejectPendingReservations) {
        $this->options['rejectPendingReservations'] = $rejectPendingReservations;
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
        return '[Twilio.Taskrouter.V1.UpdateWorkerOptions ' . implode(' ', $options) . ']';
    }
}