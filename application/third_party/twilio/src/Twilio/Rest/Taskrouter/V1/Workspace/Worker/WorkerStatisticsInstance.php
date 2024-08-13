<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property array $cumulative
 * @property string $workerSid
 * @property string $workspaceSid
 * @property string $url
 */
class WorkerStatisticsInstance extends InstanceResource {
    /**
     * Initialize the WorkerStatisticsInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace that contains the
     *                             WorkerChannel
     * @param string $workerSid The SID of the Worker that contains the
     *                          WorkerChannel
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerStatisticsInstance
     */
    public function __construct(Version $version, array $payload, $workspaceSid, $workerSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'cumulative' => Values::array_get($payload, 'cumulative'),
            'workerSid' => Values::array_get($payload, 'worker_sid'),
            'workspaceSid' => Values::array_get($payload, 'workspace_sid'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('workspaceSid' => $workspaceSid, 'workerSid' => $workerSid, );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerStatisticsContext Context for this WorkerStatisticsInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new WorkerStatisticsContext(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['workerSid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a WorkerStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkerStatisticsInstance Fetched WorkerStatisticsInstance
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
        return '[Twilio.Taskrouter.V1.WorkerStatisticsInstance ' . implode(' ', $context) . ']';
    }
}