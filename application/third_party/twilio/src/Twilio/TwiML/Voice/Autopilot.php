<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Autopilot extends TwiML {
    /**
     * Autopilot constructor.
     *
     * @param string $name Autopilot assistant sid or unique name
     */
    public function __construct($name) {
        parent::__construct('Autopilot', $name);
    }
}