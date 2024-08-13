<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\Options;
use Twilio\Values;

abstract class ReservationOptions {
    /**
     * @param string $reservationStatus Returns the list of reservations for a
     *                                  worker with a specified ReservationStatus
     * @return ReadReservationOptions Options builder
     */
    public static function read($reservationStatus = Values::NONE) {
        return new ReadReservationOptions($reservationStatus);
    }

    /**
     * @param string $reservationStatus The new status of the reservation
     * @param string $workerActivitySid The new worker activity SID if rejecting a
     *                                  reservation
     * @param string $instruction The assignment instruction for the reservation
     * @param string $dequeuePostWorkActivitySid The SID of the Activity resource
     *                                           to start after executing a Dequeue
     *                                           instruction
     * @param string $dequeueFrom The caller ID of the call to the worker when
     *                            executing a Dequeue instruction
     * @param string $dequeueRecord Whether to record both legs of a call when
     *                              executing a Dequeue instruction
     * @param int $dequeueTimeout The timeout for call when executing a Dequeue
     *                            instruction
     * @param string $dequeueTo The contact URI of the worker when executing a
     *                          Dequeue instruction
     * @param string $dequeueStatusCallbackUrl The callback URL for completed call
     *                                         event when executing a Dequeue
     *                                         instruction
     * @param string $callFrom The Caller ID of the outbound call when executing a
     *                         Call instruction
     * @param string $callRecord Whether to record both legs of a call when
     *                           executing a Call instruction
     * @param int $callTimeout The timeout for a call when executing a Call
     *                         instruction
     * @param string $callTo The contact URI of the worker when executing a Call
     *                       instruction
     * @param string $callUrl TwiML URI executed on answering the worker's leg as a
     *                        result of the Call instruction
     * @param string $callStatusCallbackUrl The URL to call for the completed call
     *                                      event when executing a Call instruction
     * @param bool $callAccept Whether to accept a reservation when executing a
     *                         Call instruction
     * @param string $redirectCallSid The Call SID of the call parked in the queue
     *                                when executing a Redirect instruction
     * @param bool $redirectAccept Whether the reservation should be accepted when
     *                             executing a Redirect instruction
     * @param string $redirectUrl TwiML URI to redirect the call to when executing
     *                            the Redirect instruction
     * @param string $to The Contact URI of the worker when executing a Conference
     *                   instruction
     * @param string $from The caller ID of the call to the worker when executing a
     *                     Conference instruction
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackMethod The HTTP method we should use to call
     *                                     status_callback
     * @param string $statusCallbackEvent The call progress events that we will
     *                                    send to status_callback
     * @param int $timeout The timeout for a call when executing a Conference
     *                     instruction
     * @param bool $record Whether to record the participant and their conferences
     * @param bool $muted Whether to mute the agent
     * @param string $beep Whether to play a notification beep when the participant
     *                     joins
     * @param bool $startConferenceOnEnter Whether the conference starts when the
     *                                     participant joins the conference
     * @param bool $endConferenceOnExit Whether to end the conference when the
     *                                  agent leaves
     * @param string $waitUrl URL that hosts pre-conference hold music
     * @param string $waitMethod The HTTP method we should use to call `wait_url`
     * @param bool $earlyMedia Whether agents can hear the state of the outbound
     *                         call
     * @param int $maxParticipants The maximum number of agent conference
     *                             participants
     * @param string $conferenceStatusCallback The callback URL for conference
     *                                         events
     * @param string $conferenceStatusCallbackMethod HTTP method for requesting
     *                                               `conference_status_callback`
     *                                               URL
     * @param string $conferenceStatusCallbackEvent The conference status events
     *                                              that we will send to
     *                                              conference_status_callback
     * @param string $conferenceRecord Whether to record the conference the
     *                                 participant is joining
     * @param string $conferenceTrim Whether to trim leading and trailing silence
     *                               from your recorded conference audio files
     * @param string $recordingChannels Specify `mono` or `dual` recording channels
     * @param string $recordingStatusCallback The URL that we should call using the
     *                                        `recording_status_callback_method`
     *                                        when the recording status changes
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              when we call
     *                                              `recording_status_callback`
     * @param string $conferenceRecordingStatusCallback The URL we should call
     *                                                  using the
     *                                                  `conference_recording_status_callback_method` when the conference recording is available
     * @param string $conferenceRecordingStatusCallbackMethod The HTTP method we
     *                                                        should use to call
     *                                                        `conference_recording_status_callback`
     * @param string $region The region where we should mix the conference audio
     * @param string $sipAuthUsername The SIP username used for authentication
     * @param string $sipAuthPassword The SIP password for authentication
     * @param string $dequeueStatusCallbackEvent The call progress events sent via
     *                                           webhooks as a result of a Dequeue
     *                                           instruction
     * @param string $postWorkActivitySid The new worker activity SID after
     *                                    executing a Conference instruction
     * @param bool $endConferenceOnCustomerExit Whether to end the conference when
     *                                          the customer leaves
     * @param bool $beepOnCustomerEntrance Whether to play a notification beep when
     *                                     the customer joins
     * @return UpdateReservationOptions Options builder
     */
    public static function update($reservationStatus = Values::NONE, $workerActivitySid = Values::NONE, $instruction = Values::NONE, $dequeuePostWorkActivitySid = Values::NONE, $dequeueFrom = Values::NONE, $dequeueRecord = Values::NONE, $dequeueTimeout = Values::NONE, $dequeueTo = Values::NONE, $dequeueStatusCallbackUrl = Values::NONE, $callFrom = Values::NONE, $callRecord = Values::NONE, $callTimeout = Values::NONE, $callTo = Values::NONE, $callUrl = Values::NONE, $callStatusCallbackUrl = Values::NONE, $callAccept = Values::NONE, $redirectCallSid = Values::NONE, $redirectAccept = Values::NONE, $redirectUrl = Values::NONE, $to = Values::NONE, $from = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $statusCallbackEvent = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $muted = Values::NONE, $beep = Values::NONE, $startConferenceOnEnter = Values::NONE, $endConferenceOnExit = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $earlyMedia = Values::NONE, $maxParticipants = Values::NONE, $conferenceStatusCallback = Values::NONE, $conferenceStatusCallbackMethod = Values::NONE, $conferenceStatusCallbackEvent = Values::NONE, $conferenceRecord = Values::NONE, $conferenceTrim = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $conferenceRecordingStatusCallback = Values::NONE, $conferenceRecordingStatusCallbackMethod = Values::NONE, $region = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $dequeueStatusCallbackEvent = Values::NONE, $postWorkActivitySid = Values::NONE, $endConferenceOnCustomerExit = Values::NONE, $beepOnCustomerEntrance = Values::NONE) {
        return new UpdateReservationOptions($reservationStatus, $workerActivitySid, $instruction, $dequeuePostWorkActivitySid, $dequeueFrom, $dequeueRecord, $dequeueTimeout, $dequeueTo, $dequeueStatusCallbackUrl, $callFrom, $callRecord, $callTimeout, $callTo, $callUrl, $callStatusCallbackUrl, $callAccept, $redirectCallSid, $redirectAccept, $redirectUrl, $to, $from, $statusCallback, $statusCallbackMethod, $statusCallbackEvent, $timeout, $record, $muted, $beep, $startConferenceOnEnter, $endConferenceOnExit, $waitUrl, $waitMethod, $earlyMedia, $maxParticipants, $conferenceStatusCallback, $conferenceStatusCallbackMethod, $conferenceStatusCallbackEvent, $conferenceRecord, $conferenceTrim, $recordingChannels, $recordingStatusCallback, $recordingStatusCallbackMethod, $conferenceRecordingStatusCallback, $conferenceRecordingStatusCallbackMethod, $region, $sipAuthUsername, $sipAuthPassword, $dequeueStatusCallbackEvent, $postWorkActivitySid, $endConferenceOnCustomerExit, $beepOnCustomerEntrance);
    }
}

class ReadReservationOptions extends Options {
    /**
     * @param string $reservationStatus Returns the list of reservations for a
     *                                  worker with a specified ReservationStatus
     */
    public function __construct($reservationStatus = Values::NONE) {
        $this->options['reservationStatus'] = $reservationStatus;
    }

    /**
     * Returns the list of reservations for a worker with a specified ReservationStatus. Can be: `pending`, `accepted`, `rejected`, `timeout`, `canceled`, or `rescinded`.
     *
     * @param string $reservationStatus Returns the list of reservations for a
     *                                  worker with a specified ReservationStatus
     * @return $this Fluent Builder
     */
    public function setReservationStatus($reservationStatus) {
        $this->options['reservationStatus'] = $reservationStatus;
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
        return '[Twilio.Taskrouter.V1.ReadReservationOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateReservationOptions extends Options {
    /**
     * @param string $reservationStatus The new status of the reservation
     * @param string $workerActivitySid The new worker activity SID if rejecting a
     *                                  reservation
     * @param string $instruction The assignment instruction for the reservation
     * @param string $dequeuePostWorkActivitySid The SID of the Activity resource
     *                                           to start after executing a Dequeue
     *                                           instruction
     * @param string $dequeueFrom The caller ID of the call to the worker when
     *                            executing a Dequeue instruction
     * @param string $dequeueRecord Whether to record both legs of a call when
     *                              executing a Dequeue instruction
     * @param int $dequeueTimeout The timeout for call when executing a Dequeue
     *                            instruction
     * @param string $dequeueTo The contact URI of the worker when executing a
     *                          Dequeue instruction
     * @param string $dequeueStatusCallbackUrl The callback URL for completed call
     *                                         event when executing a Dequeue
     *                                         instruction
     * @param string $callFrom The Caller ID of the outbound call when executing a
     *                         Call instruction
     * @param string $callRecord Whether to record both legs of a call when
     *                           executing a Call instruction
     * @param int $callTimeout The timeout for a call when executing a Call
     *                         instruction
     * @param string $callTo The contact URI of the worker when executing a Call
     *                       instruction
     * @param string $callUrl TwiML URI executed on answering the worker's leg as a
     *                        result of the Call instruction
     * @param string $callStatusCallbackUrl The URL to call for the completed call
     *                                      event when executing a Call instruction
     * @param bool $callAccept Whether to accept a reservation when executing a
     *                         Call instruction
     * @param string $redirectCallSid The Call SID of the call parked in the queue
     *                                when executing a Redirect instruction
     * @param bool $redirectAccept Whether the reservation should be accepted when
     *                             executing a Redirect instruction
     * @param string $redirectUrl TwiML URI to redirect the call to when executing
     *                            the Redirect instruction
     * @param string $to The Contact URI of the worker when executing a Conference
     *                   instruction
     * @param string $from The caller ID of the call to the worker when executing a
     *                     Conference instruction
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackMethod The HTTP method we should use to call
     *                                     status_callback
     * @param string $statusCallbackEvent The call progress events that we will
     *                                    send to status_callback
     * @param int $timeout The timeout for a call when executing a Conference
     *                     instruction
     * @param bool $record Whether to record the participant and their conferences
     * @param bool $muted Whether to mute the agent
     * @param string $beep Whether to play a notification beep when the participant
     *                     joins
     * @param bool $startConferenceOnEnter Whether the conference starts when the
     *                                     participant joins the conference
     * @param bool $endConferenceOnExit Whether to end the conference when the
     *                                  agent leaves
     * @param string $waitUrl URL that hosts pre-conference hold music
     * @param string $waitMethod The HTTP method we should use to call `wait_url`
     * @param bool $earlyMedia Whether agents can hear the state of the outbound
     *                         call
     * @param int $maxParticipants The maximum number of agent conference
     *                             participants
     * @param string $conferenceStatusCallback The callback URL for conference
     *                                         events
     * @param string $conferenceStatusCallbackMethod HTTP method for requesting
     *                                               `conference_status_callback`
     *                                               URL
     * @param string $conferenceStatusCallbackEvent The conference status events
     *                                              that we will send to
     *                                              conference_status_callback
     * @param string $conferenceRecord Whether to record the conference the
     *                                 participant is joining
     * @param string $conferenceTrim Whether to trim leading and trailing silence
     *                               from your recorded conference audio files
     * @param string $recordingChannels Specify `mono` or `dual` recording channels
     * @param string $recordingStatusCallback The URL that we should call using the
     *                                        `recording_status_callback_method`
     *                                        when the recording status changes
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              when we call
     *                                              `recording_status_callback`
     * @param string $conferenceRecordingStatusCallback The URL we should call
     *                                                  using the
     *                                                  `conference_recording_status_callback_method` when the conference recording is available
     * @param string $conferenceRecordingStatusCallbackMethod The HTTP method we
     *                                                        should use to call
     *                                                        `conference_recording_status_callback`
     * @param string $region The region where we should mix the conference audio
     * @param string $sipAuthUsername The SIP username used for authentication
     * @param string $sipAuthPassword The SIP password for authentication
     * @param string $dequeueStatusCallbackEvent The call progress events sent via
     *                                           webhooks as a result of a Dequeue
     *                                           instruction
     * @param string $postWorkActivitySid The new worker activity SID after
     *                                    executing a Conference instruction
     * @param bool $endConferenceOnCustomerExit Whether to end the conference when
     *                                          the customer leaves
     * @param bool $beepOnCustomerEntrance Whether to play a notification beep when
     *                                     the customer joins
     */
    public function __construct($reservationStatus = Values::NONE, $workerActivitySid = Values::NONE, $instruction = Values::NONE, $dequeuePostWorkActivitySid = Values::NONE, $dequeueFrom = Values::NONE, $dequeueRecord = Values::NONE, $dequeueTimeout = Values::NONE, $dequeueTo = Values::NONE, $dequeueStatusCallbackUrl = Values::NONE, $callFrom = Values::NONE, $callRecord = Values::NONE, $callTimeout = Values::NONE, $callTo = Values::NONE, $callUrl = Values::NONE, $callStatusCallbackUrl = Values::NONE, $callAccept = Values::NONE, $redirectCallSid = Values::NONE, $redirectAccept = Values::NONE, $redirectUrl = Values::NONE, $to = Values::NONE, $from = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $statusCallbackEvent = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $muted = Values::NONE, $beep = Values::NONE, $startConferenceOnEnter = Values::NONE, $endConferenceOnExit = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $earlyMedia = Values::NONE, $maxParticipants = Values::NONE, $conferenceStatusCallback = Values::NONE, $conferenceStatusCallbackMethod = Values::NONE, $conferenceStatusCallbackEvent = Values::NONE, $conferenceRecord = Values::NONE, $conferenceTrim = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $conferenceRecordingStatusCallback = Values::NONE, $conferenceRecordingStatusCallbackMethod = Values::NONE, $region = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $dequeueStatusCallbackEvent = Values::NONE, $postWorkActivitySid = Values::NONE, $endConferenceOnCustomerExit = Values::NONE, $beepOnCustomerEntrance = Values::NONE) {
        $this->options['reservationStatus'] = $reservationStatus;
        $this->options['workerActivitySid'] = $workerActivitySid;
        $this->options['instruction'] = $instruction;
        $this->options['dequeuePostWorkActivitySid'] = $dequeuePostWorkActivitySid;
        $this->options['dequeueFrom'] = $dequeueFrom;
        $this->options['dequeueRecord'] = $dequeueRecord;
        $this->options['dequeueTimeout'] = $dequeueTimeout;
        $this->options['dequeueTo'] = $dequeueTo;
        $this->options['dequeueStatusCallbackUrl'] = $dequeueStatusCallbackUrl;
        $this->options['callFrom'] = $callFrom;
        $this->options['callRecord'] = $callRecord;
        $this->options['callTimeout'] = $callTimeout;
        $this->options['callTo'] = $callTo;
        $this->options['callUrl'] = $callUrl;
        $this->options['callStatusCallbackUrl'] = $callStatusCallbackUrl;
        $this->options['callAccept'] = $callAccept;
        $this->options['redirectCallSid'] = $redirectCallSid;
        $this->options['redirectAccept'] = $redirectAccept;
        $this->options['redirectUrl'] = $redirectUrl;
        $this->options['to'] = $to;
        $this->options['from'] = $from;
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
        $this->options['conferenceStatusCallback'] = $conferenceStatusCallback;
        $this->options['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;
        $this->options['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
        $this->options['conferenceRecord'] = $conferenceRecord;
        $this->options['conferenceTrim'] = $conferenceTrim;
        $this->options['recordingChannels'] = $recordingChannels;
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        $this->options['conferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;
        $this->options['conferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;
        $this->options['region'] = $region;
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        $this->options['dequeueStatusCallbackEvent'] = $dequeueStatusCallbackEvent;
        $this->options['postWorkActivitySid'] = $postWorkActivitySid;
        $this->options['endConferenceOnCustomerExit'] = $endConferenceOnCustomerExit;
        $this->options['beepOnCustomerEntrance'] = $beepOnCustomerEntrance;
    }

    /**
     * The new status of the reservation. Can be: `pending`, `accepted`, `rejected`, `timeout`, `canceled`, or `rescinded`.
     *
     * @param string $reservationStatus The new status of the reservation
     * @return $this Fluent Builder
     */
    public function setReservationStatus($reservationStatus) {
        $this->options['reservationStatus'] = $reservationStatus;
        return $this;
    }

    /**
     * The new worker activity SID if rejecting a reservation.
     *
     * @param string $workerActivitySid The new worker activity SID if rejecting a
     *                                  reservation
     * @return $this Fluent Builder
     */
    public function setWorkerActivitySid($workerActivitySid) {
        $this->options['workerActivitySid'] = $workerActivitySid;
        return $this;
    }

    /**
     * The assignment instruction for the reservation.
     *
     * @param string $instruction The assignment instruction for the reservation
     * @return $this Fluent Builder
     */
    public function setInstruction($instruction) {
        $this->options['instruction'] = $instruction;
        return $this;
    }

    /**
     * The SID of the Activity resource to start after executing a Dequeue instruction.
     *
     * @param string $dequeuePostWorkActivitySid The SID of the Activity resource
     *                                           to start after executing a Dequeue
     *                                           instruction
     * @return $this Fluent Builder
     */
    public function setDequeuePostWorkActivitySid($dequeuePostWorkActivitySid) {
        $this->options['dequeuePostWorkActivitySid'] = $dequeuePostWorkActivitySid;
        return $this;
    }

    /**
     * The caller ID of the call to the worker when executing a Dequeue instruction.
     *
     * @param string $dequeueFrom The caller ID of the call to the worker when
     *                            executing a Dequeue instruction
     * @return $this Fluent Builder
     */
    public function setDequeueFrom($dequeueFrom) {
        $this->options['dequeueFrom'] = $dequeueFrom;
        return $this;
    }

    /**
     * Whether to record both legs of a call when executing a Dequeue instruction or which leg to record.
     *
     * @param string $dequeueRecord Whether to record both legs of a call when
     *                              executing a Dequeue instruction
     * @return $this Fluent Builder
     */
    public function setDequeueRecord($dequeueRecord) {
        $this->options['dequeueRecord'] = $dequeueRecord;
        return $this;
    }

    /**
     * The timeout for call when executing a Dequeue instruction.
     *
     * @param int $dequeueTimeout The timeout for call when executing a Dequeue
     *                            instruction
     * @return $this Fluent Builder
     */
    public function setDequeueTimeout($dequeueTimeout) {
        $this->options['dequeueTimeout'] = $dequeueTimeout;
        return $this;
    }

    /**
     * The contact URI of the worker when executing a Dequeue instruction. Can be the URI of the Twilio Client, the SIP URI for Programmable SIP, or the [E.164](https://www.twilio.com/docs/glossary/what-e164) formatted phone number, depending on the destination.
     *
     * @param string $dequeueTo The contact URI of the worker when executing a
     *                          Dequeue instruction
     * @return $this Fluent Builder
     */
    public function setDequeueTo($dequeueTo) {
        $this->options['dequeueTo'] = $dequeueTo;
        return $this;
    }

    /**
     * The callback URL for completed call event when executing a Dequeue instruction.
     *
     * @param string $dequeueStatusCallbackUrl The callback URL for completed call
     *                                         event when executing a Dequeue
     *                                         instruction
     * @return $this Fluent Builder
     */
    public function setDequeueStatusCallbackUrl($dequeueStatusCallbackUrl) {
        $this->options['dequeueStatusCallbackUrl'] = $dequeueStatusCallbackUrl;
        return $this;
    }

    /**
     * The Caller ID of the outbound call when executing a Call instruction.
     *
     * @param string $callFrom The Caller ID of the outbound call when executing a
     *                         Call instruction
     * @return $this Fluent Builder
     */
    public function setCallFrom($callFrom) {
        $this->options['callFrom'] = $callFrom;
        return $this;
    }

    /**
     * Whether to record both legs of a call when executing a Call instruction.
     *
     * @param string $callRecord Whether to record both legs of a call when
     *                           executing a Call instruction
     * @return $this Fluent Builder
     */
    public function setCallRecord($callRecord) {
        $this->options['callRecord'] = $callRecord;
        return $this;
    }

    /**
     * The timeout for a call when executing a Call instruction.
     *
     * @param int $callTimeout The timeout for a call when executing a Call
     *                         instruction
     * @return $this Fluent Builder
     */
    public function setCallTimeout($callTimeout) {
        $this->options['callTimeout'] = $callTimeout;
        return $this;
    }

    /**
     * The contact URI of the worker when executing a Call instruction. Can be the URI of the Twilio Client, the SIP URI for Programmable SIP, or the [E.164](https://www.twilio.com/docs/glossary/what-e164) formatted phone number, depending on the destination.
     *
     * @param string $callTo The contact URI of the worker when executing a Call
     *                       instruction
     * @return $this Fluent Builder
     */
    public function setCallTo($callTo) {
        $this->options['callTo'] = $callTo;
        return $this;
    }

    /**
     * TwiML URI executed on answering the worker's leg as a result of the Call instruction.
     *
     * @param string $callUrl TwiML URI executed on answering the worker's leg as a
     *                        result of the Call instruction
     * @return $this Fluent Builder
     */
    public function setCallUrl($callUrl) {
        $this->options['callUrl'] = $callUrl;
        return $this;
    }

    /**
     * The URL to call for the completed call event when executing a Call instruction.
     *
     * @param string $callStatusCallbackUrl The URL to call for the completed call
     *                                      event when executing a Call instruction
     * @return $this Fluent Builder
     */
    public function setCallStatusCallbackUrl($callStatusCallbackUrl) {
        $this->options['callStatusCallbackUrl'] = $callStatusCallbackUrl;
        return $this;
    }

    /**
     * Whether to accept a reservation when executing a Call instruction.
     *
     * @param bool $callAccept Whether to accept a reservation when executing a
     *                         Call instruction
     * @return $this Fluent Builder
     */
    public function setCallAccept($callAccept) {
        $this->options['callAccept'] = $callAccept;
        return $this;
    }

    /**
     * The Call SID of the call parked in the queue when executing a Redirect instruction.
     *
     * @param string $redirectCallSid The Call SID of the call parked in the queue
     *                                when executing a Redirect instruction
     * @return $this Fluent Builder
     */
    public function setRedirectCallSid($redirectCallSid) {
        $this->options['redirectCallSid'] = $redirectCallSid;
        return $this;
    }

    /**
     * Whether the reservation should be accepted when executing a Redirect instruction.
     *
     * @param bool $redirectAccept Whether the reservation should be accepted when
     *                             executing a Redirect instruction
     * @return $this Fluent Builder
     */
    public function setRedirectAccept($redirectAccept) {
        $this->options['redirectAccept'] = $redirectAccept;
        return $this;
    }

    /**
     * TwiML URI to redirect the call to when executing the Redirect instruction.
     *
     * @param string $redirectUrl TwiML URI to redirect the call to when executing
     *                            the Redirect instruction
     * @return $this Fluent Builder
     */
    public function setRedirectUrl($redirectUrl) {
        $this->options['redirectUrl'] = $redirectUrl;
        return $this;
    }

    /**
     * The Contact URI of the worker when executing a Conference instruction. Can be the URI of the Twilio Client, the SIP URI for Programmable SIP, or the [E.164](https://www.twilio.com/docs/glossary/what-e164) formatted phone number, depending on the destination.
     *
     * @param string $to The Contact URI of the worker when executing a Conference
     *                   instruction
     * @return $this Fluent Builder
     */
    public function setTo($to) {
        $this->options['to'] = $to;
        return $this;
    }

    /**
     * The caller ID of the call to the worker when executing a Conference instruction.
     *
     * @param string $from The caller ID of the call to the worker when executing a
     *                     Conference instruction
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
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
     * The HTTP method we should use to call `status_callback`. Can be: `POST` or `GET` and the default is `POST`.
     *
     * @param string $statusCallbackMethod The HTTP method we should use to call
     *                                     status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * The call progress events that we will send to `status_callback`. Can be: `initiated`, `ringing`, `answered`, or `completed`.
     *
     * @param string $statusCallbackEvent The call progress events that we will
     *                                    send to status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackEvent($statusCallbackEvent) {
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        return $this;
    }

    /**
     * The timeout for a call when executing a Conference instruction.
     *
     * @param int $timeout The timeout for a call when executing a Conference
     *                     instruction
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
     * Whether the agent is muted in the conference. Defaults to `false`.
     *
     * @param bool $muted Whether to mute the agent
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * Whether to play a notification beep when the participant joins or when to play a beep. Can be: `true`, `false`, `onEnter`, or `onExit`. The default value is `true`.
     *
     * @param string $beep Whether to play a notification beep when the participant
     *                     joins
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
     * Whether to end the conference when the agent leaves.
     *
     * @param bool $endConferenceOnExit Whether to end the conference when the
     *                                  agent leaves
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
     * Whether to allow an agent to hear the state of the outbound call, including ringing or disconnect messages. The default is `true`.
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
     * The maximum number of participants allowed in the conference. Can be a positive integer from `2` to `250`. The default value is `250`.
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
     * The conference status events that we will send to `conference_status_callback`. Can be: `start`, `end`, `join`, `leave`, `mute`, `hold`, `speaker`.
     *
     * @param string $conferenceStatusCallbackEvent The conference status events
     *                                              that we will send to
     *                                              conference_status_callback
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallbackEvent($conferenceStatusCallbackEvent) {
        $this->options['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
        return $this;
    }

    /**
     * Whether to record the conference the participant is joining or when to record the conference. Can be: `true`, `false`, `record-from-start`, and `do-not-record`. The default value is `false`.
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
     * The call progress events sent via webhooks as a result of a Dequeue instruction.
     *
     * @param string $dequeueStatusCallbackEvent The call progress events sent via
     *                                           webhooks as a result of a Dequeue
     *                                           instruction
     * @return $this Fluent Builder
     */
    public function setDequeueStatusCallbackEvent($dequeueStatusCallbackEvent) {
        $this->options['dequeueStatusCallbackEvent'] = $dequeueStatusCallbackEvent;
        return $this;
    }

    /**
     * The new worker activity SID after executing a Conference instruction.
     *
     * @param string $postWorkActivitySid The new worker activity SID after
     *                                    executing a Conference instruction
     * @return $this Fluent Builder
     */
    public function setPostWorkActivitySid($postWorkActivitySid) {
        $this->options['postWorkActivitySid'] = $postWorkActivitySid;
        return $this;
    }

    /**
     * Whether to end the conference when the customer leaves.
     *
     * @param bool $endConferenceOnCustomerExit Whether to end the conference when
     *                                          the customer leaves
     * @return $this Fluent Builder
     */
    public function setEndConferenceOnCustomerExit($endConferenceOnCustomerExit) {
        $this->options['endConferenceOnCustomerExit'] = $endConferenceOnCustomerExit;
        return $this;
    }

    /**
     * Whether to play a notification beep when the customer joins.
     *
     * @param bool $beepOnCustomerEntrance Whether to play a notification beep when
     *                                     the customer joins
     * @return $this Fluent Builder
     */
    public function setBeepOnCustomerEntrance($beepOnCustomerEntrance) {
        $this->options['beepOnCustomerEntrance'] = $beepOnCustomerEntrance;
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
        return '[Twilio.Taskrouter.V1.UpdateReservationOptions ' . implode(' ', $options) . ']';
    }
}