<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Hangup extends TwiML {
    /**
     * Hangup constructor.
     */
    public function __construct() {
        parent::__construct('Hangup', null);
    }
}