<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Identity extends TwiML {
    /**
     * Identity constructor.
     *
     * @param string $clientIdentity Identity of the client to dial
     */
    public function __construct($clientIdentity) {
        parent::__construct('Identity', $clientIdentity);
    }
}