<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Conference;

use Twilio\Options;
use Twilio\Values;

abstract class RecordingOptions {
    /**
     * @param string $pauseBehavior Whether to record during a pause
     * @return UpdateRecordingOptions Options builder
     */
    public static function update($pauseBehavior = Values::NONE) {
        return new UpdateRecordingOptions($pauseBehavior);
    }

    /**
     * @param string $dateCreatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @param string $dateCreated The `YYYY-MM-DD` value of the resources to read
     * @param string $dateCreatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     * @return ReadRecordingOptions Options builder
     */
    public static function read($dateCreatedBefore = Values::NONE, $dateCreated = Values::NONE, $dateCreatedAfter = Values::NONE) {
        return new ReadRecordingOptions($dateCreatedBefore, $dateCreated, $dateCreatedAfter);
    }
}

class UpdateRecordingOptions extends Options {
    /**
     * @param string $pauseBehavior Whether to record during a pause
     */
    public function __construct($pauseBehavior = Values::NONE) {
        $this->options['pauseBehavior'] = $pauseBehavior;
    }

    /**
     * Whether to record during a pause. Can be: `skip` or `silence` and the default is `silence`. `skip` does not record during the pause period, while `silence` will replace the actual audio of the call with silence during the pause period. This parameter only applies when setting `status` is set to `paused`.
     *
     * @param string $pauseBehavior Whether to record during a pause
     * @return $this Fluent Builder
     */
    public function setPauseBehavior($pauseBehavior) {
        $this->options['pauseBehavior'] = $pauseBehavior;
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
        return '[Twilio.Api.V2010.UpdateRecordingOptions ' . implode(' ', $options) . ']';
    }
}

class ReadRecordingOptions extends Options {
    /**
     * @param string $dateCreatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @param string $dateCreated The `YYYY-MM-DD` value of the resources to read
     * @param string $dateCreatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     */
    public function __construct($dateCreatedBefore = Values::NONE, $dateCreated = Values::NONE, $dateCreatedAfter = Values::NONE) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
    }

    /**
     * The `date_created` value, specified as `YYYY-MM-DD`, of the resources to read. You can also specify inequality: `DateCreated<=YYYY-MM-DD` will return recordings generated at or before midnight on a given date, and `DateCreated>=YYYY-MM-DD` returns recordings generated at or after midnight on a date.
     *
     * @param string $dateCreatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @return $this Fluent Builder
     */
    public function setDateCreatedBefore($dateCreatedBefore) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        return $this;
    }

    /**
     * The `date_created` value, specified as `YYYY-MM-DD`, of the resources to read. You can also specify inequality: `DateCreated<=YYYY-MM-DD` will return recordings generated at or before midnight on a given date, and `DateCreated>=YYYY-MM-DD` returns recordings generated at or after midnight on a date.
     *
     * @param string $dateCreated The `YYYY-MM-DD` value of the resources to read
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The `date_created` value, specified as `YYYY-MM-DD`, of the resources to read. You can also specify inequality: `DateCreated<=YYYY-MM-DD` will return recordings generated at or before midnight on a given date, and `DateCreated>=YYYY-MM-DD` returns recordings generated at or after midnight on a date.
     *
     * @param string $dateCreatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     * @return $this Fluent Builder
     */
    public function setDateCreatedAfter($dateCreatedAfter) {
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
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
        return '[Twilio.Api.V2010.ReadRecordingOptions ' . implode(' ', $options) . ']';
    }
}