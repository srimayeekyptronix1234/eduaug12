<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1\Service\Asset;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AssetVersionContext extends InstanceContext {
    /**
     * Initialize the AssetVersionContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service to fetch the AssetVersion
     *                           resource from
     * @param string $assetSid The SID of the Asset resource that is the parent of
     *                         the AssetVersion resource to fetch
     * @param string $sid The SID that identifies the AssetVersion resource to fetch
     * @return \Twilio\Rest\Serverless\V1\Service\Asset\AssetVersionContext
     */
    public function __construct(Version $version, $serviceSid, $assetSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'assetSid' => $assetSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Assets/' . rawurlencode($assetSid) . '/Versions/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a AssetVersionInstance
     *
     * @return AssetVersionInstance Fetched AssetVersionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new AssetVersionInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['assetSid'],
            $this->solution['sid']
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
        return '[Twilio.Serverless.V1.AssetVersionContext ' . implode(' ', $context) . ']';
    }
}