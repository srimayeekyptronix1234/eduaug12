<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Sim extends TwiML {
    /**
     * Sim constructor.
     *
     * @param string $simSid SIM SID
     */
    public function __construct($simSid) {
        parent::__construct('Sim', $simSid);
    }
}