<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Autopilot\V1\Assistant\FieldType;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $accountSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $fieldTypeSid
 * @property string $language
 * @property string $assistantSid
 * @property string $sid
 * @property string $value
 * @property string $url
 * @property string $synonymOf
 */
class FieldValueInstance extends InstanceResource {
    /**
     * Initialize the FieldValueInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $assistantSid The SID of the Assistant that is the parent of
     *                             the FieldType associated with the resource
     * @param string $fieldTypeSid The SID of the Field Type associated with the
     *                             Field Value
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Autopilot\V1\Assistant\FieldType\FieldValueInstance
     */
    public function __construct(Version $version, array $payload, $assistantSid, $fieldTypeSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'fieldTypeSid' => Values::array_get($payload, 'field_type_sid'),
            'language' => Values::array_get($payload, 'language'),
            'assistantSid' => Values::array_get($payload, 'assistant_sid'),
            'sid' => Values::array_get($payload, 'sid'),
            'value' => Values::array_get($payload, 'value'),
            'url' => Values::array_get($payload, 'url'),
            'synonymOf' => Values::array_get($payload, 'synonym_of'),
        );

        $this->solution = array(
            'assistantSid' => $assistantSid,
            'fieldTypeSid' => $fieldTypeSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\FieldType\FieldValueContext Context for this FieldValueInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new FieldValueContext(
                $this->version,
                $this->solution['assistantSid'],
                $this->solution['fieldTypeSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a FieldValueInstance
     *
     * @return FieldValueInstance Fetched FieldValueInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the FieldValueInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
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
        return '[Twilio.Autopilot.V1.FieldValueInstance ' . implode(' ', $context) . ']';
    }
}