<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Leave extends TwiML {
    /**
     * Leave constructor.
     */
    public function __construct() {
        parent::__construct('Leave', null);
    }
}