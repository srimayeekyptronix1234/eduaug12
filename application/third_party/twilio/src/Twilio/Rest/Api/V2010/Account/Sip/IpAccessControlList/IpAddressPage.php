<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList;

use Twilio\Page;

class IpAddressPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new IpAddressInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['ipAccessControlListSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.IpAddressPage]';
    }
}