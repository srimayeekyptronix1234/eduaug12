<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Play extends TwiML {
    /**
     * Play constructor.
     *
     * @param string $url Media URL
     * @param array $attributes Optional attributes
     */
    public function __construct($url = null, $attributes = array()) {
        parent::__construct('Play', $url, $attributes);
    }

    /**
     * Add Loop attribute.
     *
     * @param int $loop Times to loop media
     * @return static $this.
     */
    public function setLoop($loop) {
        return $this->setAttribute('loop', $loop);
    }

    /**
     * Add Digits attribute.
     *
     * @param string $digits Play DTMF tones for digits
     * @return static $this.
     */
    public function setDigits($digits) {
        return $this->setAttribute('digits', $digits);
    }
}