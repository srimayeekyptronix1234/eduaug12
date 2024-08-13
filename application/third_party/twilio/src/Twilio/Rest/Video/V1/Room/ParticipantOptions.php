<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Video\V1\Room;

use Twilio\Options;
use Twilio\Values;

abstract class ParticipantOptions {
    /**
     * @param string $status Read only the participants with this status
     * @param string $identity Read only the Participants with this user identity
     *                         value
     * @param \DateTime $dateCreatedAfter Read only Participants that started after
     *                                    this date in UTC ISO 8601 format
     * @param \DateTime $dateCreatedBefore Read only Participants that started
     *                                     before this date in ISO 8601 format
     * @return ReadParticipantOptions Options builder
     */
    public static function read($status = Values::NONE, $identity = Values::NONE, $dateCreatedAfter = Values::NONE, $dateCreatedBefore = Values::NONE) {
        return new ReadParticipantOptions($status, $identity, $dateCreatedAfter, $dateCreatedBefore);
    }

    /**
     * @param string $status The new status of the resource
     * @return UpdateParticipantOptions Options builder
     */
    public static function update($status = Values::NONE) {
        return new UpdateParticipantOptions($status);
    }
}

class ReadParticipantOptions extends Options {
    /**
     * @param string $status Read only the participants with this status
     * @param string $identity Read only the Participants with this user identity
     *                         value
     * @param \DateTime $dateCreatedAfter Read only Participants that started after
     *                                    this date in UTC ISO 8601 format
     * @param \DateTime $dateCreatedBefore Read only Participants that started
     *                                     before this date in ISO 8601 format
     */
    public function __construct($status = Values::NONE, $identity = Values::NONE, $dateCreatedAfter = Values::NONE, $dateCreatedBefore = Values::NONE) {
        $this->options['status'] = $status;
        $this->options['identity'] = $identity;
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
    }

    /**
     * Read only the participants with this status. Can be: `connected` or `disconnected`. For `in-progress` Rooms the default Status is `connected`, for `completed` Rooms only `disconnected` Participants are returned.
     *
     * @param string $status Read only the participants with this status
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Read only the Participants with this [User](https://www.twilio.com/docs/chat/rest/user-resource) `identity` value.
     *
     * @param string $identity Read only the Participants with this user identity
     *                         value
     * @return $this Fluent Builder
     */
    public function setIdentity($identity) {
        $this->options['identity'] = $identity;
        return $this;
    }

    /**
     * Read only Participants that started after this date in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601#UTC) format.
     *
     * @param \DateTime $dateCreatedAfter Read only Participants that started after
     *                                    this date in UTC ISO 8601 format
     * @return $this Fluent Builder
     */
    public function setDateCreatedAfter($dateCreatedAfter) {
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        return $this;
    }

    /**
     * Read only Participants that started before this date in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601#UTC) format.
     *
     * @param \DateTime $dateCreatedBefore Read only Participants that started
     *                                     before this date in ISO 8601 format
     * @return $this Fluent Builder
     */
    public function setDateCreatedBefore($dateCreatedBefore) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
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
        return '[Twilio.Video.V1.ReadParticipantOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateParticipantOptions extends Options {
    /**
     * @param string $status The new status of the resource
     */
    public function __construct($status = Values::NONE) {
        $this->options['status'] = $status;
    }

    /**
     * The new status of the resource. Can be: `connected` or `disconnected`. For `in-progress` Rooms the default Status is `connected`, for `completed` Rooms only `disconnected` Participants are returned.
     *
     * @param string $status The new status of the resource
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
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
        return '[Twilio.Video.V1.UpdateParticipantOptions ' . implode(' ', $options) . ']';
    }
}