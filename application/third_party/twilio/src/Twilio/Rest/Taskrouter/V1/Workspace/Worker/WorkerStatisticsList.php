<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\ListResource;
use Twilio\Version;

class WorkerStatisticsList extends ListResource {
    /**
     * Construct the WorkerStatisticsList
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace that contains the
     *                             WorkerChannel
     * @param string $workerSid The SID of the Worker that contains the
     *                          WorkerChannel
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerStatisticsList
     */
    public function __construct(Version $version, $workspaceSid, $workerSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, 'workerSid' => $workerSid, );
    }

    /**
     * Constructs a WorkerStatisticsContext
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerStatisticsContext
     */
    public function getContext() {
        return new WorkerStatisticsContext(
            $this->version,
            $this->solution['workspaceSid'],
            $this->solution['workerSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Taskrouter.V1.WorkerStatisticsList]';
    }
}