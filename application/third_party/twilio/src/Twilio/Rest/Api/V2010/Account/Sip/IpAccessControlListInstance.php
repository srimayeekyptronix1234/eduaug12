<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Sip;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $accountSid
 * @property string $friendlyName
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property array $subresourceUris
 * @property string $uri
 */
class IpAccessControlListInstance extends InstanceResource {
    protected $_ipAddresses = null;

    /**
     * Initialize the IpAccessControlListInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @param string $sid A string that identifies the resource to fetch
     * @return \Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlListInstance
     */
    public function __construct(Version $version, array $payload, $accountSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'subresourceUris' => Values::array_get($payload, 'subresource_uris'),
            'uri' => Values::array_get($payload, 'uri'),
        );

        $this->solution = array('accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlListContext Context for this IpAccessControlListInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new IpAccessControlListContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a IpAccessControlListInstance
     *
     * @return IpAccessControlListInstance Fetched IpAccessControlListInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the IpAccessControlListInstance
     *
     * @param string $friendlyName A human readable description of this resource
     * @return IpAccessControlListInstance Updated IpAccessControlListInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($friendlyName) {
        return $this->proxy()->update($friendlyName);
    }

    /**
     * Deletes the IpAccessControlListInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Access the ipAddresses
     *
     * @return \Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList\IpAddressList
     */
    protected function getIpAddresses() {
        return $this->proxy()->ipAddresses;
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
        return '[Twilio.Api.V2010.IpAccessControlListInstance ' . implode(' ', $context) . ']';
    }
}