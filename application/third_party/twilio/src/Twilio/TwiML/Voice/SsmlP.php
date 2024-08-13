<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class SsmlP extends TwiML {
    /**
     * SsmlP constructor.
     *
     * @param string $words Words to speak
     */
    public function __construct($words) {
        parent::__construct('p', $words);
    }
}