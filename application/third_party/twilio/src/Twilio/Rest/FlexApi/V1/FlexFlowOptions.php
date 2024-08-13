<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Options;
use Twilio\Values;

abstract class FlexFlowOptions {
    /**
     * @param string $friendlyName The `friendly_name` of the FlexFlow resources to
     *                             read
     * @return ReadFlexFlowOptions Options builder
     */
    public static function read($friendlyName = Values::NONE) {
        return new ReadFlexFlowOptions($friendlyName);
    }

    /**
     * @param string $contactIdentity The channel contact's Identity
     * @param bool $enabled Whether the new FlexFlow is enabled
     * @param string $integrationType The integration type
     * @param string $integrationFlowSid The SID of the Flow
     * @param string $integrationUrl The External Webhook URL
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @param string $integrationChannel The task channel for a new task
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @param int $integrationPriority The task priority of a new task
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @param bool $longLived Whether new channels are long-lived
     * @param bool $janitorEnabled Boolean flag for enabling or disabling the
     *                             Janitor
     * @return CreateFlexFlowOptions Options builder
     */
    public static function create($contactIdentity = Values::NONE, $enabled = Values::NONE, $integrationType = Values::NONE, $integrationFlowSid = Values::NONE, $integrationUrl = Values::NONE, $integrationWorkspaceSid = Values::NONE, $integrationWorkflowSid = Values::NONE, $integrationChannel = Values::NONE, $integrationTimeout = Values::NONE, $integrationPriority = Values::NONE, $integrationCreationOnMessage = Values::NONE, $longLived = Values::NONE, $janitorEnabled = Values::NONE) {
        return new CreateFlexFlowOptions($contactIdentity, $enabled, $integrationType, $integrationFlowSid, $integrationUrl, $integrationWorkspaceSid, $integrationWorkflowSid, $integrationChannel, $integrationTimeout, $integrationPriority, $integrationCreationOnMessage, $longLived, $janitorEnabled);
    }

    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $chatServiceSid The SID of the chat service
     * @param string $channelType The channel type
     * @param string $contactIdentity The channel contact's Identity
     * @param bool $enabled Whether the FlexFlow is enabled
     * @param string $integrationType The integration type
     * @param string $integrationFlowSid The SID of the Flow
     * @param string $integrationUrl The External Webhook URL
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @param string $integrationChannel task channel for a new task
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @param int $integrationPriority The task priority of a new task
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @param bool $longLived Whether new channels created are long-lived
     * @param bool $janitorEnabled Boolean flag for enabling or disabling the
     *                             Janitor
     * @return UpdateFlexFlowOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $chatServiceSid = Values::NONE, $channelType = Values::NONE, $contactIdentity = Values::NONE, $enabled = Values::NONE, $integrationType = Values::NONE, $integrationFlowSid = Values::NONE, $integrationUrl = Values::NONE, $integrationWorkspaceSid = Values::NONE, $integrationWorkflowSid = Values::NONE, $integrationChannel = Values::NONE, $integrationTimeout = Values::NONE, $integrationPriority = Values::NONE, $integrationCreationOnMessage = Values::NONE, $longLived = Values::NONE, $janitorEnabled = Values::NONE) {
        return new UpdateFlexFlowOptions($friendlyName, $chatServiceSid, $channelType, $contactIdentity, $enabled, $integrationType, $integrationFlowSid, $integrationUrl, $integrationWorkspaceSid, $integrationWorkflowSid, $integrationChannel, $integrationTimeout, $integrationPriority, $integrationCreationOnMessage, $longLived, $janitorEnabled);
    }
}

class ReadFlexFlowOptions extends Options {
    /**
     * @param string $friendlyName The `friendly_name` of the FlexFlow resources to
     *                             read
     */
    public function __construct($friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The `friendly_name` of the FlexFlow resources to read.
     *
     * @param string $friendlyName The `friendly_name` of the FlexFlow resources to
     *                             read
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.FlexApi.V1.ReadFlexFlowOptions ' . implode(' ', $options) . ']';
    }
}

class CreateFlexFlowOptions extends Options {
    /**
     * @param string $contactIdentity The channel contact's Identity
     * @param bool $enabled Whether the new FlexFlow is enabled
     * @param string $integrationType The integration type
     * @param string $integrationFlowSid The SID of the Flow
     * @param string $integrationUrl The External Webhook URL
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @param string $integrationChannel The task channel for a new task
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @param int $integrationPriority The task priority of a new task
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @param bool $longLived Whether new channels are long-lived
     * @param bool $janitorEnabled Boolean flag for enabling or disabling the
     *                             Janitor
     */
    public function __construct($contactIdentity = Values::NONE, $enabled = Values::NONE, $integrationType = Values::NONE, $integrationFlowSid = Values::NONE, $integrationUrl = Values::NONE, $integrationWorkspaceSid = Values::NONE, $integrationWorkflowSid = Values::NONE, $integrationChannel = Values::NONE, $integrationTimeout = Values::NONE, $integrationPriority = Values::NONE, $integrationCreationOnMessage = Values::NONE, $longLived = Values::NONE, $janitorEnabled = Values::NONE) {
        $this->options['contactIdentity'] = $contactIdentity;
        $this->options['enabled'] = $enabled;
        $this->options['integrationType'] = $integrationType;
        $this->options['integrationFlowSid'] = $integrationFlowSid;
        $this->options['integrationUrl'] = $integrationUrl;
        $this->options['integrationWorkspaceSid'] = $integrationWorkspaceSid;
        $this->options['integrationWorkflowSid'] = $integrationWorkflowSid;
        $this->options['integrationChannel'] = $integrationChannel;
        $this->options['integrationTimeout'] = $integrationTimeout;
        $this->options['integrationPriority'] = $integrationPriority;
        $this->options['integrationCreationOnMessage'] = $integrationCreationOnMessage;
        $this->options['longLived'] = $longLived;
        $this->options['janitorEnabled'] = $janitorEnabled;
    }

    /**
     * The channel contact's Identity.
     *
     * @param string $contactIdentity The channel contact's Identity
     * @return $this Fluent Builder
     */
    public function setContactIdentity($contactIdentity) {
        $this->options['contactIdentity'] = $contactIdentity;
        return $this;
    }

    /**
     * Whether the new FlexFlow is enabled.
     *
     * @param bool $enabled Whether the new FlexFlow is enabled
     * @return $this Fluent Builder
     */
    public function setEnabled($enabled) {
        $this->options['enabled'] = $enabled;
        return $this;
    }

    /**
     * The integration type. Can be: `studio`, `external`, or `task`.
     *
     * @param string $integrationType The integration type
     * @return $this Fluent Builder
     */
    public function setIntegrationType($integrationType) {
        $this->options['integrationType'] = $integrationType;
        return $this;
    }

    /**
     * The SID of the Flow when `integration_type` is `studio`.
     *
     * @param string $integrationFlowSid The SID of the Flow
     * @return $this Fluent Builder
     */
    public function setIntegrationFlowSid($integrationFlowSid) {
        $this->options['integrationFlowSid'] = $integrationFlowSid;
        return $this;
    }

    /**
     * The External Webhook URL when `integration_type` is `external`.
     *
     * @param string $integrationUrl The External Webhook URL
     * @return $this Fluent Builder
     */
    public function setIntegrationUrl($integrationUrl) {
        $this->options['integrationUrl'] = $integrationUrl;
        return $this;
    }

    /**
     * The Workspace SID for a new task for Task `integration_type`.
     *
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationWorkspaceSid($integrationWorkspaceSid) {
        $this->options['integrationWorkspaceSid'] = $integrationWorkspaceSid;
        return $this;
    }

    /**
     * The Workflow SID for a new task when `integration_type` is `task`.
     *
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationWorkflowSid($integrationWorkflowSid) {
        $this->options['integrationWorkflowSid'] = $integrationWorkflowSid;
        return $this;
    }

    /**
     * The task channel for a new task when `integration_type` is `task`. The default is `default`.
     *
     * @param string $integrationChannel The task channel for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationChannel($integrationChannel) {
        $this->options['integrationChannel'] = $integrationChannel;
        return $this;
    }

    /**
     * The task timeout in seconds for a new task when `integration_type` is `task`. The default is `86,400` seconds (24 hours).
     *
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationTimeout($integrationTimeout) {
        $this->options['integrationTimeout'] = $integrationTimeout;
        return $this;
    }

    /**
     * The task priority of a new task when `integration_type` is `task`. The default priority is `0`.
     *
     * @param int $integrationPriority The task priority of a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationPriority($integrationPriority) {
        $this->options['integrationPriority'] = $integrationPriority;
        return $this;
    }

    /**
     * Whether to create a task when the first message arrives when `integration_type` is `task`. If `false`, the task is created with the channel.
     *
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @return $this Fluent Builder
     */
    public function setIntegrationCreationOnMessage($integrationCreationOnMessage) {
        $this->options['integrationCreationOnMessage'] = $integrationCreationOnMessage;
        return $this;
    }

    /**
     * Whether new channels are long-lived.
     *
     * @param bool $longLived Whether new channels are long-lived
     * @return $this Fluent Builder
     */
    public function setLongLived($longLived) {
        $this->options['longLived'] = $longLived;
        return $this;
    }

    /**
     * Boolean flag for enabling or disabling the Janitor
     *
     * @param bool $janitorEnabled Boolean flag for enabling or disabling the
     *                             Janitor
     * @return $this Fluent Builder
     */
    public function setJanitorEnabled($janitorEnabled) {
        $this->options['janitorEnabled'] = $janitorEnabled;
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
        return '[Twilio.FlexApi.V1.CreateFlexFlowOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateFlexFlowOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $chatServiceSid The SID of the chat service
     * @param string $channelType The channel type
     * @param string $contactIdentity The channel contact's Identity
     * @param bool $enabled Whether the FlexFlow is enabled
     * @param string $integrationType The integration type
     * @param string $integrationFlowSid The SID of the Flow
     * @param string $integrationUrl The External Webhook URL
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @param string $integrationChannel task channel for a new task
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @param int $integrationPriority The task priority of a new task
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @param bool $longLived Whether new channels created are long-lived
     * @param bool $janitorEnabled Boolean flag for enabling or disabling the
     *                             Janitor
     */
    public function __construct($friendlyName = Values::NONE, $chatServiceSid = Values::NONE, $channelType = Values::NONE, $contactIdentity = Values::NONE, $enabled = Values::NONE, $integrationType = Values::NONE, $integrationFlowSid = Values::NONE, $integrationUrl = Values::NONE, $integrationWorkspaceSid = Values::NONE, $integrationWorkflowSid = Values::NONE, $integrationChannel = Values::NONE, $integrationTimeout = Values::NONE, $integrationPriority = Values::NONE, $integrationCreationOnMessage = Values::NONE, $longLived = Values::NONE, $janitorEnabled = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['chatServiceSid'] = $chatServiceSid;
        $this->options['channelType'] = $channelType;
        $this->options['contactIdentity'] = $contactIdentity;
        $this->options['enabled'] = $enabled;
        $this->options['integrationType'] = $integrationType;
        $this->options['integrationFlowSid'] = $integrationFlowSid;
        $this->options['integrationUrl'] = $integrationUrl;
        $this->options['integrationWorkspaceSid'] = $integrationWorkspaceSid;
        $this->options['integrationWorkflowSid'] = $integrationWorkflowSid;
        $this->options['integrationChannel'] = $integrationChannel;
        $this->options['integrationTimeout'] = $integrationTimeout;
        $this->options['integrationPriority'] = $integrationPriority;
        $this->options['integrationCreationOnMessage'] = $integrationCreationOnMessage;
        $this->options['longLived'] = $longLived;
        $this->options['janitorEnabled'] = $janitorEnabled;
    }

    /**
     * A descriptive string that you create to describe the FlexFlow resource.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The SID of the chat service.
     *
     * @param string $chatServiceSid The SID of the chat service
     * @return $this Fluent Builder
     */
    public function setChatServiceSid($chatServiceSid) {
        $this->options['chatServiceSid'] = $chatServiceSid;
        return $this;
    }

    /**
     * The channel type. Can be: `web`, `facebook`, or `sms`.
     *
     * @param string $channelType The channel type
     * @return $this Fluent Builder
     */
    public function setChannelType($channelType) {
        $this->options['channelType'] = $channelType;
        return $this;
    }

    /**
     * The channel contact's Identity.
     *
     * @param string $contactIdentity The channel contact's Identity
     * @return $this Fluent Builder
     */
    public function setContactIdentity($contactIdentity) {
        $this->options['contactIdentity'] = $contactIdentity;
        return $this;
    }

    /**
     * Whether the FlexFlow is enabled.
     *
     * @param bool $enabled Whether the FlexFlow is enabled
     * @return $this Fluent Builder
     */
    public function setEnabled($enabled) {
        $this->options['enabled'] = $enabled;
        return $this;
    }

    /**
     * The integration type. Can be: `studio`, `external`, or `task`.
     *
     * @param string $integrationType The integration type
     * @return $this Fluent Builder
     */
    public function setIntegrationType($integrationType) {
        $this->options['integrationType'] = $integrationType;
        return $this;
    }

    /**
     * The SID of the Flow when `integration_type` is `studio`.
     *
     * @param string $integrationFlowSid The SID of the Flow
     * @return $this Fluent Builder
     */
    public function setIntegrationFlowSid($integrationFlowSid) {
        $this->options['integrationFlowSid'] = $integrationFlowSid;
        return $this;
    }

    /**
     * The External Webhook URL when `integration_type` is `external`.
     *
     * @param string $integrationUrl The External Webhook URL
     * @return $this Fluent Builder
     */
    public function setIntegrationUrl($integrationUrl) {
        $this->options['integrationUrl'] = $integrationUrl;
        return $this;
    }

    /**
     * The Workspace SID for a new task when `integration_type` is `task`.
     *
     * @param string $integrationWorkspaceSid The Workspace SID for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationWorkspaceSid($integrationWorkspaceSid) {
        $this->options['integrationWorkspaceSid'] = $integrationWorkspaceSid;
        return $this;
    }

    /**
     * The Workflow SID for a new task when `integration_type` is `task`.
     *
     * @param string $integrationWorkflowSid The Workflow SID for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationWorkflowSid($integrationWorkflowSid) {
        $this->options['integrationWorkflowSid'] = $integrationWorkflowSid;
        return $this;
    }

    /**
     * The task channel for a new task when `integration_type` is `task`. The default is `default`.
     *
     * @param string $integrationChannel task channel for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationChannel($integrationChannel) {
        $this->options['integrationChannel'] = $integrationChannel;
        return $this;
    }

    /**
     * The task timeout in seconds for a new task when `integration_type` is `task`. The default is `86,400` seconds (24 hours).
     *
     * @param int $integrationTimeout The task timeout in seconds for a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationTimeout($integrationTimeout) {
        $this->options['integrationTimeout'] = $integrationTimeout;
        return $this;
    }

    /**
     * The task priority of a new task when `integration_type` is `task`. The default priority is `0`.
     *
     * @param int $integrationPriority The task priority of a new task
     * @return $this Fluent Builder
     */
    public function setIntegrationPriority($integrationPriority) {
        $this->options['integrationPriority'] = $integrationPriority;
        return $this;
    }

    /**
     * Whether to create a task when the first message arrives when `integration_type` is `task`. If `false`, the task is created with the channel.
     *
     * @param bool $integrationCreationOnMessage Whether to create a task when the
     *                                           first message arrives
     * @return $this Fluent Builder
     */
    public function setIntegrationCreationOnMessage($integrationCreationOnMessage) {
        $this->options['integrationCreationOnMessage'] = $integrationCreationOnMessage;
        return $this;
    }

    /**
     * Whether new channels created are long-lived.
     *
     * @param bool $longLived Whether new channels created are long-lived
     * @return $this Fluent Builder
     */
    public function setLongLived($longLived) {
        $this->options['longLived'] = $longLived;
        return $this;
    }

    /**
     * Boolean flag for enabling or disabling the Janitor
     *
     * @param bool $janitorEnabled Boolean flag for enabling or disabling the
     *                             Janitor
     * @return $this Fluent Builder
     */
    public function setJanitorEnabled($janitorEnabled) {
        $this->options['janitorEnabled'] = $janitorEnabled;
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
        return '[Twilio.FlexApi.V1.UpdateFlexFlowOptions ' . implode(' ', $options) . ']';
    }
}