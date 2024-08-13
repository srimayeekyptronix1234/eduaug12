<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Proxy\V1\Service;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class SessionOptions {
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param \DateTime $dateExpiry The ISO 8601 date when the Session should expire
     * @param int $ttl When the session will expire
     * @param string $mode The Mode of the Session
     * @param string $status Session status
     * @param array $participants The Participant objects to include in the new
     *                            session
     * @return CreateSessionOptions Options builder
     */
    public static function create($uniqueName = Values::NONE, $dateExpiry = Values::NONE, $ttl = Values::NONE, $mode = Values::NONE, $status = Values::NONE, $participants = Values::NONE) {
        return new CreateSessionOptions($uniqueName, $dateExpiry, $ttl, $mode, $status, $participants);
    }

    /**
     * @param \DateTime $dateExpiry The ISO 8601 date when the Session should expire
     * @param int $ttl When the session will expire
     * @param string $status The new status of the resource
     * @return UpdateSessionOptions Options builder
     */
    public static function update($dateExpiry = Values::NONE, $ttl = Values::NONE, $status = Values::NONE) {
        return new UpdateSessionOptions($dateExpiry, $ttl, $status);
    }
}

class CreateSessionOptions extends Options {
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param \DateTime $dateExpiry The ISO 8601 date when the Session should expire
     * @param int $ttl When the session will expire
     * @param string $mode The Mode of the Session
     * @param string $status Session status
     * @param array $participants The Participant objects to include in the new
     *                            session
     */
    public function __construct($uniqueName = Values::NONE, $dateExpiry = Values::NONE, $ttl = Values::NONE, $mode = Values::NONE, $status = Values::NONE, $participants = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['dateExpiry'] = $dateExpiry;
        $this->options['ttl'] = $ttl;
        $this->options['mode'] = $mode;
        $this->options['status'] = $status;
        $this->options['participants'] = $participants;
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
     * The [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date when the Session should expire. If this is value is present, it overrides the `ttl` value.
     *
     * @param \DateTime $dateExpiry The ISO 8601 date when the Session should expire
     * @return $this Fluent Builder
     */
    public function setDateExpiry($dateExpiry) {
        $this->options['dateExpiry'] = $dateExpiry;
        return $this;
    }

    /**
     * The time, in seconds, when the session will expire. The time is measured from the last Session create or the Session's last Interaction.
     *
     * @param int $ttl When the session will expire
     * @return $this Fluent Builder
     */
    public function setTtl($ttl) {
        $this->options['ttl'] = $ttl;
        return $this;
    }

    /**
     * The Mode of the Session. Can be: `message-only`, `voice-only`, or `voice-and-message` and the default value is `voice-and-message`.
     *
     * @param string $mode The Mode of the Session
     * @return $this Fluent Builder
     */
    public function setMode($mode) {
        $this->options['mode'] = $mode;
        return $this;
    }

    /**
     * The initial status of the Session. Can be: `open`, `in-progress`, `closed`, `failed`, or `unknown`. The default is `open` on create.
     *
     * @param string $status Session status
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * The Participant objects to include in the new session.
     *
     * @param array $participants The Participant objects to include in the new
     *                            session
     * @return $this Fluent Builder
     */
    public function setParticipants($participants) {
        $this->options['participants'] = $participants;
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
        return '[Twilio.Proxy.V1.CreateSessionOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateSessionOptions extends Options {
    /**
     * @param \DateTime $dateExpiry The ISO 8601 date when the Session should expire
     * @param int $ttl When the session will expire
     * @param string $status The new status of the resource
     */
    public function __construct($dateExpiry = Values::NONE, $ttl = Values::NONE, $status = Values::NONE) {
        $this->options['dateExpiry'] = $dateExpiry;
        $this->options['ttl'] = $ttl;
        $this->options['status'] = $status;
    }

    /**
     * The [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date when the Session should expire. If this is value is present, it overrides the `ttl` value.
     *
     * @param \DateTime $dateExpiry The ISO 8601 date when the Session should expire
     * @return $this Fluent Builder
     */
    public function setDateExpiry($dateExpiry) {
        $this->options['dateExpiry'] = $dateExpiry;
        return $this;
    }

    /**
     * The time, in seconds, when the session will expire. The time is measured from the last Session create or the Session's last Interaction.
     *
     * @param int $ttl When the session will expire
     * @return $this Fluent Builder
     */
    public function setTtl($ttl) {
        $this->options['ttl'] = $ttl;
        return $this;
    }

    /**
     * The new status of the resource. Can be: `in-progress` to re-open a session or `closed` to close a session.
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
        return '[Twilio.Proxy.V1.UpdateSessionOptions ' . implode(' ', $options) . ']';
    }
}