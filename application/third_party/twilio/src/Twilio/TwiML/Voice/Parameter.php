<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Parameter extends TwiML {
    /**
     * Parameter constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array()) {
        parent::__construct('Parameter', null, $attributes);
    }

    /**
     * Add Name attribute.
     *
     * @param string $name The name of the custom parameter
     * @return static $this.
     */
    public function setName($name) {
        return $this->setAttribute('name', $name);
    }

    /**
     * Add Value attribute.
     *
     * @param string $value The value of the custom parameter
     * @return static $this.
     */
    public function setValue($value) {
        return $this->setAttribute('value', $value);
    }
}