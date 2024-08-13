<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Echo_ extends TwiML {
    /**
     * Echo constructor.
     */
    public function __construct() {
        parent::__construct('Echo', null);
    }
}