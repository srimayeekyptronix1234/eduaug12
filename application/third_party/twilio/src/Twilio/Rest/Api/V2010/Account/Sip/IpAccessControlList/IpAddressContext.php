<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class IpAddressContext extends InstanceContext {
    /**
     * Initialize the IpAddressContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The unique sid that identifies this account
     * @param string $ipAccessControlListSid The IpAccessControlList Sid that
     *                                       identifies the IpAddress resources to
     *                                       fetch
     * @param string $sid A string that identifies the IpAddress resource to fetch
     * @return \Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList\IpAddressContext
     */
    public function __construct(Version $version, $accountSid, $ipAccessControlListSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'ipAccessControlListSid' => $ipAccessControlListSid,
            'sid' => $sid,
        );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/SIP/IpAccessControlLists/' . rawurlencode($ipAccessControlListSid) . '/IpAddresses/' . rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a IpAddressInstance
     *
     * @return IpAddressInstance Fetched IpAddressInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new IpAddressInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['ipAccessControlListSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the IpAddressInstance
     *
     * @param array|Options $options Optional Arguments
     * @return IpAddressInstance Updated IpAddressInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'IpAddress' => $options['ipAddress'],
            'FriendlyName' => $options['friendlyName'],
            'CidrPrefixLength' => $options['cidrPrefixLength'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new IpAddressInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['ipAccessControlListSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the IpAddressInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Api.V2010.IpAddressContext ' . implode(' ', $context) . ']';
    }
}