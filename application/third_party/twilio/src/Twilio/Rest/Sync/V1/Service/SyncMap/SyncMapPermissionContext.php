<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Sync\V1\Service\SyncMap;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class SyncMapPermissionContext extends InstanceContext {
    /**
     * Initialize the SyncMapPermissionContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Sync Service with the Sync Map
     *                           Permission resource to fetch
     * @param string $mapSid The SID of the Sync Map with the Sync Map Permission
     *                       resource to fetch
     * @param string $identity The application-defined string that uniquely
     *                         identifies the User's Sync Map Permission resource
     *                         to fetch
     * @return \Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapPermissionContext
     */
    public function __construct(Version $version, $serviceSid, $mapSid, $identity) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'mapSid' => $mapSid, 'identity' => $identity, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Maps/' . rawurlencode($mapSid) . '/Permissions/' . rawurlencode($identity) . '';
    }

    /**
     * Fetch a SyncMapPermissionInstance
     *
     * @return SyncMapPermissionInstance Fetched SyncMapPermissionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new SyncMapPermissionInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['mapSid'],
            $this->solution['identity']
        );
    }

    /**
     * Deletes the SyncMapPermissionInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the SyncMapPermissionInstance
     *
     * @param bool $read Read access
     * @param bool $write Write access
     * @param bool $manage Manage access
     * @return SyncMapPermissionInstance Updated SyncMapPermissionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($read, $write, $manage) {
        $data = Values::of(array(
            'Read' => Serialize::booleanToString($read),
            'Write' => Serialize::booleanToString($write),
            'Manage' => Serialize::booleanToString($manage),
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new SyncMapPermissionInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['mapSid'],
            $this->solution['identity']
        );
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
        return '[Twilio.Sync.V1.SyncMapPermissionContext ' . implode(' ', $context) . ']';
    }
}