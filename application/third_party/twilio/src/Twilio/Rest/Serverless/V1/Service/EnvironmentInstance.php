<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $buildSid
 * @property string $uniqueName
 * @property string $domainSuffix
 * @property string $domainName
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 */
class EnvironmentInstance extends InstanceResource {
    protected $_variables = null;
    protected $_deployments = null;
    protected $_logs = null;

    /**
     * Initialize the EnvironmentInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the Environment
     *                           resource is associated with
     * @param string $sid The SID of the Environment resource to fetch
     * @return \Twilio\Rest\Serverless\V1\Service\EnvironmentInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'buildSid' => Values::array_get($payload, 'build_sid'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'domainSuffix' => Values::array_get($payload, 'domain_suffix'),
            'domainName' => Values::array_get($payload, 'domain_name'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Serverless\V1\Service\EnvironmentContext Context for
     *                                                               this
     *                                                               EnvironmentInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new EnvironmentContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a EnvironmentInstance
     *
     * @return EnvironmentInstance Fetched EnvironmentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the EnvironmentInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Access the variables
     *
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\VariableList
     */
    protected function getVariables() {
        return $this->proxy()->variables;
    }

    /**
     * Access the deployments
     *
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\DeploymentList
     */
    protected function getDeployments() {
        return $this->proxy()->deployments;
    }

    /**
     * Access the logs
     *
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\LogList
     */
    protected function getLogs() {
        return $this->proxy()->logs;
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
        return '[Twilio.Serverless.V1.EnvironmentInstance ' . implode(' ', $context) . ']';
    }
}