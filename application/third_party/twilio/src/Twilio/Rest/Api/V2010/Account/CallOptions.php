<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class CallOptions {
    /**
     * @param string $url The absolute URL that returns TwiML for this call
     * @param string $applicationSid The SID of the Application resource that will
     *                               handle the call
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with fallback_url
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackEvent The call progress events that we send to
     *                                    the `status_callback` URL.
     * @param string $statusCallbackMethod HTTP Method to use with status_callback
     * @param string $sendDigits The digits to dial after connecting to the number
     * @param int $timeout Number of seconds to wait for an answer
     * @param bool $record Whether to record the call
     * @param string $recordingChannels The number of channels in the final
     *                                  recording
     * @param string $recordingStatusCallback The URL that we call when the
     *                                        recording is available to be accessed
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              when calling the
     *                                              `recording_status_callback` URL
     * @param string $sipAuthUsername The username used to authenticate the caller
     *                                making a SIP call
     * @param string $sipAuthPassword The password required to authenticate the
     *                                user account specified in `sip_auth_username`.
     * @param string $machineDetection Enable machine detection or end of greeting
     *                                 detection
     * @param int $machineDetectionTimeout Number of seconds to wait for machine
     *                                     detection
     * @param string $recordingStatusCallbackEvent The recording status events that
     *                                             will trigger calls to the URL
     *                                             specified in
     *                                             `recording_status_callback`
     * @param string $trim Set this parameter to control trimming of silence on the
     *                     recording.
     * @param string $callerId The phone number, SIP address, or Client identifier
     *                         that made this call. Phone numbers are in E.164
     *                         format (e.g., +16175551212). SIP addresses are
     *                         formatted as `name@company.com`.
     * @param int $machineDetectionSpeechThreshold Number of milliseconds for
     *                                             measuring stick for the length
     *                                             of the speech activity
     * @param int $machineDetectionSpeechEndThreshold Number of milliseconds of
     *                                                silence after speech activity
     * @param int $machineDetectionSilenceTimeout Number of milliseconds of initial
     *                                            silence
     * @return CreateCallOptions Options builder
     */
    public static function create($url = Values::NONE, $applicationSid = Values::NONE, $method = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackEvent = Values::NONE, $statusCallbackMethod = Values::NONE, $sendDigits = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $machineDetection = Values::NONE, $machineDetectionTimeout = Values::NONE, $recordingStatusCallbackEvent = Values::NONE, $trim = Values::NONE, $callerId = Values::NONE, $machineDetectionSpeechThreshold = Values::NONE, $machineDetectionSpeechEndThreshold = Values::NONE, $machineDetectionSilenceTimeout = Values::NONE) {
        return new CreateCallOptions($url, $applicationSid, $method, $fallbackUrl, $fallbackMethod, $statusCallback, $statusCallbackEvent, $statusCallbackMethod, $sendDigits, $timeout, $record, $recordingChannels, $recordingStatusCallback, $recordingStatusCallbackMethod, $sipAuthUsername, $sipAuthPassword, $machineDetection, $machineDetectionTimeout, $recordingStatusCallbackEvent, $trim, $callerId, $machineDetectionSpeechThreshold, $machineDetectionSpeechEndThreshold, $machineDetectionSilenceTimeout);
    }

    /**
     * @param string $to Phone number or Client identifier of calls to include
     * @param string $from Phone number or Client identifier to filter `from` on
     * @param string $parentCallSid Parent call SID to filter on
     * @param string $status The status of the resources to read
     * @param string $startTimeBefore Only include calls that started on this date
     * @param string $startTime Only include calls that started on this date
     * @param string $startTimeAfter Only include calls that started on this date
     * @param string $endTimeBefore Only include calls that ended on this date
     * @param string $endTime Only include calls that ended on this date
     * @param string $endTimeAfter Only include calls that ended on this date
     * @return ReadCallOptions Options builder
     */
    public static function read($to = Values::NONE, $from = Values::NONE, $parentCallSid = Values::NONE, $status = Values::NONE, $startTimeBefore = Values::NONE, $startTime = Values::NONE, $startTimeAfter = Values::NONE, $endTimeBefore = Values::NONE, $endTime = Values::NONE, $endTimeAfter = Values::NONE) {
        return new ReadCallOptions($to, $from, $parentCallSid, $status, $startTimeBefore, $startTime, $startTimeAfter, $endTimeBefore, $endTime, $endTimeAfter);
    }

    /**
     * @param string $url The absolute URL that returns TwiML for this call
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $status The new status to update the call with.
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with fallback_url
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackMethod HTTP Method to use to call
     *                                     status_callback
     * @param string $twiml TwiML instructions for the call
     * @return UpdateCallOptions Options builder
     */
    public static function update($url = Values::NONE, $method = Values::NONE, $status = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $twiml = Values::NONE) {
        return new UpdateCallOptions($url, $method, $status, $fallbackUrl, $fallbackMethod, $statusCallback, $statusCallbackMethod, $twiml);
    }
}

class CreateCallOptions extends Options {
    /**
     * @param string $url The absolute URL that returns TwiML for this call
     * @param string $applicationSid The SID of the Application resource that will
     *                               handle the call
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with fallback_url
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackEvent The call progress events that we send to
     *                                    the `status_callback` URL.
     * @param string $statusCallbackMethod HTTP Method to use with status_callback
     * @param string $sendDigits The digits to dial after connecting to the number
     * @param int $timeout Number of seconds to wait for an answer
     * @param bool $record Whether to record the call
     * @param string $recordingChannels The number of channels in the final
     *                                  recording
     * @param string $recordingStatusCallback The URL that we call when the
     *                                        recording is available to be accessed
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              when calling the
     *                                              `recording_status_callback` URL
     * @param string $sipAuthUsername The username used to authenticate the caller
     *                                making a SIP call
     * @param string $sipAuthPassword The password required to authenticate the
     *                                user account specified in `sip_auth_username`.
     * @param string $machineDetection Enable machine detection or end of greeting
     *                                 detection
     * @param int $machineDetectionTimeout Number of seconds to wait for machine
     *                                     detection
     * @param string $recordingStatusCallbackEvent The recording status events that
     *                                             will trigger calls to the URL
     *                                             specified in
     *                                             `recording_status_callback`
     * @param string $trim Set this parameter to control trimming of silence on the
     *                     recording.
     * @param string $callerId The phone number, SIP address, or Client identifier
     *                         that made this call. Phone numbers are in E.164
     *                         format (e.g., +16175551212). SIP addresses are
     *                         formatted as `name@company.com`.
     * @param int $machineDetectionSpeechThreshold Number of milliseconds for
     *                                             measuring stick for the length
     *                                             of the speech activity
     * @param int $machineDetectionSpeechEndThreshold Number of milliseconds of
     *                                                silence after speech activity
     * @param int $machineDetectionSilenceTimeout Number of milliseconds of initial
     *                                            silence
     */
    public function __construct($url = Values::NONE, $applicationSid = Values::NONE, $method = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackEvent = Values::NONE, $statusCallbackMethod = Values::NONE, $sendDigits = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $machineDetection = Values::NONE, $machineDetectionTimeout = Values::NONE, $recordingStatusCallbackEvent = Values::NONE, $trim = Values::NONE, $callerId = Values::NONE, $machineDetectionSpeechThreshold = Values::NONE, $machineDetectionSpeechEndThreshold = Values::NONE, $machineDetectionSilenceTimeout = Values::NONE) {
        $this->options['url'] = $url;
        $this->options['applicationSid'] = $applicationSid;
        $this->options['method'] = $method;
        $this->options['fallbackUrl'] = $fallbackUrl;
        $this->options['fallbackMethod'] = $fallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['sendDigits'] = $sendDigits;
        $this->options['timeout'] = $timeout;
        $this->options['record'] = $record;
        $this->options['recordingChannels'] = $recordingChannels;
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        $this->options['machineDetection'] = $machineDetection;
        $this->options['machineDetectionTimeout'] = $machineDetectionTimeout;
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        $this->options['trim'] = $trim;
        $this->options['callerId'] = $callerId;
        $this->options['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;
        $this->options['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;
        $this->options['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;
    }

    /**
     * The absolute URL that returns the TwiML instructions for the call. We will call this URL using the `method` when the call connects. For more information, see the [Url Parameter](https://www.twilio.com/docs/voice/make-calls#specify-a-url-parameter) section in [Making Calls](https://www.twilio.com/docs/voice/make-calls).
     *
     * @param string $url The absolute URL that returns TwiML for this call
     * @return $this Fluent Builder
     */
    public function setUrl($url) {
        $this->options['url'] = $url;
        return $this;
    }

    /**
     * The SID of the Application resource that will handle the call, if the call will be handled by an application.
     *
     * @param string $applicationSid The SID of the Application resource that will
     *                               handle the call
     * @return $this Fluent Builder
     */
    public function setApplicationSid($applicationSid) {
        $this->options['applicationSid'] = $applicationSid;
        return $this;
    }

    /**
     * The HTTP method we should use when calling the `url` parameter's value. Can be: `GET` or `POST` and the default is `POST`. If an `application_sid` parameter is present, this parameter is ignored.
     *
     * @param string $method HTTP method to use to fetch TwiML
     * @return $this Fluent Builder
     */
    public function setMethod($method) {
        $this->options['method'] = $method;
        return $this;
    }

    /**
     * The URL that we call using the `fallback_method` if an error occurs when requesting or executing the TwiML at `url`. If an `application_sid` parameter is present, this parameter is ignored.
     *
     * @param string $fallbackUrl Fallback URL in case of error
     * @return $this Fluent Builder
     */
    public function setFallbackUrl($fallbackUrl) {
        $this->options['fallbackUrl'] = $fallbackUrl;
        return $this;
    }

    /**
     * The HTTP method that we should use to request the `fallback_url`. Can be: `GET` or `POST` and the default is `POST`. If an `application_sid` parameter is present, this parameter is ignored.
     *
     * @param string $fallbackMethod HTTP Method to use with fallback_url
     * @return $this Fluent Builder
     */
    public function setFallbackMethod($fallbackMethod) {
        $this->options['fallbackMethod'] = $fallbackMethod;
        return $this;
    }

    /**
     * The URL we should call using the `status_callback_method` to send status information to your application. If no `status_callback_event` is specified, we will send the `completed` status. If an `application_sid` parameter is present, this parameter is ignored. URLs must contain a valid hostname (underscores are not permitted).
     *
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The call progress events that we will send to the `status_callback` URL. Can be: `initiated`, `ringing`, `answered`, and `completed`. If no event is specified, we send the `completed` status. If you want to receive multiple events, specify each one in a separate `status_callback_event` parameter. See the code sample for [monitoring call progress](https://www.twilio.com/docs/voice/api/call-resource?code-sample=code-create-a-call-resource-and-specify-a-statuscallbackevent&code-sdk-version=json). If an `application_sid` is present, this parameter is ignored.
     *
     * @param string $statusCallbackEvent The call progress events that we send to
     *                                    the `status_callback` URL.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackEvent($statusCallbackEvent) {
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        return $this;
    }

    /**
     * The HTTP method we should use when calling the `status_callback` URL. Can be: `GET` or `POST` and the default is `POST`. If an `application_sid` parameter is present, this parameter is ignored.
     *
     * @param string $statusCallbackMethod HTTP Method to use with status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * A string of keys to dial after connecting to the number, maximum of 32 digits. Valid digits in the string include: any digit (`0`-`9`), '`#`', '`*`' and '`w`', to insert a half second pause. For example, if you connected to a company phone number and wanted to pause for one second, and then dial extension 1234 followed by the pound key, the value of this parameter would be `ww1234#`. Remember to URL-encode this string, since the '`#`' character has special meaning in a URL. If both `SendDigits` and `MachineDetection` parameters are provided, then `MachineDetection` will be ignored.
     *
     * @param string $sendDigits The digits to dial after connecting to the number
     * @return $this Fluent Builder
     */
    public function setSendDigits($sendDigits) {
        $this->options['sendDigits'] = $sendDigits;
        return $this;
    }

    /**
     * The integer number of seconds that we should allow the phone to ring before assuming there is no answer. The default is `60` seconds and the maximum is `600` seconds. For some call flows, we will add a 5-second buffer to the timeout value you provide. For this reason, a timeout value of 10 seconds could result in an actual timeout closer to 15 seconds. You can set this to a short time, such as `15` seconds, to hang up before reaching an answering machine or voicemail.
     *
     * @param int $timeout Number of seconds to wait for an answer
     * @return $this Fluent Builder
     */
    public function setTimeout($timeout) {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * Whether to record the call. Can be `true` to record the phone call, or `false` to not. The default is `false`. The `recording_url` is sent to the `status_callback` URL.
     *
     * @param bool $record Whether to record the call
     * @return $this Fluent Builder
     */
    public function setRecord($record) {
        $this->options['record'] = $record;
        return $this;
    }

    /**
     * The number of channels in the final recording. Can be: `mono` or `dual`. The default is `mono`. `mono` records both legs of the call in a single channel of the recording file. `dual` records each leg to a separate channel of the recording file. The first channel of a dual-channel recording contains the parent call and the second channel contains the child call.
     *
     * @param string $recordingChannels The number of channels in the final
     *                                  recording
     * @return $this Fluent Builder
     */
    public function setRecordingChannels($recordingChannels) {
        $this->options['recordingChannels'] = $recordingChannels;
        return $this;
    }

    /**
     * The URL that we call when the recording is available to be accessed.
     *
     * @param string $recordingStatusCallback The URL that we call when the
     *                                        recording is available to be accessed
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallback($recordingStatusCallback) {
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        return $this;
    }

    /**
     * The HTTP method we should use when calling the `recording_status_callback` URL. Can be: `GET` or `POST` and the default is `POST`.
     *
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              when calling the
     *                                              `recording_status_callback` URL
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackMethod($recordingStatusCallbackMethod) {
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        return $this;
    }

    /**
     * The username used to authenticate the caller making a SIP call.
     *
     * @param string $sipAuthUsername The username used to authenticate the caller
     *                                making a SIP call
     * @return $this Fluent Builder
     */
    public function setSipAuthUsername($sipAuthUsername) {
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        return $this;
    }

    /**
     * The password required to authenticate the user account specified in `sip_auth_username`.
     *
     * @param string $sipAuthPassword The password required to authenticate the
     *                                user account specified in `sip_auth_username`.
     * @return $this Fluent Builder
     */
    public function setSipAuthPassword($sipAuthPassword) {
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        return $this;
    }

    /**
     * Whether to detect if a human, answering machine, or fax has picked up the call. Can be: `Enable` or `DetectMessageEnd`. Use `Enable` if you would like us to return `AnsweredBy` as soon as the called party is identified. Use `DetectMessageEnd`, if you would like to leave a message on an answering machine. If `send_digits` is provided, this parameter is ignored. For more information, see [Answering Machine Detection](https://www.twilio.com/docs/voice/answering-machine-detection).
     *
     * @param string $machineDetection Enable machine detection or end of greeting
     *                                 detection
     * @return $this Fluent Builder
     */
    public function setMachineDetection($machineDetection) {
        $this->options['machineDetection'] = $machineDetection;
        return $this;
    }

    /**
     * The number of seconds that we should attempt to detect an answering machine before timing out and sending a voice request with `AnsweredBy` of `unknown`. The default timeout is 30 seconds.
     *
     * @param int $machineDetectionTimeout Number of seconds to wait for machine
     *                                     detection
     * @return $this Fluent Builder
     */
    public function setMachineDetectionTimeout($machineDetectionTimeout) {
        $this->options['machineDetectionTimeout'] = $machineDetectionTimeout;
        return $this;
    }

    /**
     * The recording status events that will trigger calls to the URL specified in `recording_status_callback`. Can be: `in-progress`, `completed` and `absent`. Defaults to `completed`. Separate  multiple values with a space.
     *
     * @param string $recordingStatusCallbackEvent The recording status events that
     *                                             will trigger calls to the URL
     *                                             specified in
     *                                             `recording_status_callback`
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackEvent($recordingStatusCallbackEvent) {
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        return $this;
    }

    /**
     * Whether to trim any leading and trailing silence from the recording. Can be: `trim-silence` or `do-not-trim` and the default is `trim-silence`.
     *
     * @param string $trim Set this parameter to control trimming of silence on the
     *                     recording.
     * @return $this Fluent Builder
     */
    public function setTrim($trim) {
        $this->options['trim'] = $trim;
        return $this;
    }

    /**
     * The phone number, SIP address, or Client identifier that made this call. Phone numbers are in [E.164 format](https://wwnw.twilio.com/docs/glossary/what-e164) (e.g., +16175551212). SIP addresses are formatted as `name@company.com`.
     *
     * @param string $callerId The phone number, SIP address, or Client identifier
     *                         that made this call. Phone numbers are in E.164
     *                         format (e.g., +16175551212). SIP addresses are
     *                         formatted as `name@company.com`.
     * @return $this Fluent Builder
     */
    public function setCallerId($callerId) {
        $this->options['callerId'] = $callerId;
        return $this;
    }

    /**
     * The number of milliseconds that is used as the measuring stick for the length of the speech activity, where durations lower than this value will be interpreted as a human and longer than this value as a machine. Possible Values: 1000-6000. Default: 2400.
     *
     * @param int $machineDetectionSpeechThreshold Number of milliseconds for
     *                                             measuring stick for the length
     *                                             of the speech activity
     * @return $this Fluent Builder
     */
    public function setMachineDetectionSpeechThreshold($machineDetectionSpeechThreshold) {
        $this->options['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;
        return $this;
    }

    /**
     * The number of milliseconds of silence after speech activity at which point the speech activity is considered complete. Possible Values: 500-5000. Default: 1200.
     *
     * @param int $machineDetectionSpeechEndThreshold Number of milliseconds of
     *                                                silence after speech activity
     * @return $this Fluent Builder
     */
    public function setMachineDetectionSpeechEndThreshold($machineDetectionSpeechEndThreshold) {
        $this->options['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;
        return $this;
    }

    /**
     * The number of milliseconds of initial silence after which an `unknown` AnsweredBy result will be returned. Possible Values: 2000-10000. Default: 5000.
     *
     * @param int $machineDetectionSilenceTimeout Number of milliseconds of initial
     *                                            silence
     * @return $this Fluent Builder
     */
    public function setMachineDetectionSilenceTimeout($machineDetectionSilenceTimeout) {
        $this->options['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;
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
        return '[Twilio.Api.V2010.CreateCallOptions ' . implode(' ', $options) . ']';
    }
}

class ReadCallOptions extends Options {
    /**
     * @param string $to Phone number or Client identifier of calls to include
     * @param string $from Phone number or Client identifier to filter `from` on
     * @param string $parentCallSid Parent call SID to filter on
     * @param string $status The status of the resources to read
     * @param string $startTimeBefore Only include calls that started on this date
     * @param string $startTime Only include calls that started on this date
     * @param string $startTimeAfter Only include calls that started on this date
     * @param string $endTimeBefore Only include calls that ended on this date
     * @param string $endTime Only include calls that ended on this date
     * @param string $endTimeAfter Only include calls that ended on this date
     */
    public function __construct($to = Values::NONE, $from = Values::NONE, $parentCallSid = Values::NONE, $status = Values::NONE, $startTimeBefore = Values::NONE, $startTime = Values::NONE, $startTimeAfter = Values::NONE, $endTimeBefore = Values::NONE, $endTime = Values::NONE, $endTimeAfter = Values::NONE) {
        $this->options['to'] = $to;
        $this->options['from'] = $from;
        $this->options['parentCallSid'] = $parentCallSid;
        $this->options['status'] = $status;
        $this->options['startTimeBefore'] = $startTimeBefore;
        $this->options['startTime'] = $startTime;
        $this->options['startTimeAfter'] = $startTimeAfter;
        $this->options['endTimeBefore'] = $endTimeBefore;
        $this->options['endTime'] = $endTime;
        $this->options['endTimeAfter'] = $endTimeAfter;
    }

    /**
     * Only show calls made to this phone number, SIP address, Client identifier or SIM SID.
     *
     * @param string $to Phone number or Client identifier of calls to include
     * @return $this Fluent Builder
     */
    public function setTo($to) {
        $this->options['to'] = $to;
        return $this;
    }

    /**
     * Only include calls from this phone number, SIP address, Client identifier or SIM SID.
     *
     * @param string $from Phone number or Client identifier to filter `from` on
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * Only include calls spawned by calls with this SID.
     *
     * @param string $parentCallSid Parent call SID to filter on
     * @return $this Fluent Builder
     */
    public function setParentCallSid($parentCallSid) {
        $this->options['parentCallSid'] = $parentCallSid;
        return $this;
    }

    /**
     * The status of the calls to include. Can be: `queued`, `ringing`, `in-progress`, `canceled`, `completed`, `failed`, `busy`, or `no-answer`.
     *
     * @param string $status The status of the resources to read
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Only include calls that started on this date. Specify a date as `YYYY-MM-DD` in GMT, for example: `2009-07-06`, to read only calls that started on this date. You can also specify an inequality, such as `StartTime<=YYYY-MM-DD`, to read calls that started on or before midnight of this date, and `StartTime>=YYYY-MM-DD` to read calls that started on or after midnight of this date.
     *
     * @param string $startTimeBefore Only include calls that started on this date
     * @return $this Fluent Builder
     */
    public function setStartTimeBefore($startTimeBefore) {
        $this->options['startTimeBefore'] = $startTimeBefore;
        return $this;
    }

    /**
     * Only include calls that started on this date. Specify a date as `YYYY-MM-DD` in GMT, for example: `2009-07-06`, to read only calls that started on this date. You can also specify an inequality, such as `StartTime<=YYYY-MM-DD`, to read calls that started on or before midnight of this date, and `StartTime>=YYYY-MM-DD` to read calls that started on or after midnight of this date.
     *
     * @param string $startTime Only include calls that started on this date
     * @return $this Fluent Builder
     */
    public function setStartTime($startTime) {
        $this->options['startTime'] = $startTime;
        return $this;
    }

    /**
     * Only include calls that started on this date. Specify a date as `YYYY-MM-DD` in GMT, for example: `2009-07-06`, to read only calls that started on this date. You can also specify an inequality, such as `StartTime<=YYYY-MM-DD`, to read calls that started on or before midnight of this date, and `StartTime>=YYYY-MM-DD` to read calls that started on or after midnight of this date.
     *
     * @param string $startTimeAfter Only include calls that started on this date
     * @return $this Fluent Builder
     */
    public function setStartTimeAfter($startTimeAfter) {
        $this->options['startTimeAfter'] = $startTimeAfter;
        return $this;
    }

    /**
     * Only include calls that ended on this date. Specify a date as `YYYY-MM-DD` in GMT, for example: `2009-07-06`, to read only calls that ended on this date. You can also specify an inequality, such as `EndTime<=YYYY-MM-DD`, to read calls that ended on or before midnight of this date, and `EndTime>=YYYY-MM-DD` to read calls that ended on or after midnight of this date.
     *
     * @param string $endTimeBefore Only include calls that ended on this date
     * @return $this Fluent Builder
     */
    public function setEndTimeBefore($endTimeBefore) {
        $this->options['endTimeBefore'] = $endTimeBefore;
        return $this;
    }

    /**
     * Only include calls that ended on this date. Specify a date as `YYYY-MM-DD` in GMT, for example: `2009-07-06`, to read only calls that ended on this date. You can also specify an inequality, such as `EndTime<=YYYY-MM-DD`, to read calls that ended on or before midnight of this date, and `EndTime>=YYYY-MM-DD` to read calls that ended on or after midnight of this date.
     *
     * @param string $endTime Only include calls that ended on this date
     * @return $this Fluent Builder
     */
    public function setEndTime($endTime) {
        $this->options['endTime'] = $endTime;
        return $this;
    }

    /**
     * Only include calls that ended on this date. Specify a date as `YYYY-MM-DD` in GMT, for example: `2009-07-06`, to read only calls that ended on this date. You can also specify an inequality, such as `EndTime<=YYYY-MM-DD`, to read calls that ended on or before midnight of this date, and `EndTime>=YYYY-MM-DD` to read calls that ended on or after midnight of this date.
     *
     * @param string $endTimeAfter Only include calls that ended on this date
     * @return $this Fluent Builder
     */
    public function setEndTimeAfter($endTimeAfter) {
        $this->options['endTimeAfter'] = $endTimeAfter;
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
        return '[Twilio.Api.V2010.ReadCallOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateCallOptions extends Options {
    /**
     * @param string $url The absolute URL that returns TwiML for this call
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $status The new status to update the call with.
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with fallback_url
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackMethod HTTP Method to use to call
     *                                     status_callback
     * @param string $twiml TwiML instructions for the call
     */
    public function __construct($url = Values::NONE, $method = Values::NONE, $status = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $twiml = Values::NONE) {
        $this->options['url'] = $url;
        $this->options['method'] = $method;
        $this->options['status'] = $status;
        $this->options['fallbackUrl'] = $fallbackUrl;
        $this->options['fallbackMethod'] = $fallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['twiml'] = $twiml;
    }

    /**
     * The absolute URL that returns the TwiML instructions for the call. We will call this URL using the `method` when the call connects. For more information, see the [Url Parameter](https://www.twilio.com/docs/voice/make-calls#specify-a-url-parameter) section in [Making Calls](https://www.twilio.com/docs/voice/make-calls).
     *
     * @param string $url The absolute URL that returns TwiML for this call
     * @return $this Fluent Builder
     */
    public function setUrl($url) {
        $this->options['url'] = $url;
        return $this;
    }

    /**
     * The HTTP method we should use when calling the `url`. Can be: `GET` or `POST` and the default is `POST`. If an `application_sid` parameter is present, this parameter is ignored.
     *
     * @param string $method HTTP method to use to fetch TwiML
     * @return $this Fluent Builder
     */
    public function setMethod($method) {
        $this->options['method'] = $method;
        return $this;
    }

    /**
     * The new status of the resource. Can be: `canceled` or `completed`. Specifying `canceled` will attempt to hang up calls that are queued or ringing; however, it will not affect calls already in progress. Specifying `completed` will attempt to hang up a call even if it's already in progress.
     *
     * @param string $status The new status to update the call with.
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * The URL that we call using the `fallback_method` if an error occurs when requesting or executing the TwiML at `url`. If an `application_sid` parameter is present, this parameter is ignored.
     *
     * @param string $fallbackUrl Fallback URL in case of error
     * @return $this Fluent Builder
     */
    public function setFallbackUrl($fallbackUrl) {
        $this->options['fallbackUrl'] = $fallbackUrl;
        return $this;
    }

    /**
     * The HTTP method that we should use to request the `fallback_url`. Can be: `GET` or `POST` and the default is `POST`. If an `application_sid` parameter is present, this parameter is ignored.
     *
     * @param string $fallbackMethod HTTP Method to use with fallback_url
     * @return $this Fluent Builder
     */
    public function setFallbackMethod($fallbackMethod) {
        $this->options['fallbackMethod'] = $fallbackMethod;
        return $this;
    }

    /**
     * The URL we should call using the `status_callback_method` to send status information to your application. If no `status_callback_event` is specified, we will send the `completed` status. If an `application_sid` parameter is present, this parameter is ignored. URLs must contain a valid hostname (underscores are not permitted).
     *
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The HTTP method we should use when requesting the `status_callback` URL. Can be: `GET` or `POST` and the default is `POST`. If an `application_sid` parameter is present, this parameter is ignored.
     *
     * @param string $statusCallbackMethod HTTP Method to use to call
     *                                     status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * TwiML instructions for the call Twilio will use without fetching Twiml from url. Twiml and url parameters are mutually exclusive
     *
     * @param string $twiml TwiML instructions for the call
     * @return $this Fluent Builder
     */
    public function setTwiml($twiml) {
        $this->options['twiml'] = $twiml;
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
        return '[Twilio.Api.V2010.UpdateCallOptions ' . implode(' ', $options) . ']';
    }
}