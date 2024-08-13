<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Notify\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class NotificationList extends ListResource {
    /**
     * Construct the NotificationList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @return \Twilio\Rest\Notify\V1\Service\NotificationList
     */
    public function __construct(Version $version, $serviceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Notifications';
    }

    /**
     * Create a new NotificationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return NotificationInstance Newly created NotificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'Identity' => Serialize::map($options['identity'], function($e) { return $e; }),
            'Tag' => Serialize::map($options['tag'], function($e) { return $e; }),
            'Body' => $options['body'],
            'Priority' => $options['priority'],
            'Ttl' => $options['ttl'],
            'Title' => $options['title'],
            'Sound' => $options['sound'],
            'Action' => $options['action'],
            'Data' => Serialize::jsonObject($options['data']),
            'Apn' => Serialize::jsonObject($options['apn']),
            'Gcm' => Serialize::jsonObject($options['gcm']),
            'Sms' => Serialize::jsonObject($options['sms']),
            'FacebookMessenger' => Serialize::jsonObject($options['facebookMessenger']),
            'Fcm' => Serialize::jsonObject($options['fcm']),
            'Segment' => Serialize::map($options['segment'], function($e) { return $e; }),
            'Alexa' => Serialize::jsonObject($options['alexa']),
            'ToBinding' => Serialize::map($options['toBinding'], function($e) { return $e; }),
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new NotificationInstance($this->version, $payload, $this->solution['serviceSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Notify.V1.NotificationList]';
    }
}