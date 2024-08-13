<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML;

class FaxResponse extends TwiML {
    /**
     * FaxResponse constructor.
     */
    public function __construct() {
        parent::__construct('Response', null);
    }

    /**
     * Add Receive child.
     *
     * @param array $attributes Optional attributes
     * @return Fax\Receive Child element.
     */
    public function receive($attributes = array()) {
        return $this->nest(new Fax\Receive($attributes));
    }
}