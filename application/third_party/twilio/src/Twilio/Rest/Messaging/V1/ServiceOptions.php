<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Messaging\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class ServiceOptions {
    /**
     * @param string $inboundRequestUrl The URL we call using inbound_method when a
     *                                  message is received by any phone number or
     *                                  short code in the Service
     * @param string $inboundMethod The HTTP method we should use to call
     *                              inbound_request_url
     * @param string $fallbackUrl The URL that we call using fallback_method if an
     *                            error occurs while retrieving or executing the
     *                            TwiML from the Inbound Request URL
     * @param string $fallbackMethod The HTTP method we should use to call
     *                               fallback_url
     * @param string $statusCallback The URL we should call to pass status updates
     *                               about message delivery
     * @param bool $stickySender Whether to enable Sticky Sender on the Service
     *                           instance
     * @param bool $mmsConverter Whether to enable the MMS Converter for messages
     *                           sent through the Service instance
     * @param bool $smartEncoding Whether to enable Encoding for messages sent
     *                            through the Service instance
     * @param string $scanMessageContent Reserved
     * @param bool $fallbackToLongCode Whether to enable Fallback to Long Code for
     *                                 messages sent through the Service instance
     * @param bool $areaCodeGeomatch Whether to enable Area Code Geomatch on the
     *                               Service Instance
     * @param int $validityPeriod How long, in seconds, messages sent from the
     *                            Service are valid
     * @param bool $synchronousValidation Reserved
     * @return CreateServiceOptions Options builder
     */
    public static function create($inboundRequestUrl = Values::NONE, $inboundMethod = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $stickySender = Values::NONE, $mmsConverter = Values::NONE, $smartEncoding = Values::NONE, $scanMessageContent = Values::NONE, $fallbackToLongCode = Values::NONE, $areaCodeGeomatch = Values::NONE, $validityPeriod = Values::NONE, $synchronousValidation = Values::NONE) {
        return new CreateServiceOptions($inboundRequestUrl, $inboundMethod, $fallbackUrl, $fallbackMethod, $statusCallback, $stickySender, $mmsConverter, $smartEncoding, $scanMessageContent, $fallbackToLongCode, $areaCodeGeomatch, $validityPeriod, $synchronousValidation);
    }

    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $inboundRequestUrl The URL we call using inbound_method when a
     *                                  message is received by any phone number or
     *                                  short code in the Service
     * @param string $inboundMethod The HTTP method we should use to call
     *                              inbound_request_url
     * @param string $fallbackUrl The URL that we call using fallback_method if an
     *                            error occurs while retrieving or executing the
     *                            TwiML from the Inbound Request URL
     * @param string $fallbackMethod The HTTP method we should use to call
     *                               fallback_url
     * @param string $statusCallback The URL we should call to pass status updates
     *                               about message delivery
     * @param bool $stickySender Whether to enable Sticky Sender on the Service
     *                           instance
     * @param bool $mmsConverter Whether to enable the MMS Converter for messages
     *                           sent through the Service instance
     * @param bool $smartEncoding Whether to enable Encoding for messages sent
     *                            through the Service instance
     * @param string $scanMessageContent Reserved
     * @param bool $fallbackToLongCode Whether to enable Fallback to Long Code for
     *                                 messages sent through the Service instance
     * @param bool $areaCodeGeomatch Whether to enable Area Code Geomatch on the
     *                               Service Instance
     * @param int $validityPeriod How long, in seconds, messages sent from the
     *                            Service are valid
     * @param bool $synchronousValidation Reserved
     * @return UpdateServiceOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $inboundRequestUrl = Values::NONE, $inboundMethod = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $stickySender = Values::NONE, $mmsConverter = Values::NONE, $smartEncoding = Values::NONE, $scanMessageContent = Values::NONE, $fallbackToLongCode = Values::NONE, $areaCodeGeomatch = Values::NONE, $validityPeriod = Values::NONE, $synchronousValidation = Values::NONE) {
        return new UpdateServiceOptions($friendlyName, $inboundRequestUrl, $inboundMethod, $fallbackUrl, $fallbackMethod, $statusCallback, $stickySender, $mmsConverter, $smartEncoding, $scanMessageContent, $fallbackToLongCode, $areaCodeGeomatch, $validityPeriod, $synchronousValidation);
    }
}

class CreateServiceOptions extends Options {
    /**
     * @param string $inboundRequestUrl The URL we call using inbound_method when a
     *                                  message is received by any phone number or
     *                                  short code in the Service
     * @param string $inboundMethod The HTTP method we should use to call
     *                              inbound_request_url
     * @param string $fallbackUrl The URL that we call using fallback_method if an
     *                            error occurs while retrieving or executing the
     *                            TwiML from the Inbound Request URL
     * @param string $fallbackMethod The HTTP method we should use to call
     *                               fallback_url
     * @param string $statusCallback The URL we should call to pass status updates
     *                               about message delivery
     * @param bool $stickySender Whether to enable Sticky Sender on the Service
     *                           instance
     * @param bool $mmsConverter Whether to enable the MMS Converter for messages
     *                           sent through the Service instance
     * @param bool $smartEncoding Whether to enable Encoding for messages sent
     *                            through the Service instance
     * @param string $scanMessageContent Reserved
     * @param bool $fallbackToLongCode Whether to enable Fallback to Long Code for
     *                                 messages sent through the Service instance
     * @param bool $areaCodeGeomatch Whether to enable Area Code Geomatch on the
     *                               Service Instance
     * @param int $validityPeriod How long, in seconds, messages sent from the
     *                            Service are valid
     * @param bool $synchronousValidation Reserved
     */
    public function __construct($inboundRequestUrl = Values::NONE, $inboundMethod = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $stickySender = Values::NONE, $mmsConverter = Values::NONE, $smartEncoding = Values::NONE, $scanMessageContent = Values::NONE, $fallbackToLongCode = Values::NONE, $areaCodeGeomatch = Values::NONE, $validityPeriod = Values::NONE, $synchronousValidation = Values::NONE) {
        $this->options['inboundRequestUrl'] = $inboundRequestUrl;
        $this->options['inboundMethod'] = $inboundMethod;
        $this->options['fallbackUrl'] = $fallbackUrl;
        $this->options['fallbackMethod'] = $fallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['stickySender'] = $stickySender;
        $this->options['mmsConverter'] = $mmsConverter;
        $this->options['smartEncoding'] = $smartEncoding;
        $this->options['scanMessageContent'] = $scanMessageContent;
        $this->options['fallbackToLongCode'] = $fallbackToLongCode;
        $this->options['areaCodeGeomatch'] = $areaCodeGeomatch;
        $this->options['validityPeriod'] = $validityPeriod;
        $this->options['synchronousValidation'] = $synchronousValidation;
    }

    /**
     * The URL we should call using `inbound_method` when a message is received by any phone number or short code in the Service. When this property is `null`, receiving inbound messages is disabled.
     *
     * @param string $inboundRequestUrl The URL we call using inbound_method when a
     *                                  message is received by any phone number or
     *                                  short code in the Service
     * @return $this Fluent Builder
     */
    public function setInboundRequestUrl($inboundRequestUrl) {
        $this->options['inboundRequestUrl'] = $inboundRequestUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `inbound_request_url`. Can be `GET` or `POST` and the default is `POST`.
     *
     * @param string $inboundMethod The HTTP method we should use to call
     *                              inbound_request_url
     * @return $this Fluent Builder
     */
    public function setInboundMethod($inboundMethod) {
        $this->options['inboundMethod'] = $inboundMethod;
        return $this;
    }

    /**
     * The URL that we should call using `fallback_method` if an error occurs while retrieving or executing the TwiML from the Inbound Request URL.
     *
     * @param string $fallbackUrl The URL that we call using fallback_method if an
     *                            error occurs while retrieving or executing the
     *                            TwiML from the Inbound Request URL
     * @return $this Fluent Builder
     */
    public function setFallbackUrl($fallbackUrl) {
        $this->options['fallbackUrl'] = $fallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $fallbackMethod The HTTP method we should use to call
     *                               fallback_url
     * @return $this Fluent Builder
     */
    public function setFallbackMethod($fallbackMethod) {
        $this->options['fallbackMethod'] = $fallbackMethod;
        return $this;
    }

    /**
     * The URL we should call to [pass status updates](https://www.twilio.com/docs/sms/api/message-resource#message-status-values) about message delivery.
     *
     * @param string $statusCallback The URL we should call to pass status updates
     *                               about message delivery
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * Whether to enable [Sticky Sender](https://www.twilio.com/docs/sms/services#sticky-sender) on the Service instance.
     *
     * @param bool $stickySender Whether to enable Sticky Sender on the Service
     *                           instance
     * @return $this Fluent Builder
     */
    public function setStickySender($stickySender) {
        $this->options['stickySender'] = $stickySender;
        return $this;
    }

    /**
     * Whether to enable the [MMS Converter](https://www.twilio.com/docs/sms/services#mms-converter) for messages sent through the Service instance.
     *
     * @param bool $mmsConverter Whether to enable the MMS Converter for messages
     *                           sent through the Service instance
     * @return $this Fluent Builder
     */
    public function setMmsConverter($mmsConverter) {
        $this->options['mmsConverter'] = $mmsConverter;
        return $this;
    }

    /**
     * Whether to enable [Smart Encoding](https://www.twilio.com/docs/sms/services#smart-encoding) for messages sent through the Service instance.
     *
     * @param bool $smartEncoding Whether to enable Encoding for messages sent
     *                            through the Service instance
     * @return $this Fluent Builder
     */
    public function setSmartEncoding($smartEncoding) {
        $this->options['smartEncoding'] = $smartEncoding;
        return $this;
    }

    /**
     * Reserved.
     *
     * @param string $scanMessageContent Reserved
     * @return $this Fluent Builder
     */
    public function setScanMessageContent($scanMessageContent) {
        $this->options['scanMessageContent'] = $scanMessageContent;
        return $this;
    }

    /**
     * Whether to enable [Fallback to Long Code](https://www.twilio.com/docs/sms/services#fallback-to-long-code) for messages sent through the Service instance.
     *
     * @param bool $fallbackToLongCode Whether to enable Fallback to Long Code for
     *                                 messages sent through the Service instance
     * @return $this Fluent Builder
     */
    public function setFallbackToLongCode($fallbackToLongCode) {
        $this->options['fallbackToLongCode'] = $fallbackToLongCode;
        return $this;
    }

    /**
     * Whether to enable [Area Code Geomatch](https://www.twilio.com/docs/sms/services#area-code-geomatch) on the Service Instance.
     *
     * @param bool $areaCodeGeomatch Whether to enable Area Code Geomatch on the
     *                               Service Instance
     * @return $this Fluent Builder
     */
    public function setAreaCodeGeomatch($areaCodeGeomatch) {
        $this->options['areaCodeGeomatch'] = $areaCodeGeomatch;
        return $this;
    }

    /**
     * How long, in seconds, messages sent from the Service are valid. Can be an integer from `1` to `14,400`.
     *
     * @param int $validityPeriod How long, in seconds, messages sent from the
     *                            Service are valid
     * @return $this Fluent Builder
     */
    public function setValidityPeriod($validityPeriod) {
        $this->options['validityPeriod'] = $validityPeriod;
        return $this;
    }

    /**
     * Reserved.
     *
     * @param bool $synchronousValidation Reserved
     * @return $this Fluent Builder
     */
    public function setSynchronousValidation($synchronousValidation) {
        $this->options['synchronousValidation'] = $synchronousValidation;
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
        return '[Twilio.Messaging.V1.CreateServiceOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateServiceOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $inboundRequestUrl The URL we call using inbound_method when a
     *                                  message is received by any phone number or
     *                                  short code in the Service
     * @param string $inboundMethod The HTTP method we should use to call
     *                              inbound_request_url
     * @param string $fallbackUrl The URL that we call using fallback_method if an
     *                            error occurs while retrieving or executing the
     *                            TwiML from the Inbound Request URL
     * @param string $fallbackMethod The HTTP method we should use to call
     *                               fallback_url
     * @param string $statusCallback The URL we should call to pass status updates
     *                               about message delivery
     * @param bool $stickySender Whether to enable Sticky Sender on the Service
     *                           instance
     * @param bool $mmsConverter Whether to enable the MMS Converter for messages
     *                           sent through the Service instance
     * @param bool $smartEncoding Whether to enable Encoding for messages sent
     *                            through the Service instance
     * @param string $scanMessageContent Reserved
     * @param bool $fallbackToLongCode Whether to enable Fallback to Long Code for
     *                                 messages sent through the Service instance
     * @param bool $areaCodeGeomatch Whether to enable Area Code Geomatch on the
     *                               Service Instance
     * @param int $validityPeriod How long, in seconds, messages sent from the
     *                            Service are valid
     * @param bool $synchronousValidation Reserved
     */
    public function __construct($friendlyName = Values::NONE, $inboundRequestUrl = Values::NONE, $inboundMethod = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $stickySender = Values::NONE, $mmsConverter = Values::NONE, $smartEncoding = Values::NONE, $scanMessageContent = Values::NONE, $fallbackToLongCode = Values::NONE, $areaCodeGeomatch = Values::NONE, $validityPeriod = Values::NONE, $synchronousValidation = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['inboundRequestUrl'] = $inboundRequestUrl;
        $this->options['inboundMethod'] = $inboundMethod;
        $this->options['fallbackUrl'] = $fallbackUrl;
        $this->options['fallbackMethod'] = $fallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['stickySender'] = $stickySender;
        $this->options['mmsConverter'] = $mmsConverter;
        $this->options['smartEncoding'] = $smartEncoding;
        $this->options['scanMessageContent'] = $scanMessageContent;
        $this->options['fallbackToLongCode'] = $fallbackToLongCode;
        $this->options['areaCodeGeomatch'] = $areaCodeGeomatch;
        $this->options['validityPeriod'] = $validityPeriod;
        $this->options['synchronousValidation'] = $synchronousValidation;
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
     * The URL we should call using `inbound_method` when a message is received by any phone number or short code in the Service. When this property is `null`, receiving inbound messages is disabled.
     *
     * @param string $inboundRequestUrl The URL we call using inbound_method when a
     *                                  message is received by any phone number or
     *                                  short code in the Service
     * @return $this Fluent Builder
     */
    public function setInboundRequestUrl($inboundRequestUrl) {
        $this->options['inboundRequestUrl'] = $inboundRequestUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `inbound_request_url`. Can be `GET` or `POST` and the default is `POST`.
     *
     * @param string $inboundMethod The HTTP method we should use to call
     *                              inbound_request_url
     * @return $this Fluent Builder
     */
    public function setInboundMethod($inboundMethod) {
        $this->options['inboundMethod'] = $inboundMethod;
        return $this;
    }

    /**
     * The URL that we should call using `fallback_method` if an error occurs while retrieving or executing the TwiML from the Inbound Request URL.
     *
     * @param string $fallbackUrl The URL that we call using fallback_method if an
     *                            error occurs while retrieving or executing the
     *                            TwiML from the Inbound Request URL
     * @return $this Fluent Builder
     */
    public function setFallbackUrl($fallbackUrl) {
        $this->options['fallbackUrl'] = $fallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $fallbackMethod The HTTP method we should use to call
     *                               fallback_url
     * @return $this Fluent Builder
     */
    public function setFallbackMethod($fallbackMethod) {
        $this->options['fallbackMethod'] = $fallbackMethod;
        return $this;
    }

    /**
     * The URL we should call to [pass status updates](https://www.twilio.com/docs/sms/api/message-resource#message-status-values) about message delivery.
     *
     * @param string $statusCallback The URL we should call to pass status updates
     *                               about message delivery
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * Whether to enable [Sticky Sender](https://www.twilio.com/docs/sms/services#sticky-sender) on the Service instance.
     *
     * @param bool $stickySender Whether to enable Sticky Sender on the Service
     *                           instance
     * @return $this Fluent Builder
     */
    public function setStickySender($stickySender) {
        $this->options['stickySender'] = $stickySender;
        return $this;
    }

    /**
     * Whether to enable the [MMS Converter](https://www.twilio.com/docs/sms/services#mms-converter) for messages sent through the Service instance.
     *
     * @param bool $mmsConverter Whether to enable the MMS Converter for messages
     *                           sent through the Service instance
     * @return $this Fluent Builder
     */
    public function setMmsConverter($mmsConverter) {
        $this->options['mmsConverter'] = $mmsConverter;
        return $this;
    }

    /**
     * Whether to enable [Smart Encoding](https://www.twilio.com/docs/sms/services#smart-encoding) for messages sent through the Service instance.
     *
     * @param bool $smartEncoding Whether to enable Encoding for messages sent
     *                            through the Service instance
     * @return $this Fluent Builder
     */
    public function setSmartEncoding($smartEncoding) {
        $this->options['smartEncoding'] = $smartEncoding;
        return $this;
    }

    /**
     * Reserved.
     *
     * @param string $scanMessageContent Reserved
     * @return $this Fluent Builder
     */
    public function setScanMessageContent($scanMessageContent) {
        $this->options['scanMessageContent'] = $scanMessageContent;
        return $this;
    }

    /**
     * Whether to enable [Fallback to Long Code](https://www.twilio.com/docs/sms/services#fallback-to-long-code) for messages sent through the Service instance.
     *
     * @param bool $fallbackToLongCode Whether to enable Fallback to Long Code for
     *                                 messages sent through the Service instance
     * @return $this Fluent Builder
     */
    public function setFallbackToLongCode($fallbackToLongCode) {
        $this->options['fallbackToLongCode'] = $fallbackToLongCode;
        return $this;
    }

    /**
     * Whether to enable [Area Code Geomatch](https://www.twilio.com/docs/sms/services#area-code-geomatch) on the Service Instance.
     *
     * @param bool $areaCodeGeomatch Whether to enable Area Code Geomatch on the
     *                               Service Instance
     * @return $this Fluent Builder
     */
    public function setAreaCodeGeomatch($areaCodeGeomatch) {
        $this->options['areaCodeGeomatch'] = $areaCodeGeomatch;
        return $this;
    }

    /**
     * How long, in seconds, messages sent from the Service are valid. Can be an integer from `1` to `14,400`.
     *
     * @param int $validityPeriod How long, in seconds, messages sent from the
     *                            Service are valid
     * @return $this Fluent Builder
     */
    public function setValidityPeriod($validityPeriod) {
        $this->options['validityPeriod'] = $validityPeriod;
        return $this;
    }

    /**
     * Reserved.
     *
     * @param bool $synchronousValidation Reserved
     * @return $this Fluent Builder
     */
    public function setSynchronousValidation($synchronousValidation) {
        $this->options['synchronousValidation'] = $synchronousValidation;
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
        return '[Twilio.Messaging.V1.UpdateServiceOptions ' . implode(' ', $options) . ']';
    }
}