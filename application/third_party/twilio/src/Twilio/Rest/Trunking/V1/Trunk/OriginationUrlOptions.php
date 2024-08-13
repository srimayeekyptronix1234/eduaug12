<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Options;
use Twilio\Values;

abstract class OriginationUrlOptions {
    /**
     * @param int $weight The value that determines the relative load the URI
     *                    should receive compared to others with the same priority
     * @param int $priority The relative importance of the URI
     * @param bool $enabled Whether the URL is enabled
     * @param string $friendlyName A string to describe the resource
     * @param string $sipUrl The SIP address you want Twilio to route your
     *                       Origination calls to
     * @return UpdateOriginationUrlOptions Options builder
     */
    public static function update($weight = Values::NONE, $priority = Values::NONE, $enabled = Values::NONE, $friendlyName = Values::NONE, $sipUrl = Values::NONE) {
        return new UpdateOriginationUrlOptions($weight, $priority, $enabled, $friendlyName, $sipUrl);
    }
}

class UpdateOriginationUrlOptions extends Options {
    /**
     * @param int $weight The value that determines the relative load the URI
     *                    should receive compared to others with the same priority
     * @param int $priority The relative importance of the URI
     * @param bool $enabled Whether the URL is enabled
     * @param string $friendlyName A string to describe the resource
     * @param string $sipUrl The SIP address you want Twilio to route your
     *                       Origination calls to
     */
    public function __construct($weight = Values::NONE, $priority = Values::NONE, $enabled = Values::NONE, $friendlyName = Values::NONE, $sipUrl = Values::NONE) {
        $this->options['weight'] = $weight;
        $this->options['priority'] = $priority;
        $this->options['enabled'] = $enabled;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['sipUrl'] = $sipUrl;
    }

    /**
     * The value that determines the relative share of the load the URI should receive compared to other URIs with the same priority. Can be an integer from 1 to 65535, inclusive, and the default is 10. URLs with higher values receive more load than those with lower ones with the same priority.
     *
     * @param int $weight The value that determines the relative load the URI
     *                    should receive compared to others with the same priority
     * @return $this Fluent Builder
     */
    public function setWeight($weight) {
        $this->options['weight'] = $weight;
        return $this;
    }

    /**
     * The relative importance of the URI. Can be an integer from 0 to 65535, inclusive, and the default is 10. The lowest number represents the most important URI.
     *
     * @param int $priority The relative importance of the URI
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * Whether the URL is enabled. The default is `true`.
     *
     * @param bool $enabled Whether the URL is enabled
     * @return $this Fluent Builder
     */
    public function setEnabled($enabled) {
        $this->options['enabled'] = $enabled;
        return $this;
    }

    /**
     * A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The SIP address you want Twilio to route your Origination calls to. This must be a `sip:` schema. `sips` is NOT supported.
     *
     * @param string $sipUrl The SIP address you want Twilio to route your
     *                       Origination calls to
     * @return $this Fluent Builder
     */
    public function setSipUrl($sipUrl) {
        $this->options['sipUrl'] = $sipUrl;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Trunking.V1.UpdateOriginationUrlOptions ' . implode(' ', $options) . ']';
    }
}