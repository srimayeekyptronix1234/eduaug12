<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Autopilot\V1\Assistant\Task;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class TaskActionsList extends ListResource {
    /**
     * Construct the TaskActionsList
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The SID of the Assistant that is the parent of
     *                             the Task associated with the resource
     * @param string $taskSid The SID of the Task associated with the resource
     * @return \Twilio\Rest\Autopilot\V1\Assistant\Task\TaskActionsList
     */
    public function __construct(Version $version, $assistantSid, $taskSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid, 'taskSid' => $taskSid, );
    }

    /**
     * Constructs a TaskActionsContext
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\Task\TaskActionsContext
     */
    public function getContext() {
        return new TaskActionsContext(
            $this->version,
            $this->solution['assistantSid'],
            $this->solution['taskSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Autopilot.V1.TaskActionsList]';
    }
}