<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Trunking\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $domainName
 * @property string $disasterRecoveryMethod
 * @property string $disasterRecoveryUrl
 * @property string $friendlyName
 * @property bool $secure
 * @property array $recording
 * @property bool $cnamLookupEnabled
 * @property string $authType
 * @property string $authTypeSet
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $sid
 * @property string $url
 * @property array $links
 */
class TrunkInstance extends InstanceResource {
    protected $_originationUrls = null;
    protected $_credentialsLists = null;
    protected $_ipAccessControlLists = null;
    protected $_phoneNumbers = null;
    protected $_terminatingSipDomains = null;

    /**
     * Initialize the TrunkInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Trunking\V1\TrunkInstance
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'domainName' => Values::array_get($payload, 'domain_name'),
            'disasterRecoveryMethod' => Values::array_get($payload, 'disaster_recovery_method'),
            'disasterRecoveryUrl' => Values::array_get($payload, 'disaster_recovery_url'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'secure' => Values::array_get($payload, 'secure'),
            'recording' => Values::array_get($payload, 'recording'),
            'cnamLookupEnabled' => Values::array_get($payload, 'cnam_lookup_enabled'),
            'authType' => Values::array_get($payload, 'auth_type'),
            'authTypeSet' => Values::array_get($payload, 'auth_type_set'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'sid' => Values::array_get($payload, 'sid'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Trunking\V1\TrunkContext Context for this TrunkInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new TrunkContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a TrunkInstance
     *
     * @return TrunkInstance Fetched TrunkInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the TrunkInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the TrunkInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TrunkInstance Updated TrunkInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Access the originationUrls
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlList
     */
    protected function getOriginationUrls() {
        return $this->proxy()->originationUrls;
    }

    /**
     * Access the credentialsLists
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\CredentialListList
     */
    protected function getCredentialsLists() {
        return $this->proxy()->credentialsLists;
    }

    /**
     * Access the ipAccessControlLists
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\IpAccessControlListList
     */
    protected function getIpAccessControlLists() {
        return $this->proxy()->ipAccessControlLists;
    }

    /**
     * Access the phoneNumbers
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\PhoneNumberList
     */
    protected function getPhoneNumbers() {
        return $this->proxy()->phoneNumbers;
    }

    /**
     * Access the terminatingSipDomains
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\TerminatingSipDomainList
     */
    protected function getTerminatingSipDomains() {
        return $this->proxy()->terminatingSipDomains;
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
        return '[Twilio.Trunking.V1.TrunkInstance ' . implode(' ', $context) . ']';
    }
}