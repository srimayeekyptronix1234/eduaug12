<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Conference;

use Twilio\Options;
use Twilio\Values;

abstract class ParticipantOptions {
    /**
     * @param bool $muted Whether the participant should be muted
     * @param bool $hold Whether the participant should be on hold
     * @param string $holdUrl The URL we call using the `hold_method` for  music
     *                        that plays when the participant is on hold
     * @param string $holdMethod The HTTP method we should use to call hold_url
     * @param string $announceUrl The URL we call using the `announce_method` for
     *                            an announcement to the participant
     * @param string $announceMethod The HTTP method we should use to call
     *                               announce_url
     * @param string $waitUrl URL that hosts pre-conference hold music
     * @param string $waitMethod The HTTP method we should use to call `wait_url`
     * @param bool $beepOnExit Whether to play a notification beep to the
     *                         conference when the participant exit
     * @param bool $endConferenceOnExit Whether to end the conference when the
     *                                  participant leaves
     * @param bool $coaching Indicates if the participant changed to coach
     * @param string $callSidToCoach The SID of the participant who is being
     *                               `coached`
     * @return UpdateParticipantOptions Options builder
     */
    public static function update($muted = Values::NONE, $hold = Values::NONE, $holdUrl = Values::NONE, $holdMethod = Values::NONE, $announceUrl = Values::NONE, $announceMethod = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $beepOnExit = Values::NONE, $endConferenceOnExit = Values::NONE, $coaching = Values::NONE, $callSidToCoach = Values::NONE) {
        return new UpdateParticipantOptions($muted, $hold, $holdUrl, $holdMethod, $announceUrl, $announceMethod, $waitUrl, $waitMethod, $beepOnExit, $endConferenceOnExit, $coaching, $callSidToCoach);
    }

    /**
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackMethod The HTTP method we should use to call
     *                                     `status_callback`
     * @param string $statusCallbackEvent Set state change events that will trigger
     *                                    a callback
     * @param int $timeout he number of seconds that we should wait for an answer
     * @param bool $record Whether to record the participant and their conferences
     * @param bool $muted Whether to mute the agent
     * @param string $beep Whether to play a notification beep to the conference
     *                     when the participant joins
     * @param bool $startConferenceOnEnter Whether the conference starts when the
     *                                     participant joins the conference
     * @param bool $endConferenceOnExit Whether to end the conference when the
     *                                  participant leaves
     * @param string $waitUrl URL that hosts pre-conference hold music
     * @param string $waitMethod The HTTP method we should use to call `wait_url`
     * @param bool $earlyMedia Whether agents can hear the state of the outbound
     *                         call
     * @param int $maxParticipants The maximum number of agent conference
     *                             participants
     * @param string $conferenceRecord Whether to record the conference the
     *                                 participant is joining
     * @param string $conferenceTrim Whether to trim leading and trailing silence
     *                               from your recorded conference audio files
     * @param string $conferenceStatusCallback The callback URL for conference
     *                                         events
     * @param string $conferenceStatusCallbackMethod HTTP method for requesting
     *                                               `conference_status_callback`
     *                                               URL
     * @param string $conferenceStatusCallbackEvent The conference state changes
     *                                              that should generate a call to
     *                                              `conference_status_callback`
     * @param string $recordingChannels Specify `mono` or `dual` recording channels
     * @param string $recordingStatusCallback The URL that we should call using the
     *                                        `recording_status_callback_method`
     *                                        when the recording status changes
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              when we call
     *                                              `recording_status_callback`
     * @param string $sipAuthUsername The SIP username used for authentication
     * @param string $sipAuthPassword The SIP password for authentication
     * @param string $region The region where we should mix the conference audio
     * @param string $conferenceRecordingStatusCallback The URL we should call
     *                                                  using the
     *                                                  `conference_recording_status_callback_method` when the conference recording is available
     * @param string $conferenceRecordingStatusCallbackMethod The HTTP method we
     *                                                        should use to call
     *                                                        `conference_recording_status_callback`
     * @param string $recordingStatusCallbackEvent The recording state changes that
     *                                             should generate a call to
     *                                             `recording_status_callback`
     * @param string $conferenceRecordingStatusCallbackEvent The conference
     *                                                       recording state
     *                                                       changes that should
     *                                                       generate a call to
     *                                                       `conference_recording_status_callback`
     * @param bool $coaching Indicates if the participant changed to coach
     * @param string $callSidToCoach The SID of the participant who is being
     *                               `coached`
     * @return CreateParticipantOptions Options builder
     */
    public static function create($statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $statusCallbackEvent = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $muted = Values::NONE, $beep = Values::NONE, $startConferenceOnEnter = Values::NONE, $endConferenceOnExit = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $earlyMedia = Values::NONE, $maxParticipants = Values::NONE, $conferenceRecord = Values::NONE, $conferenceTrim = Values::NONE, $conferenceStatusCallback = Values::NONE, $conferenceStatusCallbackMethod = Values::NONE, $conferenceStatusCallbackEvent = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $region = Values::NONE, $conferenceRecordingStatusCallback = Values::NONE, $conferenceRecordingStatusCallbackMethod = Values::NONE, $recordingStatusCallbackEvent = Values::NONE, $conferenceRecordingStatusCallbackEvent = Values::NONE, $coaching = Values::NONE, $callSidToCoach = Values::NONE) {
        return new CreateParticipantOptions($statusCallback, $statusCallbackMethod, $statusCallbackEvent, $timeout, $record, $muted, $beep, $startConferenceOnEnter, $endConferenceOnExit, $waitUrl, $waitMethod, $earlyMedia, $maxParticipants, $conferenceRecord, $conferenceTrim, $conferenceStatusCallback, $conferenceStatusCallbackMethod, $conferenceStatusCallbackEvent, $recordingChannels, $recordingStatusCallback, $recordingStatusCallbackMethod, $sipAuthUsername, $sipAuthPassword, $region, $conferenceRecordingStatusCallback, $conferenceRecordingStatusCallbackMethod, $recordingStatusCallbackEvent, $conferenceRecordingStatusCallbackEvent, $coaching, $callSidToCoach);
    }

    /**
     * @param bool $muted Whether to return only participants that are muted
     * @param bool $hold Whether to return only participants that are on hold
     * @param bool $coaching Whether to return only participants who are coaching
     *                       another call
     * @return ReadParticipantOptions Options builder
     */
    public static function read($muted = Values::NONE, $hold = Values::NONE, $coaching = Values::NONE) {
        return new ReadParticipantOptions($muted, $hold, $coaching);
    }
}

class UpdateParticipantOptions extends Options {
    /**
     * @param bool $muted Whether the participant should be muted
     * @param bool $hold Whether the participant should be on hold
     * @param string $holdUrl The URL we call using the `hold_method` for  music
     *                        that plays when the participant is on hold
     * @param string $holdMethod The HTTP method we should use to call hold_url
     * @param string $announceUrl The URL we call using the `announce_method` for
     *                            an announcement to the participant
     * @param string $announceMethod The HTTP method we should use to call
     *                               announce_url
     * @param string $waitUrl URL that hosts pre-conference hold music
     * @param string $waitMethod The HTTP method we should use to call `wait_url`
     * @param bool $beepOnExit Whether to play a notification beep to the
     *                         conference when the participant exit
     * @param bool $endConferenceOnExit Whether to end the conference when the
     *                                  participant leaves
     * @param bool $coaching Indicates if the participant changed to coach
     * @param string $callSidToCoach The SID of the participant who is being
     *                               `coached`
     */
    public function __construct($muted = Values::NONE, $hold = Values::NONE, $holdUrl = Values::NONE, $holdMethod = Values::NONE, $announceUrl = Values::NONE, $announceMethod = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $beepOnExit = Values::NONE, $endConferenceOnExit = Values::NONE, $coaching = Values::NONE, $callSidToCoach = Values::NONE) {
        $this->options['muted'] = $muted;
        $this->options['hold'] = $hold;
        $this->options['holdUrl'] = $holdUrl;
        $this->options['holdMethod'] = $holdMethod;
        $this->options['announceUrl'] = $announceUrl;
        $this->options['announceMethod'] = $announceMethod;
        $this->options['waitUrl'] = $waitUrl;
        $this->options['waitMethod'] = $waitMethod;
        $this->options['beepOnExit'] = $beepOnExit;
        $this->options['endConferenceOnExit'] = $endConferenceOnExit;
        $this->options['coaching'] = $coaching;
        $this->options['callSidToCoach'] = $callSidToCoach;
    }

    /**
     * Whether the participant should be muted. Can be `true` or `false`. `true` will mute the participant, and `false` will un-mute them. Anything value other than `true` or `false` is interpreted as `false`.
     *
     * @param bool $muted Whether the participant should be muted
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * Whether the participant should be on hold. Can be: `true` or `false`. `true` puts the participant on hold, and `false` lets them rejoin the conference.
     *
     * @param bool $hold Whether the participant should be on hold
     * @return $this Fluent Builder
     */
    public function setHold($hold) {
        $this->options['hold'] = $hold;
        return $this;
    }

    /**
     * The URL we call using the `hold_method` for  music that plays when the participant is on hold. The URL may return an MP3 file, a WAV file, or a TwiML document that contains the `<Play>`, `<Say>` or `<Redirect>` commands.
     *
     * @param string $holdUrl The URL we call using the `hold_method` for  music
     *                        that plays when the participant is on hold
     * @return $this Fluent Builder
     */
    public function setHoldUrl($holdUrl) {
        $this->options['holdUrl'] = $holdUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `hold_url`. Can be: `GET` or `POST` and the default is `GET`.
     *
     * @param string $holdMethod The HTTP method we should use to call hold_url
     * @return $this Fluent Builder
     */
    public function setHoldMethod($holdMethod) {
        $this->options['holdMethod'] = $holdMethod;
        return $this;
    }

    /**
     * The URL we call using the `announce_method` for an announcement to the participant. The URL must return an MP3 file, a WAV file, or a TwiML document that contains `<Play>` or `<Say>` commands.
     *
     * @param string $announceUrl The URL we call using the `announce_method` for
     *                            an announcement to the participant
     * @return $this Fluent Builder
     */
    public function setAnnounceUrl($announceUrl) {
        $this->options['announceUrl'] = $announceUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `announce_url`. Can be: `GET` or `POST` and defaults to `POST`.
     *
     * @param string $announceMethod The HTTP method we should use to call
     *                               announce_url
     * @return $this Fluent Builder
     */
    public function setAnnounceMethod($announceMethod) {
        $this->options['announceMethod'] = $announceMethod;
        return $this;
    }

    /**
     * The URL we should call using the `wait_method` for the music to play while participants are waiting for the conference to start. The default value is the URL of our standard hold music. [Learn more about hold music](https://www.twilio.com/labs/twimlets/holdmusic).
     *
     * @param string $waitUrl URL that hosts pre-conference hold music
     * @return $this Fluent Builder
     */
    public function setWaitUrl($waitUrl) {
        $this->options['waitUrl'] = $waitUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `wait_url`. Can be `GET` or `POST` and the default is `POST`. When using a static audio file, this should be `GET` so that we can cache the file.
     *
     * @param string $waitMethod The HTTP method we should use to call `wait_url`
     * @return $this Fluent Builder
     */
    public function setWaitMethod($waitMethod) {
        $this->options['waitMethod'] = $waitMethod;
        return $this;
    }

    /**
     * Whether to play a notification beep to the conference when the participant exits. Can be: `true` or `false`.
     *
     * @param bool $beepOnExit Whether to play a notification beep to the
     *                         conference when the participant exit
     * @return $this Fluent Builder
     */
    public function setBeepOnExit($beepOnExit) {
        $this->options['beepOnExit'] = $beepOnExit;
        return $this;
    }

    /**
     * Whether to end the conference when the participant leaves. Can be: `true` or `false` and defaults to `false`.
     *
     * @param bool $endConferenceOnExit Whether to end the conference when the
     *                                  participant leaves
     * @return $this Fluent Builder
     */
    public function setEndConferenceOnExit($endConferenceOnExit) {
        $this->options['endConferenceOnExit'] = $endConferenceOnExit;
        return $this;
    }

    /**
     * Whether the participant is coaching another call. Can be: `true` or `false`. If not present, defaults to `false` unless `call_sid_to_coach` is defined. If `true`, `call_sid_to_coach` must be defined.
     *
     * @param bool $coaching Indicates if the participant changed to coach
     * @return $this Fluent Builder
     */
    public function setCoaching($coaching) {
        $this->options['coaching'] = $coaching;
        return $this;
    }

    /**
     * The SID of the participant who is being `coached`. The participant being coached is the only participant who can hear the participant who is `coaching`.
     *
     * @param string $callSidToCoach The SID of the participant who is being
     *                               `coached`
     * @return $this Fluent Builder
     */
    public function setCallSidToCoach($callSidToCoach) {
        $this->options['callSidToCoach'] = $callSidToCoach;
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
        return '[Twilio.Api.V2010.UpdateParticipantOptions ' . implode(' ', $options) . ']';
    }
}

class CreateParticipantOptions extends Options {
    /**
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackMethod The HTTP method we should use to call
     *                                     `status_callback`
     * @param string $statusCallbackEvent Set state change events that will trigger
     *                                    a callback
     * @param int $timeout he number of seconds that we should wait for an answer
     * @param bool $record Whether to record the participant and their conferences
     * @param bool $muted Whether to mute the agent
     * @param string $beep Whether to play a notification beep to the conference
     *                     when the participant joins
     * @param bool $startConferenceOnEnter Whether the conference starts when the
     *                                     participant joins the conference
     * @param bool $endConferenceOnExit Whether to end the conference when the
     *                                  participant leaves
     * @param string $waitUrl URL that hosts pre-conference hold music
     * @param string $waitMethod The HTTP method we should use to call `wait_url`
     * @param bool $earlyMedia Whether agents can hear the state of the outbound
     *                         call
     * @param int $maxParticipants The maximum number of agent conference
     *                             participants
     * @param string $conferenceRecord Whether to record the conference the
     *                                 participant is joining
     * @param string $conferenceTrim Whether to trim leading and trailing silence
     *                               from your recorded conference audio files
     * @param string $conferenceStatusCallback The callback URL for conference
     *                                         events
     * @param string $conferenceStatusCallbackMethod HTTP method for requesting
     *                                               `conference_status_callback`
     *                                               URL
     * @param string $conferenceStatusCallbackEvent The conference state changes
     *                                              that should generate a call to
     *                                              `conference_status_callback`
     * @param string $recordingChannels Specify `mono` or `dual` recording channels
     * @param string $recordingStatusCallback The URL that we should call using the
     *                                        `recording_status_callback_method`
     *                                        when the recording status changes
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              when we call
     *                                              `recording_status_callback`
     * @param string $sipAuthUsername The SIP username used for authentication
     * @param string $sipAuthPassword The SIP password for authentication
     * @param string $region The region where we should mix the conference audio
     * @param string $conferenceRecordingStatusCallback The URL we should call
     *                                                  using the
     *                                                  `conference_recording_status_callback_method` when the conference recording is available
     * @param string $conferenceRecordingStatusCallbackMethod The HTTP method we
     *                                                        should use to call
     *                                                        `conference_recording_status_callback`
     * @param string $recordingStatusCallbackEvent The recording state changes that
     *                                             should generate a call to
     *                                             `recording_status_callback`
     * @param string $conferenceRecordingStatusCallbackEvent The conference
     *                                                       recording state
     *                                                       changes that should
     *                                                       generate a call to
     *                                                       `conference_recording_status_callback`
     * @param bool $coaching Indicates if the participant changed to coach
     * @param string $callSidToCoach The SID of the participant who is being
     *                               `coached`
     */
    public function __construct($statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $statusCallbackEvent = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $muted = Values::NONE, $beep = Values::NONE, $startConferenceOnEnter = Values::NONE, $endConferenceOnExit = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $earlyMedia = Values::NONE, $maxParticipants = Values::NONE, $conferenceRecord = Values::NONE, $conferenceTrim = Values::NONE, $conferenceStatusCallback = Values::NONE, $conferenceStatusCallbackMethod = Values::NONE, $conferenceStatusCallbackEvent = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $region = Values::NONE, $conferenceRecordingStatusCallback = Values::NONE, $conferenceRecordingStatusCallbackMethod = Values::NONE, $recordingStatusCallbackEvent = Values::NONE, $conferenceRecordingStatusCallbackEvent = Values::NONE, $coaching = Values::NONE, $callSidToCoach = Values::NONE) {
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        $this->options['timeout'] = $timeout;
        $this->options['record'] = $record;
        $this->options['muted'] = $muted;
        $this->options['beep'] = $beep;
        $this->options['startConferenceOnEnter'] = $startConferenceOnEnter;
        $this->options['endConferenceOnExit'] = $endConferenceOnExit;
        $this->options['waitUrl'] = $waitUrl;
        $this->options['waitMethod'] = $waitMethod;
        $this->options['earlyMedia'] = $earlyMedia;
        $this->options['maxParticipants'] = $maxParticipants;
        $this->options['conferenceRecord'] = $conferenceRecord;
        $this->options['conferenceTrim'] = $conferenceTrim;
        $this->options['conferenceStatusCallback'] = $conferenceStatusCallback;
        $this->options['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;
        $this->options['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
        $this->options['recordingChannels'] = $recordingChannels;
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        $this->options['region'] = $region;
        $this->options['conferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;
        $this->options['conferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        $this->options['conferenceRecordingStatusCallbackEvent'] = $conferenceRecordingStatusCallbackEvent;
        $this->options['coaching'] = $coaching;
        $this->options['callSidToCoach'] = $callSidToCoach;
    }

    /**
     * The URL we should call using the `status_callback_method` to send status information to your application.
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
     * The HTTP method we should use to call `status_callback`. Can be: `GET` and `POST` and defaults to `POST`.
     *
     * @param string $statusCallbackMethod The HTTP method we should use to call
     *                                     `status_callback`
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * The conference state changes that should generate a call to `status_callback`. Can be: `initiated`, `ringing`, `answered`, and `completed`. Separate multiple values with a space. The default value is `completed`.
     *
     * @param string $statusCallbackEvent Set state change events that will trigger
     *                                    a callback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackEvent($statusCallbackEvent) {
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        return $this;
    }

    /**
     * The number of seconds that we should allow the phone to ring before assuming there is no answer. Can be an integer between `5` and `600`, inclusive. The default value is `60`. We always add a 5-second timeout buffer to outgoing calls, so  value of 10 would result in an actual timeout that was closer to 15 seconds.
     *
     * @param int $timeout he number of seconds that we should wait for an answer
     * @return $this Fluent Builder
     */
    public function setTimeout($timeout) {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * Whether to record the participant and their conferences, including the time between conferences. Can be `true` or `false` and the default is `false`.
     *
     * @param bool $record Whether to record the participant and their conferences
     * @return $this Fluent Builder
     */
    public function setRecord($record) {
        $this->options['record'] = $record;
        return $this;
    }

    /**
     * Whether the agent is muted in the conference. Can be `true` or `false` and the default is `false`.
     *
     * @param bool $muted Whether to mute the agent
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * Whether to play a notification beep to the conference when the participant joins. Can be: `true`, `false`, `onEnter`, or `onExit`. The default value is `true`.
     *
     * @param string $beep Whether to play a notification beep to the conference
     *                     when the participant joins
     * @return $this Fluent Builder
     */
    public function setBeep($beep) {
        $this->options['beep'] = $beep;
        return $this;
    }

    /**
     * Whether to start the conference when the participant joins, if it has not already started. Can be: `true` or `false` and the default is `true`. If `false` and the conference has not started, the participant is muted and hears background music until another participant starts the conference.
     *
     * @param bool $startConferenceOnEnter Whether the conference starts when the
     *                                     participant joins the conference
     * @return $this Fluent Builder
     */
    public function setStartConferenceOnEnter($startConferenceOnEnter) {
        $this->options['startConferenceOnEnter'] = $startConferenceOnEnter;
        return $this;
    }

    /**
     * Whether to end the conference when the participant leaves. Can be: `true` or `false` and defaults to `false`.
     *
     * @param bool $endConferenceOnExit Whether to end the conference when the
     *                                  participant leaves
     * @return $this Fluent Builder
     */
    public function setEndConferenceOnExit($endConferenceOnExit) {
        $this->options['endConferenceOnExit'] = $endConferenceOnExit;
        return $this;
    }

    /**
     * The URL we should call using the `wait_method` for the music to play while participants are waiting for the conference to start. The default value is the URL of our standard hold music. [Learn more about hold music](https://www.twilio.com/labs/twimlets/holdmusic).
     *
     * @param string $waitUrl URL that hosts pre-conference hold music
     * @return $this Fluent Builder
     */
    public function setWaitUrl($waitUrl) {
        $this->options['waitUrl'] = $waitUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `wait_url`. Can be `GET` or `POST` and the default is `POST`. When using a static audio file, this should be `GET` so that we can cache the file.
     *
     * @param string $waitMethod The HTTP method we should use to call `wait_url`
     * @return $this Fluent Builder
     */
    public function setWaitMethod($waitMethod) {
        $this->options['waitMethod'] = $waitMethod;
        return $this;
    }

    /**
     * Whether to allow an agent to hear the state of the outbound call, including ringing or disconnect messages. Can be: `true` or `false` and defaults to `true`.
     *
     * @param bool $earlyMedia Whether agents can hear the state of the outbound
     *                         call
     * @return $this Fluent Builder
     */
    public function setEarlyMedia($earlyMedia) {
        $this->options['earlyMedia'] = $earlyMedia;
        return $this;
    }

    /**
     * The maximum number of participants in the conference. Can be a positive integer from `2` to `250`. The default value is `250`.
     *
     * @param int $maxParticipants The maximum number of agent conference
     *                             participants
     * @return $this Fluent Builder
     */
    public function setMaxParticipants($maxParticipants) {
        $this->options['maxParticipants'] = $maxParticipants;
        return $this;
    }

    /**
     * Whether to record the conference the participant is joining. Can be: `true`, `false`, `record-from-start`, and `do-not-record`. The default value is `false`.
     *
     * @param string $conferenceRecord Whether to record the conference the
     *                                 participant is joining
     * @return $this Fluent Builder
     */
    public function setConferenceRecord($conferenceRecord) {
        $this->options['conferenceRecord'] = $conferenceRecord;
        return $this;
    }

    /**
     * Whether to trim leading and trailing silence from your recorded conference audio files. Can be: `trim-silence` or `do-not-trim` and defaults to `trim-silence`.
     *
     * @param string $conferenceTrim Whether to trim leading and trailing silence
     *                               from your recorded conference audio files
     * @return $this Fluent Builder
     */
    public function setConferenceTrim($conferenceTrim) {
        $this->options['conferenceTrim'] = $conferenceTrim;
        return $this;
    }

    /**
     * The URL we should call using the `conference_status_callback_method` when the conference events in `conference_status_callback_event` occur. Only the value set by the first participant to join the conference is used. Subsequent `conference_status_callback` values are ignored.
     *
     * @param string $conferenceStatusCallback The callback URL for conference
     *                                         events
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallback($conferenceStatusCallback) {
        $this->options['conferenceStatusCallback'] = $conferenceStatusCallback;
        return $this;
    }

    /**
     * The HTTP method we should use to call `conference_status_callback`. Can be: `GET` or `POST` and defaults to `POST`.
     *
     * @param string $conferenceStatusCallbackMethod HTTP method for requesting
     *                                               `conference_status_callback`
     *                                               URL
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallbackMethod($conferenceStatusCallbackMethod) {
        $this->options['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;
        return $this;
    }

    /**
     * The conference state changes that should generate a call to `conference_status_callback`. Can be: `start`, `end`, `join`, `leave`, `mute`, `hold`, and `speaker`. Separate multiple values with a space. Defaults to `start end`.
     *
     * @param string $conferenceStatusCallbackEvent The conference state changes
     *                                              that should generate a call to
     *                                              `conference_status_callback`
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallbackEvent($conferenceStatusCallbackEvent) {
        $this->options['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
        return $this;
    }

    /**
     * The recording channels for the final recording. Can be: `mono` or `dual` and the default is `mono`.
     *
     * @param string $recordingChannels Specify `mono` or `dual` recording channels
     * @return $this Fluent Builder
     */
    public function setRecordingChannels($recordingChannels) {
        $this->options['recordingChannels'] = $recordingChannels;
        return $this;
    }

    /**
     * The URL that we should call using the `recording_status_callback_method` when the recording status changes.
     *
     * @param string $recordingStatusCallback The URL that we should call using the
     *                                        `recording_status_callback_method`
     *                                        when the recording status changes
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallback($recordingStatusCallback) {
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        return $this;
    }

    /**
     * The HTTP method we should use when we call `recording_status_callback`. Can be: `GET` or `POST` and defaults to `POST`.
     *
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              when we call
     *                                              `recording_status_callback`
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackMethod($recordingStatusCallbackMethod) {
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        return $this;
    }

    /**
     * The SIP username used for authentication.
     *
     * @param string $sipAuthUsername The SIP username used for authentication
     * @return $this Fluent Builder
     */
    public function setSipAuthUsername($sipAuthUsername) {
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        return $this;
    }

    /**
     * The SIP password for authentication.
     *
     * @param string $sipAuthPassword The SIP password for authentication
     * @return $this Fluent Builder
     */
    public function setSipAuthPassword($sipAuthPassword) {
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        return $this;
    }

    /**
     * The [region](https://support.twilio.com/hc/en-us/articles/223132167-How-global-low-latency-routing-and-region-selection-work-for-conferences-and-Client-calls) where we should mix the recorded audio. Can be:`us1`, `ie1`, `de1`, `sg1`, `br1`, `au1`, or `jp1`.
     *
     * @param string $region The region where we should mix the conference audio
     * @return $this Fluent Builder
     */
    public function setRegion($region) {
        $this->options['region'] = $region;
        return $this;
    }

    /**
     * The URL we should call using the `conference_recording_status_callback_method` when the conference recording is available.
     *
     * @param string $conferenceRecordingStatusCallback The URL we should call
     *                                                  using the
     *                                                  `conference_recording_status_callback_method` when the conference recording is available
     * @return $this Fluent Builder
     */
    public function setConferenceRecordingStatusCallback($conferenceRecordingStatusCallback) {
        $this->options['conferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;
        return $this;
    }

    /**
     * The HTTP method we should use to call `conference_recording_status_callback`. Can be: `GET` or `POST` and defaults to `POST`.
     *
     * @param string $conferenceRecordingStatusCallbackMethod The HTTP method we
     *                                                        should use to call
     *                                                        `conference_recording_status_callback`
     * @return $this Fluent Builder
     */
    public function setConferenceRecordingStatusCallbackMethod($conferenceRecordingStatusCallbackMethod) {
        $this->options['conferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;
        return $this;
    }

    /**
     * The recording state changes that should generate a call to `recording_status_callback`. Can be: `in-progress`, `completed`, and `failed`. Separate multiple values with a space. The default value is `in-progress completed failed`.
     *
     * @param string $recordingStatusCallbackEvent The recording state changes that
     *                                             should generate a call to
     *                                             `recording_status_callback`
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackEvent($recordingStatusCallbackEvent) {
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        return $this;
    }

    /**
     * The conference recording state changes that generate a call to `conference_recording_status_callback`. Can be: `in-progress`, `completed`, and `failed`. Separate multiple values with a space. The default value is `in-progress completed failed`.
     *
     * @param string $conferenceRecordingStatusCallbackEvent The conference
     *                                                       recording state
     *                                                       changes that should
     *                                                       generate a call to
     *                                                       `conference_recording_status_callback`
     * @return $this Fluent Builder
     */
    public function setConferenceRecordingStatusCallbackEvent($conferenceRecordingStatusCallbackEvent) {
        $this->options['conferenceRecordingStatusCallbackEvent'] = $conferenceRecordingStatusCallbackEvent;
        return $this;
    }

    /**
     * Whether the participant is coaching another call. Can be: `true` or `false`. If not present, defaults to `false` unless `call_sid_to_coach` is defined. If `true`, `call_sid_to_coach` must be defined.
     *
     * @param bool $coaching Indicates if the participant changed to coach
     * @return $this Fluent Builder
     */
    public function setCoaching($coaching) {
        $this->options['coaching'] = $coaching;
        return $this;
    }

    /**
     * The SID of the participant who is being `coached`. The participant being coached is the only participant who can hear the participant who is `coaching`.
     *
     * @param string $callSidToCoach The SID of the participant who is being
     *                               `coached`
     * @return $this Fluent Builder
     */
    public function setCallSidToCoach($callSidToCoach) {
        $this->options['callSidToCoach'] = $callSidToCoach;
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
        return '[Twilio.Api.V2010.CreateParticipantOptions ' . implode(' ', $options) . ']';
    }
}

class ReadParticipantOptions extends Options {
    /**
     * @param bool $muted Whether to return only participants that are muted
     * @param bool $hold Whether to return only participants that are on hold
     * @param bool $coaching Whether to return only participants who are coaching
     *                       another call
     */
    public function __construct($muted = Values::NONE, $hold = Values::NONE, $coaching = Values::NONE) {
        $this->options['muted'] = $muted;
        $this->options['hold'] = $hold;
        $this->options['coaching'] = $coaching;
    }

    /**
     * Whether to return only participants that are muted. Can be: `true` or `false`.
     *
     * @param bool $muted Whether to return only participants that are muted
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * Whether to return only participants that are on hold. Can be: `true` or `false`.
     *
     * @param bool $hold Whether to return only participants that are on hold
     * @return $this Fluent Builder
     */
    public function setHold($hold) {
        $this->options['hold'] = $hold;
        return $this;
    }

    /**
     * Whether to return only participants who are coaching another call. Can be: `true` or `false`.
     *
     * @param bool $coaching Whether to return only participants who are coaching
     *                       another call
     * @return $this Fluent Builder
     */
    public function setCoaching($coaching) {
        $this->options['coaching'] = $coaching;
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
        return '[Twilio.Api.V2010.ReadParticipantOptions ' . implode(' ', $options) . ']';
    }
}