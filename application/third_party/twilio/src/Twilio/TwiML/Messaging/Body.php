<?php

namespace Twilio\TwiML\Messaging;

use Twilio\TwiML\TwiML;

class Body extends TwiML {
    /**
     * Body constructor.
     *
     * @param string $message Message Body
     */
    public function __construct($message) {
        parent::__construct('Body', $message);
    }
}