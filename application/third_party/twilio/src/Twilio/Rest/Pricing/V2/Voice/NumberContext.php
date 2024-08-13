<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Pricing\V2\Voice;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class NumberContext extends InstanceContext {
    /**
     * Initialize the NumberContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $destinationNumber The destination number for which to fetch
     *                                  pricing information
     * @return \Twilio\Rest\Pricing\V2\Voice\NumberContext
     */
    public function __construct(Version $version, $destinationNumber) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('destinationNumber' => $destinationNumber, );

        $this->uri = '/Voice/Numbers/' . rawurlencode($destinationNumber) . '';
    }

    /**
     * Fetch a NumberInstance
     *
     * @param array|Options $options Optional Arguments
     * @return NumberInstance Fetched NumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array()) {
        $options = new Values($options);

        $params = Values::of(array('OriginationNumber' => $options['originationNumber'], ));

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new NumberInstance($this->version, $payload, $this->solution['destinationNumber']);
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
        return '[Twilio.Pricing.V2.NumberContext ' . implode(' ', $context) . ']';
    }
}