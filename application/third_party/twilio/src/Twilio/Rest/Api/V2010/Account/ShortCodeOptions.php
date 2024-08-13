<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class ShortCodeOptions {
    /**
     * @param string $friendlyName A string to describe this resource
     * @param string $apiVersion The API version to use to start a new TwiML session
     * @param string $smsUrl URL Twilio will request when receiving an SMS
     * @param string $smsMethod HTTP method to use when requesting the sms url
     * @param string $smsFallbackUrl URL Twilio will request if an error occurs in
     *                               executing TwiML
     * @param string $smsFallbackMethod HTTP method Twilio will use with
     *                                  sms_fallback_url
     * @return UpdateShortCodeOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $apiVersion = Values::NONE, $smsUrl = Values::NONE, $smsMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE) {
        return new UpdateShortCodeOptions($friendlyName, $apiVersion, $smsUrl, $smsMethod, $smsFallbackUrl, $smsFallbackMethod);
    }

    /**
     * @param string $friendlyName The string that identifies the ShortCode
     *                             resources to read
     * @param string $shortCode Filter by ShortCode
     * @return ReadShortCodeOptions Options builder
     */
    public static function read($friendlyName = Values::NONE, $shortCode = Values::NONE) {
        return new ReadShortCodeOptions($friendlyName, $shortCode);
    }
}

class UpdateShortCodeOptions extends Options {
    /**
     * @param string $friendlyName A string to describe this resource
     * @param string $apiVersion The API version to use to start a new TwiML session
     * @param string $smsUrl URL Twilio will request when receiving an SMS
     * @param string $smsMethod HTTP method to use when requesting the sms url
     * @param string $smsFallbackUrl URL Twilio will request if an error occurs in
     *                               executing TwiML
     * @param string $smsFallbackMethod HTTP method Twilio will use with
     *                                  sms_fallback_url
     */
    public function __construct($friendlyName = Values::NONE, $apiVersion = Values::NONE, $smsUrl = Values::NONE, $smsMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['apiVersion'] = $apiVersion;
        $this->options['smsUrl'] = $smsUrl;
        $this->options['smsMethod'] = $smsMethod;
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
    }

    /**
     * A descriptive string that you created to describe this resource. It can be up to 64 characters long. By default, the `FriendlyName` is the short code.
     *
     * @param string $friendlyName A string to describe this resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The API version to use to start a new TwiML session. Can be: `2010-04-01` or `2008-08-01`.
     *
     * @param string $apiVersion The API version to use to start a new TwiML session
     * @return $this Fluent Builder
     */
    public function setApiVersion($apiVersion) {
        $this->options['apiVersion'] = $apiVersion;
        return $this;
    }

    /**
     * The URL we should call when receiving an incoming SMS message to this short code.
     *
     * @param string $smsUrl URL Twilio will request when receiving an SMS
     * @return $this Fluent Builder
     */
    public function setSmsUrl($smsUrl) {
        $this->options['smsUrl'] = $smsUrl;
        return $this;
    }

    /**
     * The HTTP method we should use when calling the `sms_url`. Can be: `GET` or `POST`.
     *
     * @param string $smsMethod HTTP method to use when requesting the sms url
     * @return $this Fluent Builder
     */
    public function setSmsMethod($smsMethod) {
        $this->options['smsMethod'] = $smsMethod;
        return $this;
    }

    /**
     * The URL that we should call if an error occurs while retrieving or executing the TwiML from `sms_url`.
     *
     * @param string $smsFallbackUrl URL Twilio will request if an error occurs in
     *                               executing TwiML
     * @return $this Fluent Builder
     */
    public function setSmsFallbackUrl($smsFallbackUrl) {
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method that we should use to call the `sms_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $smsFallbackMethod HTTP method Twilio will use with
     *                                  sms_fallback_url
     * @return $this Fluent Builder
     */
    public function setSmsFallbackMethod($smsFallbackMethod) {
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.UpdateShortCodeOptions ' . implode(' ', $options) . ']';
    }
}

class ReadShortCodeOptions extends Options {
    /**
     * @param string $friendlyName The string that identifies the ShortCode
     *                             resources to read
     * @param string $shortCode Filter by ShortCode
     */
    public function __construct($friendlyName = Values::NONE, $shortCode = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['shortCode'] = $shortCode;
    }

    /**
     * The string that identifies the ShortCode resources to read.
     *
     * @param string $friendlyName The string that identifies the ShortCode
     *                             resources to read
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Only show the ShortCode resources that match this pattern. You can specify partial numbers and use '*' as a wildcard for any digit.
     *
     * @param string $shortCode Filter by ShortCode
     * @return $this Fluent Builder
     */
    public function setShortCode($shortCode) {
        $this->options['shortCode'] = $shortCode;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.ReadShortCodeOptions ' . implode(' ', $options) . ']';
    }
}