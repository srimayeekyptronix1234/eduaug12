<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Serverless\V1\Service\Environment\DeploymentList;
use Twilio\Rest\Serverless\V1\Service\Environment\LogList;
use Twilio\Rest\Serverless\V1\Service\Environment\VariableList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Serverless\V1\Service\Environment\VariableList $variables
 * @property \Twilio\Rest\Serverless\V1\Service\Environment\DeploymentList $deployments
 * @property \Twilio\Rest\Serverless\V1\Service\Environment\LogList $logs
 * @method \Twilio\Rest\Serverless\V1\Service\Environment\VariableContext variables(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\Environment\DeploymentContext deployments(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\Environment\LogContext logs(string $sid)
 */
class EnvironmentContext extends InstanceContext {
    protected $_variables = null;
    protected $_deployments = null;
    protected $_logs = null;

    /**
     * Initialize the EnvironmentContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service to fetch the Environment
     *                           resource from
     * @param string $sid The SID of the Environment resource to fetch
     * @return \Twilio\Rest\Serverless\V1\Service\EnvironmentContext
     */
    public function __construct(Version $version, $serviceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Environments/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a EnvironmentInstance
     *
     * @return EnvironmentInstance Fetched EnvironmentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new EnvironmentInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the EnvironmentInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the variables
     *
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\VariableList
     */
    protected function getVariables() {
        if (!$this->_variables) {
            $this->_variables = new VariableList(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->_variables;
    }

    /**
     * Access the deployments
     *
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\DeploymentList
     */
    protected function getDeployments() {
        if (!$this->_deployments) {
            $this->_deployments = new DeploymentList(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->_deployments;
    }

    /**
     * Access the logs
     *
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\LogList
     */
    protected function getLogs() {
        if (!$this->_logs) {
            $this->_logs = new LogList($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }

        return $this->_logs;
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
        return '[Twilio.Serverless.V1.EnvironmentContext ' . implode(' ', $context) . ']';
    }
}