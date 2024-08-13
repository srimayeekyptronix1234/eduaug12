<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Wireless\V1\Sim;

use Twilio\Options;
use Twilio\Values;

abstract class UsageRecordOptions {
    /**
     * @param \DateTime $end Only include usage that occurred on or before this date
     * @param \DateTime $start Only include usage that has occurred on or after
     *                         this date
     * @param string $granularity The time-based grouping that results are
     *                            aggregated by
     * @return ReadUsageRecordOptions Options builder
     */
    public static function read($end = Values::NONE, $start = Values::NONE, $granularity = Values::NONE) {
        return new ReadUsageRecordOptions($end, $start, $granularity);
    }
}

class ReadUsageRecordOptions extends Options {
    /**
     * @param \DateTime $end Only include usage that occurred on or before this date
     * @param \DateTime $start Only include usage that has occurred on or after
     *                         this date
     * @param string $granularity The time-based grouping that results are
     *                            aggregated by
     */
    public function __construct($end = Values::NONE, $start = Values::NONE, $granularity = Values::NONE) {
        $this->options['end'] = $end;
        $this->options['start'] = $start;
        $this->options['granularity'] = $granularity;
    }

    /**
     * Only include usage that occurred on or before this date, specified in [ISO 8601](https://www.iso.org/iso-8601-date-and-time-format.html). The default is the current time.
     *
     * @param \DateTime $end Only include usage that occurred on or before this date
     * @return $this Fluent Builder
     */
    public function setEnd($end) {
        $this->options['end'] = $end;
        return $this;
    }

    /**
     * Only include usage that has occurred on or after this date, specified in [ISO 8601](https://www.iso.org/iso-8601-date-and-time-format.html). The default is on month before the `end` parameter value.
     *
     * @param \DateTime $start Only include usage that has occurred on or after
     *                         this date
     * @return $this Fluent Builder
     */
    public function setStart($start) {
        $this->options['start'] = $start;
        return $this;
    }

    /**
     * How to summarize the usage by time. Can be: `daily`, `hourly`, or `all`. The default is `all`. A value of `all` returns one Usage Record that describes the usage for the entire period.
     *
     * @param string $granularity The time-based grouping that results are
     *                            aggregated by
     * @return $this Fluent Builder
     */
    public function setGranularity($granularity) {
        $this->options['granularity'] = $granularity;
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
        return '[Twilio.Wireless.V1.ReadUsageRecordOptions ' . implode(' ', $options) . ']';
    }
}