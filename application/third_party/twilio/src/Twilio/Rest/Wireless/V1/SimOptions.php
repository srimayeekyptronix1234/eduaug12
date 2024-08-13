<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Wireless\V1;

use Twilio\Options;
use Twilio\Values;

abstract class SimOptions {
    /**
     * @param string $status Only return Sim resources with this status
     * @param string $iccid Only return Sim resources with this ICCID
     * @param string $ratePlan Only return Sim resources assigned to this RatePlan
     *                         resource
     * @param string $eId Deprecated
     * @param string $simRegistrationCode Only return Sim resources with this
     *                                    registration code
     * @return ReadSimOptions Options builder
     */
    public static function read($status = Values::NONE, $iccid = Values::NONE, $ratePlan = Values::NONE, $eId = Values::NONE, $simRegistrationCode = Values::NONE) {
        return new ReadSimOptions($status, $iccid, $ratePlan, $eId, $simRegistrationCode);
    }

    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param string $callbackMethod The HTTP method we should use to call
     *                               callback_url
     * @param string $callbackUrl The URL we should call when the Sim resource has
     *                            finished updating
     * @param string $friendlyName A string to describe the Sim resource
     * @param string $ratePlan The SID or unique name of the RatePlan resource to
     *                         which the Sim resource should be assigned
     * @param string $status The new status of the Sim resource
     * @param string $commandsCallbackMethod The HTTP method we should use to call
     *                                       commands_callback_url
     * @param string $commandsCallbackUrl The URL we should call when the SIM sends
     *                                    a Command
     * @param string $smsFallbackMethod The HTTP method we should use to call
     *                                  sms_fallback_url
     * @param string $smsFallbackUrl The URL we should call when an error occurs
     *                               while retrieving or executing the TwiML
     *                               requested from sms_url
     * @param string $smsMethod The HTTP method we should use to call sms_url
     * @param string $smsUrl The URL we should call when the SIM-connected device
     *                       sends an SMS message that is not a Command
     * @param string $voiceFallbackMethod The HTTP method we should use to call
     *                                    voice_fallback_url
     * @param string $voiceFallbackUrl The URL we should call when an error occurs
     *                                 while retrieving or executing the TwiML
     *                                 requested from voice_url
     * @param string $voiceMethod The HTTP method we should use when we call
     *                            voice_url
     * @param string $voiceUrl The URL we should call when the SIM-connected device
     *                         makes a voice call
     * @param string $resetStatus Initiate a connectivity reset on a SIM
     * @param string $accountSid The SID of the Account to which the Sim resource
     *                           should belong
     * @return UpdateSimOptions Options builder
     */
    public static function update($uniqueName = Values::NONE, $callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $friendlyName = Values::NONE, $ratePlan = Values::NONE, $status = Values::NONE, $commandsCallbackMethod = Values::NONE, $commandsCallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsMethod = Values::NONE, $smsUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceUrl = Values::NONE, $resetStatus = Values::NONE, $accountSid = Values::NONE) {
        return new UpdateSimOptions($uniqueName, $callbackMethod, $callbackUrl, $friendlyName, $ratePlan, $status, $commandsCallbackMethod, $commandsCallbackUrl, $smsFallbackMethod, $smsFallbackUrl, $smsMethod, $smsUrl, $voiceFallbackMethod, $voiceFallbackUrl, $voiceMethod, $voiceUrl, $resetStatus, $accountSid);
    }
}

class ReadSimOptions extends Options {
    /**
     * @param string $status Only return Sim resources with this status
     * @param string $iccid Only return Sim resources with this ICCID
     * @param string $ratePlan Only return Sim resources assigned to this RatePlan
     *                         resource
     * @param string $eId Deprecated
     * @param string $simRegistrationCode Only return Sim resources with this
     *                                    registration code
     */
    public function __construct($status = Values::NONE, $iccid = Values::NONE, $ratePlan = Values::NONE, $eId = Values::NONE, $simRegistrationCode = Values::NONE) {
        $this->options['status'] = $status;
        $this->options['iccid'] = $iccid;
        $this->options['ratePlan'] = $ratePlan;
        $this->options['eId'] = $eId;
        $this->options['simRegistrationCode'] = $simRegistrationCode;
    }

    /**
     * Only return Sim resources with this status.
     *
     * @param string $status Only return Sim resources with this status
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Only return Sim resources with this ICCID. This will return a list with a maximum size of 1.
     *
     * @param string $iccid Only return Sim resources with this ICCID
     * @return $this Fluent Builder
     */
    public function setIccid($iccid) {
        $this->options['iccid'] = $iccid;
        return $this;
    }

    /**
     * The SID or unique name of a [RatePlan resource](https://www.twilio.com/docs/wireless/api/rateplan-resource). Only return Sim resources assigned to this RatePlan resource.
     *
     * @param string $ratePlan Only return Sim resources assigned to this RatePlan
     *                         resource
     * @return $this Fluent Builder
     */
    public function setRatePlan($ratePlan) {
        $this->options['ratePlan'] = $ratePlan;
        return $this;
    }

    /**
     * Deprecated.
     *
     * @param string $eId Deprecated
     * @return $this Fluent Builder
     */
    public function setEId($eId) {
        $this->options['eId'] = $eId;
        return $this;
    }

    /**
     * Only return Sim resources with this registration code. This will return a list with a maximum size of 1.
     *
     * @param string $simRegistrationCode Only return Sim resources with this
     *                                    registration code
     * @return $this Fluent Builder
     */
    public function setSimRegistrationCode($simRegistrationCode) {
        $this->options['simRegistrationCode'] = $simRegistrationCode;
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
        return '[Twilio.Wireless.V1.ReadSimOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateSimOptions extends Options {
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param string $callbackMethod The HTTP method we should use to call
     *                               callback_url
     * @param string $callbackUrl The URL we should call when the Sim resource has
     *                            finished updating
     * @param string $friendlyName A string to describe the Sim resource
     * @param string $ratePlan The SID or unique name of the RatePlan resource to
     *                         which the Sim resource should be assigned
     * @param string $status The new status of the Sim resource
     * @param string $commandsCallbackMethod The HTTP method we should use to call
     *                                       commands_callback_url
     * @param string $commandsCallbackUrl The URL we should call when the SIM sends
     *                                    a Command
     * @param string $smsFallbackMethod The HTTP method we should use to call
     *                                  sms_fallback_url
     * @param string $smsFallbackUrl The URL we should call when an error occurs
     *                               while retrieving or executing the TwiML
     *                               requested from sms_url
     * @param string $smsMethod The HTTP method we should use to call sms_url
     * @param string $smsUrl The URL we should call when the SIM-connected device
     *                       sends an SMS message that is not a Command
     * @param string $voiceFallbackMethod The HTTP method we should use to call
     *                                    voice_fallback_url
     * @param string $voiceFallbackUrl The URL we should call when an error occurs
     *                                 while retrieving or executing the TwiML
     *                                 requested from voice_url
     * @param string $voiceMethod The HTTP method we should use when we call
     *                            voice_url
     * @param string $voiceUrl The URL we should call when the SIM-connected device
     *                         makes a voice call
     * @param string $resetStatus Initiate a connectivity reset on a SIM
     * @param string $accountSid The SID of the Account to which the Sim resource
     *                           should belong
     */
    public function __construct($uniqueName = Values::NONE, $callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $friendlyName = Values::NONE, $ratePlan = Values::NONE, $status = Values::NONE, $commandsCallbackMethod = Values::NONE, $commandsCallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsMethod = Values::NONE, $smsUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceUrl = Values::NONE, $resetStatus = Values::NONE, $accountSid = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['callbackMethod'] = $callbackMethod;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['ratePlan'] = $ratePlan;
        $this->options['status'] = $status;
        $this->options['commandsCallbackMethod'] = $commandsCallbackMethod;
        $this->options['commandsCallbackUrl'] = $commandsCallbackUrl;
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        $this->options['smsMethod'] = $smsMethod;
        $this->options['smsUrl'] = $smsUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['resetStatus'] = $resetStatus;
        $this->options['accountSid'] = $accountSid;
    }

    /**
     * An application-defined string that uniquely identifies the resource. It can be used in place of the `sid` in the URL path to address the resource.
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
     * The HTTP method we should use to call `callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     *
     * @param string $callbackMethod The HTTP method we should use to call
     *                               callback_url
     * @return $this Fluent Builder
     */
    public function setCallbackMethod($callbackMethod) {
        $this->options['callbackMethod'] = $callbackMethod;
        return $this;
    }

    /**
     * The URL we should call using the `callback_url` when the SIM has finished updating. When the SIM transitions from `new` to `ready` or from any status to `deactivated`, we call this URL when the status changes to an intermediate status (`ready` or `deactivated`) and again when the status changes to its final status (`active` or `canceled`).
     *
     * @param string $callbackUrl The URL we should call when the Sim resource has
     *                            finished updating
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl) {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
    }

    /**
     * A descriptive string that you create to describe the Sim resource. It does not need to be unique.
     *
     * @param string $friendlyName A string to describe the Sim resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The SID or unique name of the [RatePlan resource](https://www.twilio.com/docs/wireless/api/rateplan-resource) to which the Sim resource should be assigned.
     *
     * @param string $ratePlan The SID or unique name of the RatePlan resource to
     *                         which the Sim resource should be assigned
     * @return $this Fluent Builder
     */
    public function setRatePlan($ratePlan) {
        $this->options['ratePlan'] = $ratePlan;
        return $this;
    }

    /**
     * The new status of the Sim resource. Can be: `ready`, `active`, `suspended`, or `deactivated`.
     *
     * @param string $status The new status of the Sim resource
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * The HTTP method we should use to call `commands_callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     *
     * @param string $commandsCallbackMethod The HTTP method we should use to call
     *                                       commands_callback_url
     * @return $this Fluent Builder
     */
    public function setCommandsCallbackMethod($commandsCallbackMethod) {
        $this->options['commandsCallbackMethod'] = $commandsCallbackMethod;
        return $this;
    }

    /**
     * The URL we should call using the `commands_callback_method` when the SIM sends a [Command](https://www.twilio.com/docs/wireless/api/command-resource). Your server should respond with an HTTP status code in the 200 range; any response body is ignored.
     *
     * @param string $commandsCallbackUrl The URL we should call when the SIM sends
     *                                    a Command
     * @return $this Fluent Builder
     */
    public function setCommandsCallbackUrl($commandsCallbackUrl) {
        $this->options['commandsCallbackUrl'] = $commandsCallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `sms_fallback_url`. Can be: `GET` or `POST`. Default is `POST`.
     *
     * @param string $smsFallbackMethod The HTTP method we should use to call
     *                                  sms_fallback_url
     * @return $this Fluent Builder
     */
    public function setSmsFallbackMethod($smsFallbackMethod) {
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        return $this;
    }

    /**
     * The URL we should call using the `sms_fallback_method` when an error occurs while retrieving or executing the TwiML requested from `sms_url`.
     *
     * @param string $smsFallbackUrl The URL we should call when an error occurs
     *                               while retrieving or executing the TwiML
     *                               requested from sms_url
     * @return $this Fluent Builder
     */
    public function setSmsFallbackUrl($smsFallbackUrl) {
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `sms_url`. Can be: `GET` or `POST`. Default is `POST`.
     *
     * @param string $smsMethod The HTTP method we should use to call sms_url
     * @return $this Fluent Builder
     */
    public function setSmsMethod($smsMethod) {
        $this->options['smsMethod'] = $smsMethod;
        return $this;
    }

    /**
     * The URL we should call using the `sms_method` when the SIM-connected device sends an SMS message that is not a [Command](https://www.twilio.com/docs/wireless/api/command-resource).
     *
     * @param string $smsUrl The URL we should call when the SIM-connected device
     *                       sends an SMS message that is not a Command
     * @return $this Fluent Builder
     */
    public function setSmsUrl($smsUrl) {
        $this->options['smsUrl'] = $smsUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceFallbackMethod The HTTP method we should use to call
     *                                    voice_fallback_url
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod($voiceFallbackMethod) {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The URL we should call using the `voice_fallback_method` when an error occurs while retrieving or executing the TwiML requested from `voice_url`.
     *
     * @param string $voiceFallbackUrl The URL we should call when an error occurs
     *                                 while retrieving or executing the TwiML
     *                                 requested from voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl($voiceFallbackUrl) {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use when we call `voice_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceMethod The HTTP method we should use when we call
     *                            voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceMethod($voiceMethod) {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The URL we should call using the `voice_method` when the SIM-connected device makes a voice call.
     *
     * @param string $voiceUrl The URL we should call when the SIM-connected device
     *                         makes a voice call
     * @return $this Fluent Builder
     */
    public function setVoiceUrl($voiceUrl) {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }

    /**
     * Initiate a connectivity reset on the SIM. Set to `resetting` to initiate a connectivity reset on the SIM. No other value is valid.
     *
     * @param string $resetStatus Initiate a connectivity reset on a SIM
     * @return $this Fluent Builder
     */
    public function setResetStatus($resetStatus) {
        $this->options['resetStatus'] = $resetStatus;
        return $this;
    }

    /**
     * The SID of the [Account](https://www.twilio.com/docs/iam/api/account) to which the Sim resource should belong. The Account SID can only be that of the requesting Account or that of a [Subaccount](https://www.twilio.com/docs/iam/api/subaccounts) of the requesting Account. Only valid when the Sim resource's status is `new`. For more information, see the [Move SIMs between Subaccounts documentation](https://www.twilio.com/docs/wireless/api/sim-resource#move-sims-between-subaccounts).
     *
     * @param string $accountSid The SID of the Account to which the Sim resource
     *                           should belong
     * @return $this Fluent Builder
     */
    public function setAccountSid($accountSid) {
        $this->options['accountSid'] = $accountSid;
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
        return '[Twilio.Wireless.V1.UpdateSimOptions ' . implode(' ', $options) . ']';
    }
}