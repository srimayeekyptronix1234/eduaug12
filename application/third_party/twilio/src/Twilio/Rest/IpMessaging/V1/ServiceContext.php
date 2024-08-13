<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\IpMessaging\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\IpMessaging\V1\Service\ChannelList;
use Twilio\Rest\IpMessaging\V1\Service\RoleList;
use Twilio\Rest\IpMessaging\V1\Service\UserList;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\IpMessaging\V1\Service\ChannelList $channels
 * @property \Twilio\Rest\IpMessaging\V1\Service\RoleList $roles
 * @property \Twilio\Rest\IpMessaging\V1\Service\UserList $users
 * @method \Twilio\Rest\IpMessaging\V1\Service\ChannelContext channels(string $sid)
 * @method \Twilio\Rest\IpMessaging\V1\Service\RoleContext roles(string $sid)
 * @method \Twilio\Rest\IpMessaging\V1\Service\UserContext users(string $sid)
 */
class ServiceContext extends InstanceContext {
    protected $_channels = null;
    protected $_roles = null;
    protected $_users = null;

    /**
     * Initialize the ServiceContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\IpMessaging\V1\ServiceContext
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ServiceInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the ServiceInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'DefaultServiceRoleSid' => $options['defaultServiceRoleSid'],
            'DefaultChannelRoleSid' => $options['defaultChannelRoleSid'],
            'DefaultChannelCreatorRoleSid' => $options['defaultChannelCreatorRoleSid'],
            'ReadStatusEnabled' => Serialize::booleanToString($options['readStatusEnabled']),
            'ReachabilityEnabled' => Serialize::booleanToString($options['reachabilityEnabled']),
            'TypingIndicatorTimeout' => $options['typingIndicatorTimeout'],
            'ConsumptionReportInterval' => $options['consumptionReportInterval'],
            'Notifications.NewMessage.Enabled' => Serialize::booleanToString($options['notificationsNewMessageEnabled']),
            'Notifications.NewMessage.Template' => $options['notificationsNewMessageTemplate'],
            'Notifications.AddedToChannel.Enabled' => Serialize::booleanToString($options['notificationsAddedToChannelEnabled']),
            'Notifications.AddedToChannel.Template' => $options['notificationsAddedToChannelTemplate'],
            'Notifications.RemovedFromChannel.Enabled' => Serialize::booleanToString($options['notificationsRemovedFromChannelEnabled']),
            'Notifications.RemovedFromChannel.Template' => $options['notificationsRemovedFromChannelTemplate'],
            'Notifications.InvitedToChannel.Enabled' => Serialize::booleanToString($options['notificationsInvitedToChannelEnabled']),
            'Notifications.InvitedToChannel.Template' => $options['notificationsInvitedToChannelTemplate'],
            'PreWebhookUrl' => $options['preWebhookUrl'],
            'PostWebhookUrl' => $options['postWebhookUrl'],
            'WebhookMethod' => $options['webhookMethod'],
            'WebhookFilters' => Serialize::map($options['webhookFilters'], function($e) { return $e; }),
            'Webhooks.OnMessageSend.Url' => $options['webhooksOnMessageSendUrl'],
            'Webhooks.OnMessageSend.Method' => $options['webhooksOnMessageSendMethod'],
            'Webhooks.OnMessageUpdate.Url' => $options['webhooksOnMessageUpdateUrl'],
            'Webhooks.OnMessageUpdate.Method' => $options['webhooksOnMessageUpdateMethod'],
            'Webhooks.OnMessageRemove.Url' => $options['webhooksOnMessageRemoveUrl'],
            'Webhooks.OnMessageRemove.Method' => $options['webhooksOnMessageRemoveMethod'],
            'Webhooks.OnChannelAdd.Url' => $options['webhooksOnChannelAddUrl'],
            'Webhooks.OnChannelAdd.Method' => $options['webhooksOnChannelAddMethod'],
            'Webhooks.OnChannelDestroy.Url' => $options['webhooksOnChannelDestroyUrl'],
            'Webhooks.OnChannelDestroy.Method' => $options['webhooksOnChannelDestroyMethod'],
            'Webhooks.OnChannelUpdate.Url' => $options['webhooksOnChannelUpdateUrl'],
            'Webhooks.OnChannelUpdate.Method' => $options['webhooksOnChannelUpdateMethod'],
            'Webhooks.OnMemberAdd.Url' => $options['webhooksOnMemberAddUrl'],
            'Webhooks.OnMemberAdd.Method' => $options['webhooksOnMemberAddMethod'],
            'Webhooks.OnMemberRemove.Url' => $options['webhooksOnMemberRemoveUrl'],
            'Webhooks.OnMemberRemove.Method' => $options['webhooksOnMemberRemoveMethod'],
            'Webhooks.OnMessageSent.Url' => $options['webhooksOnMessageSentUrl'],
            'Webhooks.OnMessageSent.Method' => $options['webhooksOnMessageSentMethod'],
            'Webhooks.OnMessageUpdated.Url' => $options['webhooksOnMessageUpdatedUrl'],
            'Webhooks.OnMessageUpdated.Method' => $options['webhooksOnMessageUpdatedMethod'],
            'Webhooks.OnMessageRemoved.Url' => $options['webhooksOnMessageRemovedUrl'],
            'Webhooks.OnMessageRemoved.Method' => $options['webhooksOnMessageRemovedMethod'],
            'Webhooks.OnChannelAdded.Url' => $options['webhooksOnChannelAddedUrl'],
            'Webhooks.OnChannelAdded.Method' => $options['webhooksOnChannelAddedMethod'],
            'Webhooks.OnChannelDestroyed.Url' => $options['webhooksOnChannelDestroyedUrl'],
            'Webhooks.OnChannelDestroyed.Method' => $options['webhooksOnChannelDestroyedMethod'],
            'Webhooks.OnChannelUpdated.Url' => $options['webhooksOnChannelUpdatedUrl'],
            'Webhooks.OnChannelUpdated.Method' => $options['webhooksOnChannelUpdatedMethod'],
            'Webhooks.OnMemberAdded.Url' => $options['webhooksOnMemberAddedUrl'],
            'Webhooks.OnMemberAdded.Method' => $options['webhooksOnMemberAddedMethod'],
            'Webhooks.OnMemberRemoved.Url' => $options['webhooksOnMemberRemovedUrl'],
            'Webhooks.OnMemberRemoved.Method' => $options['webhooksOnMemberRemovedMethod'],
            'Limits.ChannelMembers' => $options['limitsChannelMembers'],
            'Limits.UserChannels' => $options['limitsUserChannels'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ServiceInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Access the channels
     *
     * @return \Twilio\Rest\IpMessaging\V1\Service\ChannelList
     */
    protected function getChannels() {
        if (!$this->_channels) {
            $this->_channels = new ChannelList($this->version, $this->solution['sid']);
        }

        return $this->_channels;
    }

    /**
     * Access the roles
     *
     * @return \Twilio\Rest\IpMessaging\V1\Service\RoleList
     */
    protected function getRoles() {
        if (!$this->_roles) {
            $this->_roles = new RoleList($this->version, $this->solution['sid']);
        }

        return $this->_roles;
    }

    /**
     * Access the users
     *
     * @return \Twilio\Rest\IpMessaging\V1\Service\UserList
     */
    protected function getUsers() {
        if (!$this->_users) {
            $this->_users = new UserList($this->version, $this->solution['sid']);
        }

        return $this->_users;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
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
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.IpMessaging.V1.ServiceContext ' . implode(' ', $context) . ']';
    }
}