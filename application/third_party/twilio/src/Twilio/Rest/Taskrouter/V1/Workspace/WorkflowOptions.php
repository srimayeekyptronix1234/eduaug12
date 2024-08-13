<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Options;
use Twilio\Values;

abstract class WorkflowOptions {
    /**
     * @param string $friendlyName descriptive string that you create to describe
     *                             the Workflow resource
     * @param string $assignmentCallbackUrl The URL from your application that will
     *                                      process task assignment events
     * @param string $fallbackAssignmentCallbackUrl The URL that we should call
     *                                              when a call to the
     *                                              `assignment_callback_url` fails
     * @param string $configuration A JSON string that contains the rules to apply
     *                              to the Workflow
     * @param int $taskReservationTimeout How long TaskRouter will wait for a
     *                                    confirmation response from your
     *                                    application after it assigns a Task to a
     *                                    Worker
     * @return UpdateWorkflowOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $assignmentCallbackUrl = Values::NONE, $fallbackAssignmentCallbackUrl = Values::NONE, $configuration = Values::NONE, $taskReservationTimeout = Values::NONE) {
        return new UpdateWorkflowOptions($friendlyName, $assignmentCallbackUrl, $fallbackAssignmentCallbackUrl, $configuration, $taskReservationTimeout);
    }

    /**
     * @param string $friendlyName The friendly_name of the Workflow resources to
     *                             read
     * @return ReadWorkflowOptions Options builder
     */
    public static function read($friendlyName = Values::NONE) {
        return new ReadWorkflowOptions($friendlyName);
    }

    /**
     * @param string $assignmentCallbackUrl The URL from your application that will
     *                                      process task assignment events
     * @param string $fallbackAssignmentCallbackUrl The URL that we should call
     *                                              when a call to the
     *                                              `assignment_callback_url` fails
     * @param int $taskReservationTimeout How long TaskRouter will wait for a
     *                                    confirmation response from your
     *                                    application after it assigns a Task to a
     *                                    Worker
     * @return CreateWorkflowOptions Options builder
     */
    public static function create($assignmentCallbackUrl = Values::NONE, $fallbackAssignmentCallbackUrl = Values::NONE, $taskReservationTimeout = Values::NONE) {
        return new CreateWorkflowOptions($assignmentCallbackUrl, $fallbackAssignmentCallbackUrl, $taskReservationTimeout);
    }
}

class UpdateWorkflowOptions extends Options {
    /**
     * @param string $friendlyName descriptive string that you create to describe
     *                             the Workflow resource
     * @param string $assignmentCallbackUrl The URL from your application that will
     *                                      process task assignment events
     * @param string $fallbackAssignmentCallbackUrl The URL that we should call
     *                                              when a call to the
     *                                              `assignment_callback_url` fails
     * @param string $configuration A JSON string that contains the rules to apply
     *                              to the Workflow
     * @param int $taskReservationTimeout How long TaskRouter will wait for a
     *                                    confirmation response from your
     *                                    application after it assigns a Task to a
     *                                    Worker
     */
    public function __construct($friendlyName = Values::NONE, $assignmentCallbackUrl = Values::NONE, $fallbackAssignmentCallbackUrl = Values::NONE, $configuration = Values::NONE, $taskReservationTimeout = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['assignmentCallbackUrl'] = $assignmentCallbackUrl;
        $this->options['fallbackAssignmentCallbackUrl'] = $fallbackAssignmentCallbackUrl;
        $this->options['configuration'] = $configuration;
        $this->options['taskReservationTimeout'] = $taskReservationTimeout;
    }

    /**
     * A descriptive string that you create to describe the Workflow resource. For example, `Inbound Call Workflow` or `2014 Outbound Campaign`.
     *
     * @param string $friendlyName descriptive string that you create to describe
     *                             the Workflow resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The URL from your application that will process task assignment events. See [Handling Task Assignment Callback](https://www.twilio.com/docs/taskrouter/handle-assignment-callbacks) for more details.
     *
     * @param string $assignmentCallbackUrl The URL from your application that will
     *                                      process task assignment events
     * @return $this Fluent Builder
     */
    public function setAssignmentCallbackUrl($assignmentCallbackUrl) {
        $this->options['assignmentCallbackUrl'] = $assignmentCallbackUrl;
        return $this;
    }

    /**
     * The URL that we should call when a call to the `assignment_callback_url` fails.
     *
     * @param string $fallbackAssignmentCallbackUrl The URL that we should call
     *                                              when a call to the
     *                                              `assignment_callback_url` fails
     * @return $this Fluent Builder
     */
    public function setFallbackAssignmentCallbackUrl($fallbackAssignmentCallbackUrl) {
        $this->options['fallbackAssignmentCallbackUrl'] = $fallbackAssignmentCallbackUrl;
        return $this;
    }

    /**
     * A JSON string that contains the rules to apply to the Workflow. See [Configuring Workflows](https://www.twilio.com/docs/taskrouter/workflow-configuration) for more information.
     *
     * @param string $configuration A JSON string that contains the rules to apply
     *                              to the Workflow
     * @return $this Fluent Builder
     */
    public function setConfiguration($configuration) {
        $this->options['configuration'] = $configuration;
        return $this;
    }

    /**
     * How long TaskRouter will wait for a confirmation response from your application after it assigns a Task to a Worker. Can be up to `86,400` (24 hours) and the default is `120`.
     *
     * @param int $taskReservationTimeout How long TaskRouter will wait for a
     *                                    confirmation response from your
     *                                    application after it assigns a Task to a
     *                                    Worker
     * @return $this Fluent Builder
     */
    public function setTaskReservationTimeout($taskReservationTimeout) {
        $this->options['taskReservationTimeout'] = $taskReservationTimeout;
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
        return '[Twilio.Taskrouter.V1.UpdateWorkflowOptions ' . implode(' ', $options) . ']';
    }
}

class ReadWorkflowOptions extends Options {
    /**
     * @param string $friendlyName The friendly_name of the Workflow resources to
     *                             read
     */
    public function __construct($friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The `friendly_name` of the Workflow resources to read.
     *
     * @param string $friendlyName The friendly_name of the Workflow resources to
     *                             read
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Taskrouter.V1.ReadWorkflowOptions ' . implode(' ', $options) . ']';
    }
}

class CreateWorkflowOptions extends Options {
    /**
     * @param string $assignmentCallbackUrl The URL from your application that will
     *                                      process task assignment events
     * @param string $fallbackAssignmentCallbackUrl The URL that we should call
     *                                              when a call to the
     *                                              `assignment_callback_url` fails
     * @param int $taskReservationTimeout How long TaskRouter will wait for a
     *                                    confirmation response from your
     *                                    application after it assigns a Task to a
     *                                    Worker
     */
    public function __construct($assignmentCallbackUrl = Values::NONE, $fallbackAssignmentCallbackUrl = Values::NONE, $taskReservationTimeout = Values::NONE) {
        $this->options['assignmentCallbackUrl'] = $assignmentCallbackUrl;
        $this->options['fallbackAssignmentCallbackUrl'] = $fallbackAssignmentCallbackUrl;
        $this->options['taskReservationTimeout'] = $taskReservationTimeout;
    }

    /**
     * The URL from your application that will process task assignment events. See [Handling Task Assignment Callback](https://www.twilio.com/docs/taskrouter/handle-assignment-callbacks) for more details.
     *
     * @param string $assignmentCallbackUrl The URL from your application that will
     *                                      process task assignment events
     * @return $this Fluent Builder
     */
    public function setAssignmentCallbackUrl($assignmentCallbackUrl) {
        $this->options['assignmentCallbackUrl'] = $assignmentCallbackUrl;
        return $this;
    }

    /**
     * The URL that we should call when a call to the `assignment_callback_url` fails.
     *
     * @param string $fallbackAssignmentCallbackUrl The URL that we should call
     *                                              when a call to the
     *                                              `assignment_callback_url` fails
     * @return $this Fluent Builder
     */
    public function setFallbackAssignmentCallbackUrl($fallbackAssignmentCallbackUrl) {
        $this->options['fallbackAssignmentCallbackUrl'] = $fallbackAssignmentCallbackUrl;
        return $this;
    }

    /**
     * How long TaskRouter will wait for a confirmation response from your application after it assigns a Task to a Worker. Can be up to `86,400` (24 hours) and the default is `120`.
     *
     * @param int $taskReservationTimeout How long TaskRouter will wait for a
     *                                    confirmation response from your
     *                                    application after it assigns a Task to a
     *                                    Worker
     * @return $this Fluent Builder
     */
    public function setTaskReservationTimeout($taskReservationTimeout) {
        $this->options['taskReservationTimeout'] = $taskReservationTimeout;
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
        return '[Twilio.Taskrouter.V1.CreateWorkflowOptions ' . implode(' ', $options) . ']';
    }
}