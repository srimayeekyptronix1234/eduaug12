<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Stream extends TwiML {
    /**
     * Stream constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array()) {
        parent::__construct('Stream', null, $attributes);
    }

    /**
     * Add Parameter child.
     *
     * @param array $attributes Optional attributes
     * @return Parameter Child element.
     */
    public function parameter($attributes = array()) {
        return $this->nest(new Parameter($attributes));
    }

    /**
     * Add Name attribute.
     *
     * @param string $name Friendly name given to the Stream
     * @return static $this.
     */
    public function setName($name) {
        return $this->setAttribute('name', $name);
    }

    /**
     * Add ConnectorName attribute.
     *
     * @param string $connectorName Unique name for Stream Connector
     * @return static $this.
     */
    public function setConnectorName($connectorName) {
        return $this->setAttribute('connectorName', $connectorName);
    }

    /**
     * Add Url attribute.
     *
     * @param string $url URL of the remote service where the Stream is routed
     * @return static $this.
     */
    public function setUrl($url) {
        return $this->setAttribute('url', $url);
    }

    /**
     * Add Track attribute.
     *
     * @param string $track Track to be streamed to remote service
     * @return static $this.
     */
    public function setTrack($track) {
        return $this->setAttribute('track', $track);
    }
}