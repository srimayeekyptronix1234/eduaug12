<?php

namespace Twilio\TwiML\Video;

use Twilio\TwiML\TwiML;

class Room extends TwiML {
    /**
     * Room constructor.
     * 
     * @param string $name Room name
     */
    public function __construct($name) {
        parent::__construct('Room', $name);
    }
}