<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\Options;
use Twilio\Values;

abstract class WorkersStatisticsOptions {
    /**
     * @param int $minutes Only calculate statistics since this many minutes in the
     *                     past
     * @param \DateTime $startDate Only calculate statistics from on or after this
     *                             date
     * @param \DateTime $endDate Only calculate statistics from this date and time
     *                           and earlier
     * @param string $taskQueueSid The SID of the TaskQueue for which to fetch
     *                             Worker statistics
     * @param string $taskQueueName The friendly_name of the TaskQueue for which to
     *                              fetch Worker statistics
     * @param string $friendlyName Only include Workers with `friendly_name` values
     *                             that match this parameter
     * @param string $taskChannel Only calculate statistics on this TaskChannel
     * @return FetchWorkersStatisticsOptions Options builder
     */
    public static function fetch($minutes = Values::NONE, $startDate = Values::NONE, $endDate = Values::NONE, $taskQueueSid = Values::NONE, $taskQueueName = Values::NONE, $friendlyName = Values::NONE, $taskChannel = Values::NONE) {
        return new FetchWorkersStatisticsOptions($minutes, $startDate, $endDate, $taskQueueSid, $taskQueueName, $friendlyName, $taskChannel);
    }
}

class FetchWorkersStatisticsOptions extends Options {
    /**
     * @param int $minutes Only calculate statistics since this many minutes in the
     *                     past
     * @param \DateTime $startDate Only calculate statistics from on or after this
     *                             date
     * @param \DateTime $endDate Only calculate statistics from this date and time
     *                           and earlier
     * @param string $taskQueueSid The SID of the TaskQueue for which to fetch
     *                             Worker statistics
     * @param string $taskQueueName The friendly_name of the TaskQueue for which to
     *                              fetch Worker statistics
     * @param string $friendlyName Only include Workers with `friendly_name` values
     *                             that match this parameter
     * @param string $taskChannel Only calculate statistics on this TaskChannel
     */
    public function __construct($minutes = Values::NONE, $startDate = Values::NONE, $endDate = Values::NONE, $taskQueueSid = Values::NONE, $taskQueueName = Values::NONE, $friendlyName = Values::NONE, $taskChannel = Values::NONE) {
        $this->options['minutes'] = $minutes;
        $this->options['startDate'] = $startDate;
        $this->options['endDate'] = $endDate;
        $this->options['taskQueueSid'] = $taskQueueSid;
        $this->options['taskQueueName'] = $taskQueueName;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['taskChannel'] = $taskChannel;
    }

    /**
     * Only calculate statistics since this many minutes in the past. The default 15 minutes. This is helpful for displaying statistics for the last 15 minutes, 240 minutes (4 hours), and 480 minutes (8 hours) to see trends.
     *
     * @param int $minutes Only calculate statistics since this many minutes in the
     *                     past
     * @return $this Fluent Builder
     */
    public function setMinutes($minutes) {
        $this->options['minutes'] = $minutes;
        return $this;
    }

    /**
     * Only calculate statistics from this date and time and later, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $startDate Only calculate statistics from on or after this
     *                             date
     * @return $this Fluent Builder
     */
    public function setStartDate($startDate) {
        $this->options['startDate'] = $startDate;
        return $this;
    }

    /**
     * Only calculate statistics from this date and time and earlier, specified in GMT as an [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date-time.
     *
     * @param \DateTime $endDate Only calculate statistics from this date and time
     *                           and earlier
     * @return $this Fluent Builder
     */
    public function setEndDate($endDate) {
        $this->options['endDate'] = $endDate;
        return $this;
    }

    /**
     * The SID of the TaskQueue for which to fetch Worker statistics.
     *
     * @param string $taskQueueSid The SID of the TaskQueue for which to fetch
     *                             Worker statistics
     * @return $this Fluent Builder
     */
    public function setTaskQueueSid($taskQueueSid) {
        $this->options['taskQueueSid'] = $taskQueueSid;
        return $this;
    }

    /**
     * The `friendly_name` of the TaskQueue for which to fetch Worker statistics.
     *
     * @param string $taskQueueName The friendly_name of the TaskQueue for which to
     *                              fetch Worker statistics
     * @return $this Fluent Builder
     */
    public function setTaskQueueName($taskQueueName) {
        $this->options['taskQueueName'] = $taskQueueName;
        return $this;
    }

    /**
     * Only include Workers with `friendly_name` values that match this parameter.
     *
     * @param string $friendlyName Only include Workers with `friendly_name` values
     *                             that match this parameter
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Only calculate statistics on this TaskChannel. Can be the TaskChannel's SID or its `unique_name`, such as `voice`, `sms`, or `default`.
     *
     * @param string $taskChannel Only calculate statistics on this TaskChannel
     * @return $this Fluent Builder
     */
    public function setTaskChannel($taskChannel) {
        $this->options['taskChannel'] = $taskChannel;
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
        return '[Twilio.Taskrouter.V1.FetchWorkersStatisticsOptions ' . implode(' ', $options) . ']';
    }
}