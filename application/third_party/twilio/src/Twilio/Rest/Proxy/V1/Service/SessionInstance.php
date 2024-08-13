<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Proxy\V1\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $serviceSid
 * @property string $accountSid
 * @property \DateTime $dateStarted
 * @property \DateTime $dateEnded
 * @property \DateTime $dateLastInteraction
 * @property \DateTime $dateExpiry
 * @property string $uniqueName
 * @property string $status
 * @property string $closedReason
 * @property int $ttl
 * @property string $mode
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 */
class SessionInstance extends InstanceResource {
    protected $_interactions = null;
    protected $_participants = null;

    /**
     * Initialize the SessionInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the resource's parent Service
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Proxy\V1\Service\SessionInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'dateStarted' => Deserialize::dateTime(Values::array_get($payload, 'date_started')),
            'dateEnded' => Deserialize::dateTime(Values::array_get($payload, 'date_ended')),
            'dateLastInteraction' => Deserialize::dateTime(Values::array_get($payload, 'date_last_interaction')),
            'dateExpiry' => Deserialize::dateTime(Values::array_get($payload, 'date_expiry')),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'status' => Values::array_get($payload, 'status'),
            'closedReason' => Values::array_get($payload, 'closed_reason'),
            'ttl' => Values::array_get($payload, 'ttl'),
            'mode' => Values::array_get($payload, 'mode'),
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
     * @return \Twilio\Rest\Proxy\V1\Service\SessionContext Context for this
     *                                                      SessionInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new SessionContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a SessionInstance
     *
     * @return SessionInstance Fetched SessionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the SessionInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the SessionInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SessionInstance Updated SessionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Access the interactions
     *
     * @return \Twilio\Rest\Proxy\V1\Service\Session\InteractionList
     */
    protected function getInteractions() {
        return $this->proxy()->interactions;
    }

    /**
     * Access the participants
     *
     * @return \Twilio\Rest\Proxy\V1\Service\Session\ParticipantList
     */
    protected function getParticipants() {
        return $this->proxy()->participants;
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
        return '[Twilio.Proxy.V1.SessionInstance ' . implode(' ', $context) . ']';
    }
}