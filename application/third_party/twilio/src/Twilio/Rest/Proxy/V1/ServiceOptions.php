<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Proxy\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class ServiceOptions {
    /**
     * @param int $defaultTtl Default TTL for a Session, in seconds
     * @param string $callbackUrl The URL we should call when the interaction
     *                            status changes
     * @param string $geoMatchLevel Where a proxy number must be located relative
     *                              to the participant identifier
     * @param string $numberSelectionBehavior The preference for Proxy Number
     *                                        selection for the Service instance
     * @param string $interceptCallbackUrl The URL we call on each interaction
     * @param string $outOfSessionCallbackUrl The URL we call when an inbound call
     *                                        or SMS action occurs on a closed or
     *                                        non-existent Session
     * @param string $chatInstanceSid The SID of the Chat Service Instance
     * @return CreateServiceOptions Options builder
     */
    public static function create($defaultTtl = Values::NONE, $callbackUrl = Values::NONE, $geoMatchLevel = Values::NONE, $numberSelectionBehavior = Values::NONE, $interceptCallbackUrl = Values::NONE, $outOfSessionCallbackUrl = Values::NONE, $chatInstanceSid = Values::NONE) {
        return new CreateServiceOptions($defaultTtl, $callbackUrl, $geoMatchLevel, $numberSelectionBehavior, $interceptCallbackUrl, $outOfSessionCallbackUrl, $chatInstanceSid);
    }

    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param int $defaultTtl Default TTL for a Session, in seconds
     * @param string $callbackUrl The URL we should call when the interaction
     *                            status changes
     * @param string $geoMatchLevel Where a proxy number must be located relative
     *                              to the participant identifier
     * @param string $numberSelectionBehavior The preference for Proxy Number
     *                                        selection for the Service instance
     * @param string $interceptCallbackUrl The URL we call on each interaction
     * @param string $outOfSessionCallbackUrl The URL we call when an inbound call
     *                                        or SMS action occurs on a closed or
     *                                        non-existent Session
     * @param string $chatInstanceSid The SID of the Chat Service Instance
     * @return UpdateServiceOptions Options builder
     */
    public static function update($uniqueName = Values::NONE, $defaultTtl = Values::NONE, $callbackUrl = Values::NONE, $geoMatchLevel = Values::NONE, $numberSelectionBehavior = Values::NONE, $interceptCallbackUrl = Values::NONE, $outOfSessionCallbackUrl = Values::NONE, $chatInstanceSid = Values::NONE) {
        return new UpdateServiceOptions($uniqueName, $defaultTtl, $callbackUrl, $geoMatchLevel, $numberSelectionBehavior, $interceptCallbackUrl, $outOfSessionCallbackUrl, $chatInstanceSid);
    }
}

class CreateServiceOptions extends Options {
    /**
     * @param int $defaultTtl Default TTL for a Session, in seconds
     * @param string $callbackUrl The URL we should call when the interaction
     *                            status changes
     * @param string $geoMatchLevel Where a proxy number must be located relative
     *                              to the participant identifier
     * @param string $numberSelectionBehavior The preference for Proxy Number
     *                                        selection for the Service instance
     * @param string $interceptCallbackUrl The URL we call on each interaction
     * @param string $outOfSessionCallbackUrl The URL we call when an inbound call
     *                                        or SMS action occurs on a closed or
     *                                        non-existent Session
     * @param string $chatInstanceSid The SID of the Chat Service Instance
     */
    public function __construct($defaultTtl = Values::NONE, $callbackUrl = Values::NONE, $geoMatchLevel = Values::NONE, $numberSelectionBehavior = Values::NONE, $interceptCallbackUrl = Values::NONE, $outOfSessionCallbackUrl = Values::NONE, $chatInstanceSid = Values::NONE) {
        $this->options['defaultTtl'] = $defaultTtl;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['geoMatchLevel'] = $geoMatchLevel;
        $this->options['numberSelectionBehavior'] = $numberSelectionBehavior;
        $this->options['interceptCallbackUrl'] = $interceptCallbackUrl;
        $this->options['outOfSessionCallbackUrl'] = $outOfSessionCallbackUrl;
        $this->options['chatInstanceSid'] = $chatInstanceSid;
    }

    /**
     * The default `ttl` value to set for Sessions created in the Service. The TTL (time to live) is measured in seconds after the Session's last create or last Interaction. The default value of `0` indicates an unlimited Session length. You can override a Session's default TTL value by setting its `ttl` value.
     *
     * @param int $defaultTtl Default TTL for a Session, in seconds
     * @return $this Fluent Builder
     */
    public function setDefaultTtl($defaultTtl) {
        $this->options['defaultTtl'] = $defaultTtl;
        return $this;
    }

    /**
     * The URL we should call when the interaction status changes.
     *
     * @param string $callbackUrl The URL we should call when the interaction
     *                            status changes
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl) {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
    }

    /**
     * Where a proxy number must be located relative to the participant identifier. Can be: `country`, `area-code`, or `extended-area-code`. The default value is `country` and more specific areas than `country` are only available in North America.
     *
     * @param string $geoMatchLevel Where a proxy number must be located relative
     *                              to the participant identifier
     * @return $this Fluent Builder
     */
    public function setGeoMatchLevel($geoMatchLevel) {
        $this->options['geoMatchLevel'] = $geoMatchLevel;
        return $this;
    }

    /**
     * The preference for Proxy Number selection in the Service instance. Can be: `prefer-sticky` or `avoid-sticky` and the default is `prefer-sticky`. `prefer-sticky` means that we will try and select the same Proxy Number for a given participant if they have previous [Sessions](https://www.twilio.com/docs/proxy/api/session), but we will not fail if that Proxy Number cannot be used.  `avoid-sticky` means that we will try to use different Proxy Numbers as long as that is possible within a given pool rather than try and use a previously assigned number.
     *
     * @param string $numberSelectionBehavior The preference for Proxy Number
     *                                        selection for the Service instance
     * @return $this Fluent Builder
     */
    public function setNumberSelectionBehavior($numberSelectionBehavior) {
        $this->options['numberSelectionBehavior'] = $numberSelectionBehavior;
        return $this;
    }

    /**
     * The URL we call on each interaction. If we receive a 403 status, we block the interaction; otherwise the interaction continues.
     *
     * @param string $interceptCallbackUrl The URL we call on each interaction
     * @return $this Fluent Builder
     */
    public function setInterceptCallbackUrl($interceptCallbackUrl) {
        $this->options['interceptCallbackUrl'] = $interceptCallbackUrl;
        return $this;
    }

    /**
     * The URL we should call when an inbound call or SMS action occurs on a closed or non-existent Session. If your server (or a Twilio [function](https://www.twilio.com/functions)) responds with valid [TwiML](https://www.twilio.com/docs/voice/twiml), we will process it. This means it is possible, for example, to play a message for a call, send an automated text message response, or redirect a call to another Phone Number. See [Out-of-Session Callback Response Guide](https://www.twilio.com/docs/proxy/out-session-callback-response-guide) for more information.
     *
     * @param string $outOfSessionCallbackUrl The URL we call when an inbound call
     *                                        or SMS action occurs on a closed or
     *                                        non-existent Session
     * @return $this Fluent Builder
     */
    public function setOutOfSessionCallbackUrl($outOfSessionCallbackUrl) {
        $this->options['outOfSessionCallbackUrl'] = $outOfSessionCallbackUrl;
        return $this;
    }

    /**
     * The SID of the Chat Service Instance managed by Proxy Service. The Chat Service enables Proxy to forward SMS and channel messages to this chat instance. This is a one-to-one relationship.
     *
     * @param string $chatInstanceSid The SID of the Chat Service Instance
     * @return $this Fluent Builder
     */
    public function setChatInstanceSid($chatInstanceSid) {
        $this->options['chatInstanceSid'] = $chatInstanceSid;
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
        return '[Twilio.Proxy.V1.CreateServiceOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateServiceOptions extends Options {
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param int $defaultTtl Default TTL for a Session, in seconds
     * @param string $callbackUrl The URL we should call when the interaction
     *                            status changes
     * @param string $geoMatchLevel Where a proxy number must be located relative
     *                              to the participant identifier
     * @param string $numberSelectionBehavior The preference for Proxy Number
     *                                        selection for the Service instance
     * @param string $interceptCallbackUrl The URL we call on each interaction
     * @param string $outOfSessionCallbackUrl The URL we call when an inbound call
     *                                        or SMS action occurs on a closed or
     *                                        non-existent Session
     * @param string $chatInstanceSid The SID of the Chat Service Instance
     */
    public function __construct($uniqueName = Values::NONE, $defaultTtl = Values::NONE, $callbackUrl = Values::NONE, $geoMatchLevel = Values::NONE, $numberSelectionBehavior = Values::NONE, $interceptCallbackUrl = Values::NONE, $outOfSessionCallbackUrl = Values::NONE, $chatInstanceSid = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['defaultTtl'] = $defaultTtl;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['geoMatchLevel'] = $geoMatchLevel;
        $this->options['numberSelectionBehavior'] = $numberSelectionBehavior;
        $this->options['interceptCallbackUrl'] = $interceptCallbackUrl;
        $this->options['outOfSessionCallbackUrl'] = $outOfSessionCallbackUrl;
        $this->options['chatInstanceSid'] = $chatInstanceSid;
    }

    /**
     * An application-defined string that uniquely identifies the resource. This value must be 191 characters or fewer in length and be unique. **This value should not have PII.**
     *
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * The default `ttl` value to set for Sessions created in the Service. The TTL (time to live) is measured in seconds after the Session's last create or last Interaction. The default value of `0` indicates an unlimited Session length. You can override a Session's default TTL value by setting its `ttl` value.
     *
     * @param int $defaultTtl Default TTL for a Session, in seconds
     * @return $this Fluent Builder
     */
    public function setDefaultTtl($defaultTtl) {
        $this->options['defaultTtl'] = $defaultTtl;
        return $this;
    }

    /**
     * The URL we should call when the interaction status changes.
     *
     * @param string $callbackUrl The URL we should call when the interaction
     *                            status changes
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl) {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
    }

    /**
     * Where a proxy number must be located relative to the participant identifier. Can be: `country`, `area-code`, or `extended-area-code`. The default value is `country` and more specific areas than `country` are only available in North America.
     *
     * @param string $geoMatchLevel Where a proxy number must be located relative
     *                              to the participant identifier
     * @return $this Fluent Builder
     */
    public function setGeoMatchLevel($geoMatchLevel) {
        $this->options['geoMatchLevel'] = $geoMatchLevel;
        return $this;
    }

    /**
     * The preference for Proxy Number selection in the Service instance. Can be: `prefer-sticky` or `avoid-sticky` and the default is `prefer-sticky`. `prefer-sticky` means that we will try and select the same Proxy Number for a given participant if they have previous [Sessions](https://www.twilio.com/docs/proxy/api/session), but we will not fail if that Proxy Number cannot be used.  `avoid-sticky` means that we will try to use different Proxy Numbers as long as that is possible within a given pool rather than try and use a previously assigned number.
     *
     * @param string $numberSelectionBehavior The preference for Proxy Number
     *                                        selection for the Service instance
     * @return $this Fluent Builder
     */
    public function setNumberSelectionBehavior($numberSelectionBehavior) {
        $this->options['numberSelectionBehavior'] = $numberSelectionBehavior;
        return $this;
    }

    /**
     * The URL we call on each interaction. If we receive a 403 status, we block the interaction; otherwise the interaction continues.
     *
     * @param string $interceptCallbackUrl The URL we call on each interaction
     * @return $this Fluent Builder
     */
    public function setInterceptCallbackUrl($interceptCallbackUrl) {
        $this->options['interceptCallbackUrl'] = $interceptCallbackUrl;
        return $this;
    }

    /**
     * The URL we should call when an inbound call or SMS action occurs on a closed or non-existent Session. If your server (or a Twilio [function](https://www.twilio.com/functions)) responds with valid [TwiML](https://www.twilio.com/docs/voice/twiml), we will process it. This means it is possible, for example, to play a message for a call, send an automated text message response, or redirect a call to another Phone Number. See [Out-of-Session Callback Response Guide](https://www.twilio.com/docs/proxy/out-session-callback-response-guide) for more information.
     *
     * @param string $outOfSessionCallbackUrl The URL we call when an inbound call
     *                                        or SMS action occurs on a closed or
     *                                        non-existent Session
     * @return $this Fluent Builder
     */
    public function setOutOfSessionCallbackUrl($outOfSessionCallbackUrl) {
        $this->options['outOfSessionCallbackUrl'] = $outOfSessionCallbackUrl;
        return $this;
    }

    /**
     * The SID of the Chat Service Instance managed by Proxy Service. The Chat Service enables Proxy to forward SMS and channel messages to this chat instance. This is a one-to-one relationship.
     *
     * @param string $chatInstanceSid The SID of the Chat Service Instance
     * @return $this Fluent Builder
     */
    public function setChatInstanceSid($chatInstanceSid) {
        $this->options['chatInstanceSid'] = $chatInstanceSid;
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
        return '[Twilio.Proxy.V1.UpdateServiceOptions ' . implode(' ', $options) . ']';
    }
}