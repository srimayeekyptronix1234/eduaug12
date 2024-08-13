<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $apiVersion
 * @property string $body
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property \DateTime $dateSent
 * @property string $direction
 * @property int $errorCode
 * @property string $errorMessage
 * @property string $from
 * @property string $messagingServiceSid
 * @property string $numMedia
 * @property string $numSegments
 * @property string $price
 * @property string $priceUnit
 * @property string $sid
 * @property string $status
 * @property array $subresourceUris
 * @property string $to
 * @property string $uri
 */
class MessageInstance extends InstanceResource {
    protected $_media = null;
    protected $_feedback = null;

    /**
     * Initialize the MessageInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the Account that created the resource
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Api\V2010\Account\MessageInstance
     */
    public function __construct(Version $version, array $payload, $accountSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'apiVersion' => Values::array_get($payload, 'api_version'),
            'body' => Values::array_get($payload, 'body'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'dateSent' => Deserialize::dateTime(Values::array_get($payload, 'date_sent')),
            'direction' => Values::array_get($payload, 'direction'),
            'errorCode' => Values::array_get($payload, 'error_code'),
            'errorMessage' => Values::array_get($payload, 'error_message'),
            'from' => Values::array_get($payload, 'from'),
            'messagingServiceSid' => Values::array_get($payload, 'messaging_service_sid'),
            'numMedia' => Values::array_get($payload, 'num_media'),
            'numSegments' => Values::array_get($payload, 'num_segments'),
            'price' => Values::array_get($payload, 'price'),
            'priceUnit' => Values::array_get($payload, 'price_unit'),
            'sid' => Values::array_get($payload, 'sid'),
            'status' => Values::array_get($payload, 'status'),
            'subresourceUris' => Values::array_get($payload, 'subresource_uris'),
            'to' => Values::array_get($payload, 'to'),
            'uri' => Values::array_get($payload, 'uri'),
        );

        $this->solution = array('accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Api\V2010\Account\MessageContext Context for this
     *                                                       MessageInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new MessageContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Deletes the MessageInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Fetch a MessageInstance
     *
     * @return MessageInstance Fetched MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the MessageInstance
     *
     * @param string $body The text of the message you want to send
     * @return MessageInstance Updated MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($body) {
        return $this->proxy()->update($body);
    }

    /**
     * Access the media
     *
     * @return \Twilio\Rest\Api\V2010\Account\Message\MediaList
     */
    protected function getMedia() {
        return $this->proxy()->media;
    }

    /**
     * Access the feedback
     *
     * @return \Twilio\Rest\Api\V2010\Account\Message\FeedbackList
     */
    protected function getFeedback() {
        return $this->proxy()->feedback;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.MessageInstance ' . implode(' ', $context) . ']';
    }
}