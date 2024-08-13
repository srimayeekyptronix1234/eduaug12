<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class SsmlProsody extends TwiML {
    /**
     * SsmlProsody constructor.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = array()) {
        parent::__construct('prosody', $words, $attributes);
    }

    /**
     * Add Volume attribute.
     *
     * @param string $volume Specify the volume, available values: default, silent,
     *                       x-soft, soft, medium, loud, x-loud, +ndB, -ndB
     * @return static $this.
     */
    public function setVolume($volume) {
        return $this->setAttribute('volume', $volume);
    }

    /**
     * Add Rate attribute.
     *
     * @param string $rate Specify the rate, available values: x-slow, slow,
     *                     medium, fast, x-fast, n%
     * @return static $this.
     */
    public function setRate($rate) {
        return $this->setAttribute('rate', $rate);
    }

    /**
     * Add Pitch attribute.
     *
     * @param string $pitch Specify the pitch, available values: default, x-low,
     *                      low, medium, high, x-high, +n%, -n%
     * @return static $this.
     */
    public function setPitch($pitch) {
        return $this->setAttribute('pitch', $pitch);
    }
}