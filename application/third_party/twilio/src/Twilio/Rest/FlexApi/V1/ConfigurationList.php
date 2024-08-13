<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\ListResource;
use Twilio\Version;

class ConfigurationList extends ListResource {
    /**
     * Construct the ConfigurationList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\FlexApi\V1\ConfigurationList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a ConfigurationContext
     *
     * @return \Twilio\Rest\FlexApi\V1\ConfigurationContext
     */
    public function getContext() {
        return new ConfigurationContext($this->version);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.FlexApi.V1.ConfigurationList]';
    }
}