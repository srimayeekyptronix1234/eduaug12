<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\LocalList;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MachineToMachineList;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MobileList;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\NationalList;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\SharedCostList;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\TollFreeList;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\VoipList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\LocalList $local
 * @property \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\TollFreeList $tollFree
 * @property \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MobileList $mobile
 * @property \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\NationalList $national
 * @property \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\VoipList $voip
 * @property \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\SharedCostList $sharedCost
 * @property \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MachineToMachineList $machineToMachine
 */
class AvailablePhoneNumberCountryContext extends InstanceContext {
    protected $_local = null;
    protected $_tollFree = null;
    protected $_mobile = null;
    protected $_national = null;
    protected $_voip = null;
    protected $_sharedCost = null;
    protected $_machineToMachine = null;

    /**
     * Initialize the AvailablePhoneNumberCountryContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account requesting the available
     *                           phone number Country resource
     * @param string $countryCode The ISO country code of the country to fetch
     *                            available phone number information about
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountryContext
     */
    public function __construct(Version $version, $accountSid, $countryCode) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'countryCode' => $countryCode, );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/AvailablePhoneNumbers/' . rawurlencode($countryCode) . '.json';
    }

    /**
     * Fetch a AvailablePhoneNumberCountryInstance
     *
     * @return AvailablePhoneNumberCountryInstance Fetched
     *                                             AvailablePhoneNumberCountryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new AvailablePhoneNumberCountryInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['countryCode']
        );
    }

    /**
     * Access the local
     *
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\LocalList
     */
    protected function getLocal() {
        if (!$this->_local) {
            $this->_local = new LocalList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['countryCode']
            );
        }

        return $this->_local;
    }

    /**
     * Access the tollFree
     *
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\TollFreeList
     */
    protected function getTollFree() {
        if (!$this->_tollFree) {
            $this->_tollFree = new TollFreeList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['countryCode']
            );
        }

        return $this->_tollFree;
    }

    /**
     * Access the mobile
     *
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MobileList
     */
    protected function getMobile() {
        if (!$this->_mobile) {
            $this->_mobile = new MobileList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['countryCode']
            );
        }

        return $this->_mobile;
    }

    /**
     * Access the national
     *
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\NationalList
     */
    protected function getNational() {
        if (!$this->_national) {
            $this->_national = new NationalList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['countryCode']
            );
        }

        return $this->_national;
    }

    /**
     * Access the voip
     *
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\VoipList
     */
    protected function getVoip() {
        if (!$this->_voip) {
            $this->_voip = new VoipList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['countryCode']
            );
        }

        return $this->_voip;
    }

    /**
     * Access the sharedCost
     *
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\SharedCostList
     */
    protected function getSharedCost() {
        if (!$this->_sharedCost) {
            $this->_sharedCost = new SharedCostList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['countryCode']
            );
        }

        return $this->_sharedCost;
    }

    /**
     * Access the machineToMachine
     *
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MachineToMachineList
     */
    protected function getMachineToMachine() {
        if (!$this->_machineToMachine) {
            $this->_machineToMachine = new MachineToMachineList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['countryCode']
            );
        }

        return $this->_machineToMachine;
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
        return '[Twilio.Api.V2010.AvailablePhoneNumberCountryContext ' . implode(' ', $context) . ']';
    }
}