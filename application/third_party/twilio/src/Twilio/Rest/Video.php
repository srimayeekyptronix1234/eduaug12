<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Video\V1;

/**
 * @property \Twilio\Rest\Video\V1 $v1
 * @property \Twilio\Rest\Video\V1\CompositionList $compositions
 * @property \Twilio\Rest\Video\V1\CompositionHookList $compositionHooks
 * @property \Twilio\Rest\Video\V1\CompositionSettingsList $compositionSettings
 * @property \Twilio\Rest\Video\V1\RecordingList $recordings
 * @property \Twilio\Rest\Video\V1\RecordingSettingsList $recordingSettings
 * @property \Twilio\Rest\Video\V1\RoomList $rooms
 * @method \Twilio\Rest\Video\V1\CompositionContext compositions(string $sid)
 * @method \Twilio\Rest\Video\V1\CompositionHookContext compositionHooks(string $sid)
 * @method \Twilio\Rest\Video\V1\CompositionSettingsContext compositionSettings()
 * @method \Twilio\Rest\Video\V1\RecordingContext recordings(string $sid)
 * @method \Twilio\Rest\Video\V1\RecordingSettingsContext recordingSettings()
 * @method \Twilio\Rest\Video\V1\RoomContext rooms(string $sid)
 */
class Video extends Domain {
    protected $_v1 = null;

    /**
     * Construct the Video Domain
     *
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\Video Domain for Video
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://video.twilio.com';
    }

    /**
     * @return \Twilio\Rest\Video\V1 Version v1 of video
     */
    protected function getV1() {
        if (!$this->_v1) {
            $this->_v1 = new V1($this);
        }
        return $this->_v1;
    }

    /**
     * Magic getter to lazy load version
     *
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws TwilioException For unknown versions
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown version ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $method = 'context' . ucfirst($name);
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $arguments);
        }

        throw new TwilioException('Unknown context ' . $name);
    }

    /**
     * @return \Twilio\Rest\Video\V1\CompositionList
     */
    protected function getCompositions() {
        return $this->v1->compositions;
    }

    /**
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\CompositionContext
     */
    protected function contextCompositions($sid) {
        return $this->v1->compositions($sid);
    }

    /**
     * @return \Twilio\Rest\Video\V1\CompositionHookList
     */
    protected function getCompositionHooks() {
        return $this->v1->compositionHooks;
    }

    /**
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\CompositionHookContext
     */
    protected function contextCompositionHooks($sid) {
        return $this->v1->compositionHooks($sid);
    }

    /**
     * @return \Twilio\Rest\Video\V1\CompositionSettingsList
     */
    protected function getCompositionSettings() {
        return $this->v1->compositionSettings;
    }

    /**
     * @return \Twilio\Rest\Video\V1\CompositionSettingsContext
     */
    protected function contextCompositionSettings() {
        return $this->v1->compositionSettings();
    }

    /**
     * @return \Twilio\Rest\Video\V1\RecordingList
     */
    protected function getRecordings() {
        return $this->v1->recordings;
    }

    /**
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\RecordingContext
     */
    protected function contextRecordings($sid) {
        return $this->v1->recordings($sid);
    }

    /**
     * @return \Twilio\Rest\Video\V1\RecordingSettingsList
     */
    protected function getRecordingSettings() {
        return $this->v1->recordingSettings;
    }

    /**
     * @return \Twilio\Rest\Video\V1\RecordingSettingsContext
     */
    protected function contextRecordingSettings() {
        return $this->v1->recordingSettings();
    }

    /**
     * @return \Twilio\Rest\Video\V1\RoomList
     */
    protected function getRooms() {
        return $this->v1->rooms;
    }

    /**
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\RoomContext
     */
    protected function contextRooms($sid) {
        return $this->v1->rooms($sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Video]';
    }
}