<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Understand\Assistant;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class QueryOptions {
    /**
     * @param string $language An ISO language-country string of the sample.
     * @param string $modelBuild The Model Build Sid or unique name of the Model
     *                           Build to be queried.
     * @param string $status A string that described the query status. The values
     *                       can be: pending_review, reviewed, discarded
     * @return ReadQueryOptions Options builder
     */
    public static function read($language = Values::NONE, $modelBuild = Values::NONE, $status = Values::NONE) {
        return new ReadQueryOptions($language, $modelBuild, $status);
    }

    /**
     * @param string $tasks Constraints the query to a set of tasks. Useful when
     *                      you need to constrain the paths the user can take.
     *                      Tasks should be comma separated task-unique-name-1,
     *                      task-unique-name-2
     * @param string $modelBuild The Model Build Sid or unique name of the Model
     *                           Build to be queried.
     * @param string $field Constraints the query to a given Field with an task.
     *                      Useful when you know the Field you are expecting. It
     *                      accepts one field in the format
     *                      task-unique-name-1:field-unique-name
     * @return CreateQueryOptions Options builder
     */
    public static function create($tasks = Values::NONE, $modelBuild = Values::NONE, $field = Values::NONE) {
        return new CreateQueryOptions($tasks, $modelBuild, $field);
    }

    /**
     * @param string $sampleSid An optional reference to the Sample created from
     *                          this query.
     * @param string $status A string that described the query status. The values
     *                       can be: pending_review, reviewed, discarded
     * @return UpdateQueryOptions Options builder
     */
    public static function update($sampleSid = Values::NONE, $status = Values::NONE) {
        return new UpdateQueryOptions($sampleSid, $status);
    }
}

class ReadQueryOptions extends Options {
    /**
     * @param string $language An ISO language-country string of the sample.
     * @param string $modelBuild The Model Build Sid or unique name of the Model
     *                           Build to be queried.
     * @param string $status A string that described the query status. The values
     *                       can be: pending_review, reviewed, discarded
     */
    public function __construct($language = Values::NONE, $modelBuild = Values::NONE, $status = Values::NONE) {
        $this->options['language'] = $language;
        $this->options['modelBuild'] = $modelBuild;
        $this->options['status'] = $status;
    }

    /**
     * An ISO language-country string of the sample.
     *
     * @param string $language An ISO language-country string of the sample.
     * @return $this Fluent Builder
     */
    public function setLanguage($language) {
        $this->options['language'] = $language;
        return $this;
    }

    /**
     * The Model Build Sid or unique name of the Model Build to be queried.
     *
     * @param string $modelBuild The Model Build Sid or unique name of the Model
     *                           Build to be queried.
     * @return $this Fluent Builder
     */
    public function setModelBuild($modelBuild) {
        $this->options['modelBuild'] = $modelBuild;
        return $this;
    }

    /**
     * A string that described the query status. The values can be: pending_review, reviewed, discarded
     *
     * @param string $status A string that described the query status. The values
     *                       can be: pending_review, reviewed, discarded
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
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
        return '[Twilio.Preview.Understand.ReadQueryOptions ' . implode(' ', $options) . ']';
    }
}

class CreateQueryOptions extends Options {
    /**
     * @param string $tasks Constraints the query to a set of tasks. Useful when
     *                      you need to constrain the paths the user can take.
     *                      Tasks should be comma separated task-unique-name-1,
     *                      task-unique-name-2
     * @param string $modelBuild The Model Build Sid or unique name of the Model
     *                           Build to be queried.
     * @param string $field Constraints the query to a given Field with an task.
     *                      Useful when you know the Field you are expecting. It
     *                      accepts one field in the format
     *                      task-unique-name-1:field-unique-name
     */
    public function __construct($tasks = Values::NONE, $modelBuild = Values::NONE, $field = Values::NONE) {
        $this->options['tasks'] = $tasks;
        $this->options['modelBuild'] = $modelBuild;
        $this->options['field'] = $field;
    }

    /**
     * Constraints the query to a set of tasks. Useful when you need to constrain the paths the user can take. Tasks should be comma separated *task-unique-name-1*, *task-unique-name-2*
     *
     * @param string $tasks Constraints the query to a set of tasks. Useful when
     *                      you need to constrain the paths the user can take.
     *                      Tasks should be comma separated task-unique-name-1,
     *                      task-unique-name-2
     * @return $this Fluent Builder
     */
    public function setTasks($tasks) {
        $this->options['tasks'] = $tasks;
        return $this;
    }

    /**
     * The Model Build Sid or unique name of the Model Build to be queried.
     *
     * @param string $modelBuild The Model Build Sid or unique name of the Model
     *                           Build to be queried.
     * @return $this Fluent Builder
     */
    public function setModelBuild($modelBuild) {
        $this->options['modelBuild'] = $modelBuild;
        return $this;
    }

    /**
     * Constraints the query to a given Field with an task. Useful when you know the Field you are expecting. It accepts one field in the format *task-unique-name-1*:*field-unique-name*
     *
     * @param string $field Constraints the query to a given Field with an task.
     *                      Useful when you know the Field you are expecting. It
     *                      accepts one field in the format
     *                      task-unique-name-1:field-unique-name
     * @return $this Fluent Builder
     */
    public function setField($field) {
        $this->options['field'] = $field;
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
        return '[Twilio.Preview.Understand.CreateQueryOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateQueryOptions extends Options {
    /**
     * @param string $sampleSid An optional reference to the Sample created from
     *                          this query.
     * @param string $status A string that described the query status. The values
     *                       can be: pending_review, reviewed, discarded
     */
    public function __construct($sampleSid = Values::NONE, $status = Values::NONE) {
        $this->options['sampleSid'] = $sampleSid;
        $this->options['status'] = $status;
    }

    /**
     * An optional reference to the Sample created from this query.
     *
     * @param string $sampleSid An optional reference to the Sample created from
     *                          this query.
     * @return $this Fluent Builder
     */
    public function setSampleSid($sampleSid) {
        $this->options['sampleSid'] = $sampleSid;
        return $this;
    }

    /**
     * A string that described the query status. The values can be: pending_review, reviewed, discarded
     *
     * @param string $status A string that described the query status. The values
     *                       can be: pending_review, reviewed, discarded
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
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
        return '[Twilio.Preview.Understand.UpdateQueryOptions ' . implode(' ', $options) . ']';
    }
}