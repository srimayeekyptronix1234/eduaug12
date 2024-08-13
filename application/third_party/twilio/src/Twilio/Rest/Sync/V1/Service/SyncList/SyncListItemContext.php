<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Sync\V1\Service\SyncList;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class SyncListItemContext extends InstanceContext {
    /**
     * Initialize the SyncListItemContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Sync Service with the Sync List
     *                           Item resource to fetch
     * @param string $listSid The SID of the Sync List with the Sync List Item
     *                        resource to fetch
     * @param int $index The index of the Sync List Item resource to fetch
     * @return \Twilio\Rest\Sync\V1\Service\SyncList\SyncListItemContext
     */
    public function __construct(Version $version, $serviceSid, $listSid, $index) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'listSid' => $listSid, 'index' => $index, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Lists/' . rawurlencode($listSid) . '/Items/' . rawurlencode($index) . '';
    }

    /**
     * Fetch a SyncListItemInstance
     *
     * @return SyncListItemInstance Fetched SyncListItemInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new SyncListItemInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['listSid'],
            $this->solution['index']
        );
    }

    /**
     * Deletes the SyncListItemInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the SyncListItemInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SyncListItemInstance Updated SyncListItemInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'Data' => Serialize::jsonObject($options['data']),
            'Ttl' => $options['ttl'],
            'ItemTtl' => $options['itemTtl'],
            'CollectionTtl' => $options['collectionTtl'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new SyncListItemInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['listSid'],
            $this->solution['index']
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
        return '[Twilio.Sync.V1.SyncListItemContext ' . implode(' ', $context) . ']';
    }
}