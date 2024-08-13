<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class ApplicationOptions {
    /**
     * @param string $apiVersion The API version to use to start a new TwiML session
     * @param string $voiceUrl The URL to call when the phone number receives a call
     * @param string $voiceMethod The HTTP method to use with the voice_url
     * @param string $voiceFallbackUrl The URL to call when a TwiML error occurs
     * @param string $voiceFallbackMethod The HTTP method to use with
     *                                    voice_fallback_url
     * @param string $statusCallback The URL to send status information to your
     *                               application
     * @param string $statusCallbackMethod The HTTP method to use to call
     *                                     status_callback
     * @param bool $voiceCallerIdLookup Whether to lookup the caller's name
     * @param string $smsUrl The URL to call when the phone number receives an
     *                       incoming SMS message
     * @param string $smsMethod The HTTP method to use with sms_url
     * @param string $smsFallbackUrl The URL to call when an error occurs while
     *                               retrieving or executing the TwiML
     * @param string $smsFallbackMethod The HTTP method to use with sms_fallback_url
     * @param string $smsStatusCallback The URL to send status information to your
     *                                  application
     * @param string $messageStatusCallback The URL to send message status
     *                                      information to your application
     * @param string $friendlyName A string to describe the new resource
     * @return CreateApplicationOptions Options builder
     */
    public static function create($apiVersion = Values::NONE, $voiceUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $voiceCallerIdLookup = Values::NONE, $smsUrl = Values::NONE, $smsMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsStatusCallback = Values::NONE, $messageStatusCallback = Values::NONE, $friendlyName = Values::NONE) {
        return new CreateApplicationOptions($apiVersion, $voiceUrl, $voiceMethod, $voiceFallbackUrl, $voiceFallbackMethod, $statusCallback, $statusCallbackMethod, $voiceCallerIdLookup, $smsUrl, $smsMethod, $smsFallbackUrl, $smsFallbackMethod, $smsStatusCallback, $messageStatusCallback, $friendlyName);
    }

    /**
     * @param string $friendlyName The string that identifies the Application
     *                             resources to read
     * @return ReadApplicationOptions Options builder
     */
    public static function read($friendlyName = Values::NONE) {
        return new ReadApplicationOptions($friendlyName);
    }

    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $apiVersion The API version to use to start a new TwiML session
     * @param string $voiceUrl The URL to call when the phone number receives a call
     * @param string $voiceMethod The HTTP method to use with the voice_url
     * @param string $voiceFallbackUrl The URL to call when a TwiML error occurs
     * @param string $voiceFallbackMethod The HTTP method to use with
     *                                    voice_fallback_url
     * @param string $statusCallback The URL to send status information to your
     *                               application
     * @param string $statusCallbackMethod The HTTP method to use to call
     *                                     status_callback
     * @param bool $voiceCallerIdLookup Whether to lookup the caller's name
     * @param string $smsUrl The URL to call when the phone number receives an
     *                       incoming SMS message
     * @param string $smsMethod The HTTP method to use with sms_url
     * @param string $smsFallbackUrl The URL to call when an error occurs while
     *                               retrieving or executing the TwiML
     * @param string $smsFallbackMethod The HTTP method to use with sms_fallback_url
     * @param string $smsStatusCallback The URL to send status information to your
     *                                  application
     * @param string $messageStatusCallback The URL to send message status
     *                                      information to your application
     * @return UpdateApplicationOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $apiVersion = Values::NONE, $voiceUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $voiceCallerIdLookup = Values::NONE, $smsUrl = Values::NONE, $smsMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsStatusCallback = Values::NONE, $messageStatusCallback = Values::NONE) {
        return new UpdateApplicationOptions($friendlyName, $apiVersion, $voiceUrl, $voiceMethod, $voiceFallbackUrl, $voiceFallbackMethod, $statusCallback, $statusCallbackMethod, $voiceCallerIdLookup, $smsUrl, $smsMethod, $smsFallbackUrl, $smsFallbackMethod, $smsStatusCallback, $messageStatusCallback);
    }
}

class CreateApplicationOptions extends Options {
    /**
     * @param string $apiVersion The API version to use to start a new TwiML session
     * @param string $voiceUrl The URL to call when the phone number receives a call
     * @param string $voiceMethod The HTTP method to use with the voice_url
     * @param string $voiceFallbackUrl The URL to call when a TwiML error occurs
     * @param string $voiceFallbackMethod The HTTP method to use with
     *                                    voice_fallback_url
     * @param string $statusCallback The URL to send status information to your
     *                               application
     * @param string $statusCallbackMethod The HTTP method to use to call
     *                                     status_callback
     * @param bool $voiceCallerIdLookup Whether to lookup the caller's name
     * @param string $smsUrl The URL to call when the phone number receives an
     *                       incoming SMS message
     * @param string $smsMethod The HTTP method to use with sms_url
     * @param string $smsFallbackUrl The URL to call when an error occurs while
     *                               retrieving or executing the TwiML
     * @param string $smsFallbackMethod The HTTP method to use with sms_fallback_url
     * @param string $smsStatusCallback The URL to send status information to your
     *                                  application
     * @param string $messageStatusCallback The URL to send message status
     *                                      information to your application
     * @param string $friendlyName A string to describe the new resource
     */
    public function __construct($apiVersion = Values::NONE, $voiceUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $voiceCallerIdLookup = Values::NONE, $smsUrl = Values::NONE, $smsMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsStatusCallback = Values::NONE, $messageStatusCallback = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['apiVersion'] = $apiVersion;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['voiceCallerIdLookup'] = $voiceCallerIdLookup;
        $this->options['smsUrl'] = $smsUrl;
        $this->options['smsMethod'] = $smsMethod;
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        $this->options['smsStatusCallback'] = $smsStatusCallback;
        $this->options['messageStatusCallback'] = $messageStatusCallback;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The API version to use to start a new TwiML session. Can be: `2010-04-01` or `2008-08-01`. The default value is the account's default API version.
     *
     * @param string $apiVersion The API version to use to start a new TwiML session
     * @return $this Fluent Builder
     */
    public function setApiVersion($apiVersion) {
        $this->options['apiVersion'] = $apiVersion;
        return $this;
    }

    /**
     * The URL we should call when the phone number assigned to this application receives a call.
     *
     * @param string $voiceUrl The URL to call when the phone number receives a call
     * @return $this Fluent Builder
     */
    public function setVoiceUrl($voiceUrl) {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceMethod The HTTP method to use with the voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceMethod($voiceMethod) {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The URL that we should call when an error occurs retrieving or executing the TwiML requested by `url`.
     *
     * @param string $voiceFallbackUrl The URL to call when a TwiML error occurs
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl($voiceFallbackUrl) {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceFallbackMethod The HTTP method to use with
     *                                    voice_fallback_url
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod($voiceFallbackMethod) {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The URL we should call using the `status_callback_method` to send status information to your application.
     *
     * @param string $statusCallback The URL to send status information to your
     *                               application
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The HTTP method we should use to call `status_callback`. Can be: `GET` or `POST`.
     *
     * @param string $statusCallbackMethod The HTTP method to use to call
     *                                     status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * Whether we should look up the caller's caller-ID name from the CNAM database (additional charges apply). Can be: `true` or `false`.
     *
     * @param bool $voiceCallerIdLookup Whether to lookup the caller's name
     * @return $this Fluent Builder
     */
    public function setVoiceCallerIdLookup($voiceCallerIdLookup) {
        $this->options['voiceCallerIdLookup'] = $voiceCallerIdLookup;
        return $this;
    }

    /**
     * The URL we should call when the phone number receives an incoming SMS message.
     *
     * @param string $smsUrl The URL to call when the phone number receives an
     *                       incoming SMS message
     * @return $this Fluent Builder
     */
    public function setSmsUrl($smsUrl) {
        $this->options['smsUrl'] = $smsUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `sms_url`. Can be: `GET` or `POST`.
     *
     * @param string $smsMethod The HTTP method to use with sms_url
     * @return $this Fluent Builder
     */
    public function setSmsMethod($smsMethod) {
        $this->options['smsMethod'] = $smsMethod;
        return $this;
    }

    /**
     * The URL that we should call when an error occurs while retrieving or executing the TwiML from `sms_url`.
     *
     * @param string $smsFallbackUrl The URL to call when an error occurs while
     *                               retrieving or executing the TwiML
     * @return $this Fluent Builder
     */
    public function setSmsFallbackUrl($smsFallbackUrl) {
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `sms_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $smsFallbackMethod The HTTP method to use with sms_fallback_url
     * @return $this Fluent Builder
     */
    public function setSmsFallbackMethod($smsFallbackMethod) {
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        return $this;
    }

    /**
     * The URL we should call using a POST method to send status information about SMS messages sent by the application.
     *
     * @param string $smsStatusCallback The URL to send status information to your
     *                                  application
     * @return $this Fluent Builder
     */
    public function setSmsStatusCallback($smsStatusCallback) {
        $this->options['smsStatusCallback'] = $smsStatusCallback;
        return $this;
    }

    /**
     * The URL we should call using a POST method to send message status information to your application.
     *
     * @param string $messageStatusCallback The URL to send message status
     *                                      information to your application
     * @return $this Fluent Builder
     */
    public function setMessageStatusCallback($messageStatusCallback) {
        $this->options['messageStatusCallback'] = $messageStatusCallback;
        return $this;
    }

    /**
     * A descriptive string that you create to describe the new application. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the new resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Api.V2010.CreateApplicationOptions ' . implode(' ', $options) . ']';
    }
}

class ReadApplicationOptions extends Options {
    /**
     * @param string $friendlyName The string that identifies the Application
     *                             resources to read
     */
    public function __construct($friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The string that identifies the Application resources to read.
     *
     * @param string $friendlyName The string that identifies the Application
     *                             resources to read
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Api.V2010.ReadApplicationOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateApplicationOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $apiVersion The API version to use to start a new TwiML session
     * @param string $voiceUrl The URL to call when the phone number receives a call
     * @param string $voiceMethod The HTTP method to use with the voice_url
     * @param string $voiceFallbackUrl The URL to call when a TwiML error occurs
     * @param string $voiceFallbackMethod The HTTP method to use with
     *                                    voice_fallback_url
     * @param string $statusCallback The URL to send status information to your
     *                               application
     * @param string $statusCallbackMethod The HTTP method to use to call
     *                                     status_callback
     * @param bool $voiceCallerIdLookup Whether to lookup the caller's name
     * @param string $smsUrl The URL to call when the phone number receives an
     *                       incoming SMS message
     * @param string $smsMethod The HTTP method to use with sms_url
     * @param string $smsFallbackUrl The URL to call when an error occurs while
     *                               retrieving or executing the TwiML
     * @param string $smsFallbackMethod The HTTP method to use with sms_fallback_url
     * @param string $smsStatusCallback The URL to send status information to your
     *                                  application
     * @param string $messageStatusCallback The URL to send message status
     *                                      information to your application
     */
    public function __construct($friendlyName = Values::NONE, $apiVersion = Values::NONE, $voiceUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $voiceCallerIdLookup = Values::NONE, $smsUrl = Values::NONE, $smsMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsStatusCallback = Values::NONE, $messageStatusCallback = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['apiVersion'] = $apiVersion;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['voiceCallerIdLookup'] = $voiceCallerIdLookup;
        $this->options['smsUrl'] = $smsUrl;
        $this->options['smsMethod'] = $smsMethod;
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        $this->options['smsStatusCallback'] = $smsStatusCallback;
        $this->options['messageStatusCallback'] = $messageStatusCallback;
    }

    /**
     * A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The API version to use to start a new TwiML session. Can be: `2010-04-01` or `2008-08-01`. The default value is your account's default API version.
     *
     * @param string $apiVersion The API version to use to start a new TwiML session
     * @return $this Fluent Builder
     */
    public function setApiVersion($apiVersion) {
        $this->options['apiVersion'] = $apiVersion;
        return $this;
    }

    /**
     * The URL we should call when the phone number assigned to this application receives a call.
     *
     * @param string $voiceUrl The URL to call when the phone number receives a call
     * @return $this Fluent Builder
     */
    public function setVoiceUrl($voiceUrl) {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceMethod The HTTP method to use with the voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceMethod($voiceMethod) {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The URL that we should call when an error occurs retrieving or executing the TwiML requested by `url`.
     *
     * @param string $voiceFallbackUrl The URL to call when a TwiML error occurs
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl($voiceFallbackUrl) {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceFallbackMethod The HTTP method to use with
     *                                    voice_fallback_url
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod($voiceFallbackMethod) {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The URL we should call using the `status_callback_method` to send status information to your application.
     *
     * @param string $statusCallback The URL to send status information to your
     *                               application
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The HTTP method we should use to call `status_callback`. Can be: `GET` or `POST`.
     *
     * @param string $statusCallbackMethod The HTTP method to use to call
     *                                     status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * Whether we should look up the caller's caller-ID name from the CNAM database (additional charges apply). Can be: `true` or `false`.
     *
     * @param bool $voiceCallerIdLookup Whether to lookup the caller's name
     * @return $this Fluent Builder
     */
    public function setVoiceCallerIdLookup($voiceCallerIdLookup) {
        $this->options['voiceCallerIdLookup'] = $voiceCallerIdLookup;
        return $this;
    }

    /**
     * The URL we should call when the phone number receives an incoming SMS message.
     *
     * @param string $smsUrl The URL to call when the phone number receives an
     *                       incoming SMS message
     * @return $this Fluent Builder
     */
    public function setSmsUrl($smsUrl) {
        $this->options['smsUrl'] = $smsUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `sms_url`. Can be: `GET` or `POST`.
     *
     * @param string $smsMethod The HTTP method to use with sms_url
     * @return $this Fluent Builder
     */
    public function setSmsMethod($smsMethod) {
        $this->options['smsMethod'] = $smsMethod;
        return $this;
    }

    /**
     * The URL that we should call when an error occurs while retrieving or executing the TwiML from `sms_url`.
     *
     * @param string $smsFallbackUrl The URL to call when an error occurs while
     *                               retrieving or executing the TwiML
     * @return $this Fluent Builder
     */
    public function setSmsFallbackUrl($smsFallbackUrl) {
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `sms_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $smsFallbackMethod The HTTP method to use with sms_fallback_url
     * @return $this Fluent Builder
     */
    public function setSmsFallbackMethod($smsFallbackMethod) {
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        return $this;
    }

    /**
     * The URL we should call using a POST method to send status information about SMS messages sent by the application.
     *
     * @param string $smsStatusCallback The URL to send status information to your
     *                                  application
     * @return $this Fluent Builder
     */
    public function setSmsStatusCallback($smsStatusCallback) {
        $this->options['smsStatusCallback'] = $smsStatusCallback;
        return $this;
    }

    /**
     * The URL we should call using a POST method to send message status information to your application.
     *
     * @param string $messageStatusCallback The URL to send message status
     *                                      information to your application
     * @return $this Fluent Builder
     */
    public function setMessageStatusCallback($messageStatusCallback) {
        $this->options['messageStatusCallback'] = $messageStatusCallback;
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
        return '[Twilio.Api.V2010.UpdateApplicationOptions ' . implode(' ', $options) . ']';
    }
}