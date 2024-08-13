<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Reject extends TwiML {
    /**
     * Reject constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array()) {
        parent::__construct('Reject', null, $attributes);
    }

    /**
     * Add Reason attribute.
     *
     * @param string $reason Rejection reason
     * @return static $this.
     */
    public function setReason($reason) {
        return $this->setAttribute('reason', $reason);
    }
}