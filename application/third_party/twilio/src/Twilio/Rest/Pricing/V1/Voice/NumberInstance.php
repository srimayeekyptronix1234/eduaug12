<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Pricing\V1\Voice;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $number
 * @property string $country
 * @property string $isoCountry
 * @property string $outboundCallPrice
 * @property string $inboundCallPrice
 * @property string $priceUnit
 * @property string $url
 */
class NumberInstance extends InstanceResource {
    /**
     * Initialize the NumberInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $number The phone number to fetch
     * @return \Twilio\Rest\Pricing\V1\Voice\NumberInstance
     */
    public function __construct(Version $version, array $payload, $number = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'number' => Values::array_get($payload, 'number'),
            'country' => Values::array_get($payload, 'country'),
            'isoCountry' => Values::array_get($payload, 'iso_country'),
            'outboundCallPrice' => Values::array_get($payload, 'outbound_call_price'),
            'inboundCallPrice' => Values::array_get($payload, 'inbound_call_price'),
            'priceUnit' => Values::array_get($payload, 'price_unit'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('number' => $number ?: $this->properties['number'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Pricing\V1\Voice\NumberContext Context for this
     *                                                     NumberInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new NumberContext($this->version, $this->solution['number']);
        }

        return $this->context;
    }

    /**
     * Fetch a NumberInstance
     *
     * @return NumberInstance Fetched NumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
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
        return '[Twilio.Pricing.V1.NumberInstance ' . implode(' ', $context) . ']';
    }
}