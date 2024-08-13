<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\TrustedComms;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $accountSid
 * @property string $bgColor
 * @property string $brandSid
 * @property string $brandedChannelSid
 * @property string $businessSid
 * @property string $callSid
 * @property string $caller
 * @property \DateTime $createdAt
 * @property string $fontColor
 * @property string $from
 * @property string $logo
 * @property string $phoneNumberSid
 * @property string $reason
 * @property string $sid
 * @property string $status
 * @property string $to
 * @property string $url
 * @property string $useCase
 */
class BrandedCallInstance extends InstanceResource {
    /**
     * Initialize the BrandedCallInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @return \Twilio\Rest\Preview\TrustedComms\BrandedCallInstance
     */
    public function __construct(Version $version, array $payload) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'bgColor' => Values::array_get($payload, 'bg_color'),
            'brandSid' => Values::array_get($payload, 'brand_sid'),
            'brandedChannelSid' => Values::array_get($payload, 'branded_channel_sid'),
            'businessSid' => Values::array_get($payload, 'business_sid'),
            'callSid' => Values::array_get($payload, 'call_sid'),
            'caller' => Values::array_get($payload, 'caller'),
            'createdAt' => Deserialize::dateTime(Values::array_get($payload, 'created_at')),
            'fontColor' => Values::array_get($payload, 'font_color'),
            'from' => Values::array_get($payload, 'from'),
            'logo' => Values::array_get($payload, 'logo'),
            'phoneNumberSid' => Values::array_get($payload, 'phone_number_sid'),
            'reason' => Values::array_get($payload, 'reason'),
            'sid' => Values::array_get($payload, 'sid'),
            'status' => Values::array_get($payload, 'status'),
            'to' => Values::array_get($payload, 'to'),
            'url' => Values::array_get($payload, 'url'),
            'useCase' => Values::array_get($payload, 'use_case'),
        );

        $this->solution = array();
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
        return '[Twilio.Preview.TrustedComms.BrandedCallInstance]';
    }
}