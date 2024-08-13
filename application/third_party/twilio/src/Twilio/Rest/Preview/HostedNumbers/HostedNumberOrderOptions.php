<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\HostedNumbers;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class HostedNumberOrderOptions {
    /**
     * @param string $friendlyName A human readable description of this resource.
     * @param string $uniqueName A unique, developer assigned name of this
     *                           HostedNumberOrder.
     * @param string $email Email.
     * @param string $ccEmails A list of emails.
     * @param string $status The Status of this HostedNumberOrder.
     * @param string $verificationCode A verification code.
     * @param string $verificationType Verification Type.
     * @param string $verificationDocumentSid Verification Document Sid
     * @param string $extension Digits to dial after connecting the verification
     *                          call.
     * @param int $callDelay The number of seconds, between 0 and 60, to delay
     *                       before initiating the verification call.
     * @return UpdateHostedNumberOrderOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $uniqueName = Values::NONE, $email = Values::NONE, $ccEmails = Values::NONE, $status = Values::NONE, $verificationCode = Values::NONE, $verificationType = Values::NONE, $verificationDocumentSid = Values::NONE, $extension = Values::NONE, $callDelay = Values::NONE) {
        return new UpdateHostedNumberOrderOptions($friendlyName, $uniqueName, $email, $ccEmails, $status, $verificationCode, $verificationType, $verificationDocumentSid, $extension, $callDelay);
    }

    /**
     * @param string $status The Status of this HostedNumberOrder.
     * @param string $phoneNumber An E164 formatted phone number.
     * @param string $incomingPhoneNumberSid IncomingPhoneNumber sid.
     * @param string $friendlyName A human readable description of this resource.
     * @param string $uniqueName A unique, developer assigned name of this
     *                           HostedNumberOrder.
     * @return ReadHostedNumberOrderOptions Options builder
     */
    public static function read($status = Values::NONE, $phoneNumber = Values::NONE, $incomingPhoneNumberSid = Values::NONE, $friendlyName = Values::NONE, $uniqueName = Values::NONE) {
        return new ReadHostedNumberOrderOptions($status, $phoneNumber, $incomingPhoneNumberSid, $friendlyName, $uniqueName);
    }

    /**
     * @param string $accountSid Account Sid.
     * @param string $friendlyName A human readable description of this resource.
     * @param string $uniqueName A unique, developer assigned name of this
     *                           HostedNumberOrder.
     * @param string $ccEmails A list of emails.
     * @param string $smsUrl SMS URL.
     * @param string $smsMethod SMS Method.
     * @param string $smsFallbackUrl SMS Fallback URL.
     * @param string $smsFallbackMethod SMS Fallback Method.
     * @param string $statusCallbackUrl Status Callback URL.
     * @param string $statusCallbackMethod Status Callback Method.
     * @param string $smsApplicationSid SMS Application Sid.
     * @param string $addressSid Address sid.
     * @param string $email Email.
     * @param string $verificationType Verification Type.
     * @param string $verificationDocumentSid Verification Document Sid
     * @return CreateHostedNumberOrderOptions Options builder
     */
    public static function create($accountSid = Values::NONE, $friendlyName = Values::NONE, $uniqueName = Values::NONE, $ccEmails = Values::NONE, $smsUrl = Values::NONE, $smsMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $statusCallbackUrl = Values::NONE, $statusCallbackMethod = Values::NONE, $smsApplicationSid = Values::NONE, $addressSid = Values::NONE, $email = Values::NONE, $verificationType = Values::NONE, $verificationDocumentSid = Values::NONE) {
        return new CreateHostedNumberOrderOptions($accountSid, $friendlyName, $uniqueName, $ccEmails, $smsUrl, $smsMethod, $smsFallbackUrl, $smsFallbackMethod, $statusCallbackUrl, $statusCallbackMethod, $smsApplicationSid, $addressSid, $email, $verificationType, $verificationDocumentSid);
    }
}

class UpdateHostedNumberOrderOptions extends Options {
    /**
     * @param string $friendlyName A human readable description of this resource.
     * @param string $uniqueName A unique, developer assigned name of this
     *                           HostedNumberOrder.
     * @param string $email Email.
     * @param string $ccEmails A list of emails.
     * @param string $status The Status of this HostedNumberOrder.
     * @param string $verificationCode A verification code.
     * @param string $verificationType Verification Type.
     * @param string $verificationDocumentSid Verification Document Sid
     * @param string $extension Digits to dial after connecting the verification
     *                          call.
     * @param int $callDelay The number of seconds, between 0 and 60, to delay
     *                       before initiating the verification call.
     */
    public function __construct($friendlyName = Values::NONE, $uniqueName = Values::NONE, $email = Values::NONE, $ccEmails = Values::NONE, $status = Values::NONE, $verificationCode = Values::NONE, $verificationType = Values::NONE, $verificationDocumentSid = Values::NONE, $extension = Values::NONE, $callDelay = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['uniqueName'] = $uniqueName;
        $this->options['email'] = $email;
        $this->options['ccEmails'] = $ccEmails;
        $this->options['status'] = $status;
        $this->options['verificationCode'] = $verificationCode;
        $this->options['verificationType'] = $verificationType;
        $this->options['verificationDocumentSid'] = $verificationDocumentSid;
        $this->options['extension'] = $extension;
        $this->options['callDelay'] = $callDelay;
    }

    /**
     * A 64 character string that is a human readable text that describes this resource.
     *
     * @param string $friendlyName A human readable description of this resource.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provides a unique and addressable name to be assigned to this HostedNumberOrder, assigned by the developer, to be optionally used in addition to SID.
     *
     * @param string $uniqueName A unique, developer assigned name of this
     *                           HostedNumberOrder.
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * Email of the owner of this phone number that is being hosted.
     *
     * @param string $email Email.
     * @return $this Fluent Builder
     */
    public function setEmail($email) {
        $this->options['email'] = $email;
        return $this;
    }

    /**
     * Optional. A list of emails that LOA document for this HostedNumberOrder will be carbon copied to.
     *
     * @param string $ccEmails A list of emails.
     * @return $this Fluent Builder
     */
    public function setCcEmails($ccEmails) {
        $this->options['ccEmails'] = $ccEmails;
        return $this;
    }

    /**
     * User can only post to `pending-verification` status to transition the HostedNumberOrder to initiate a verification call or verification of ownership with a copy of a phone bill.
     *
     * @param string $status The Status of this HostedNumberOrder.
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * A verification code that is given to the user via a phone call to the phone number that is being hosted.
     *
     * @param string $verificationCode A verification code.
     * @return $this Fluent Builder
     */
    public function setVerificationCode($verificationCode) {
        $this->options['verificationCode'] = $verificationCode;
        return $this;
    }

    /**
     * Optional. The method used for verifying ownership of the number to be hosted. One of phone-call (default) or phone-bill.
     *
     * @param string $verificationType Verification Type.
     * @return $this Fluent Builder
     */
    public function setVerificationType($verificationType) {
        $this->options['verificationType'] = $verificationType;
        return $this;
    }

    /**
     * Optional. The unique sid identifier of the Identity Document that represents the document for verifying ownership of the number to be hosted. Required when VerificationType is phone-bill.
     *
     * @param string $verificationDocumentSid Verification Document Sid
     * @return $this Fluent Builder
     */
    public function setVerificationDocumentSid($verificationDocumentSid) {
        $this->options['verificationDocumentSid'] = $verificationDocumentSid;
        return $this;
    }

    /**
     * Digits to dial after connecting the verification call.
     *
     * @param string $extension Digits to dial after connecting the verification
     *                          call.
     * @return $this Fluent Builder
     */
    public function setExtension($extension) {
        $this->options['extension'] = $extension;
        return $this;
    }

    /**
     * The number of seconds, between 0 and 60, to delay before initiating the verification call. Defaults to 0.
     *
     * @param int $callDelay The number of seconds, between 0 and 60, to delay
     *                       before initiating the verification call.
     * @return $this Fluent Builder
     */
    public function setCallDelay($callDelay) {
        $this->options['callDelay'] = $callDelay;
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
        return '[Twilio.Preview.HostedNumbers.UpdateHostedNumberOrderOptions ' . implode(' ', $options) . ']';
    }
}

class ReadHostedNumberOrderOptions extends Options {
    /**
     * @param string $status The Status of this HostedNumberOrder.
     * @param string $phoneNumber An E164 formatted phone number.
     * @param string $incomingPhoneNumberSid IncomingPhoneNumber sid.
     * @param string $friendlyName A human readable description of this resource.
     * @param string $uniqueName A unique, developer assigned name of this
     *                           HostedNumberOrder.
     */
    public function __construct($status = Values::NONE, $phoneNumber = Values::NONE, $incomingPhoneNumberSid = Values::NONE, $friendlyName = Values::NONE, $uniqueName = Values::NONE) {
        $this->options['status'] = $status;
        $this->options['phoneNumber'] = $phoneNumber;
        $this->options['incomingPhoneNumberSid'] = $incomingPhoneNumberSid;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['uniqueName'] = $uniqueName;
    }

    /**
     * The Status of this HostedNumberOrder. One of `received`, `pending-verification`, `verified`, `pending-loa`, `carrier-processing`, `testing`, `completed`, `failed`, or `action-required`.
     *
     * @param string $status The Status of this HostedNumberOrder.
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * An E164 formatted phone number hosted by this HostedNumberOrder.
     *
     * @param string $phoneNumber An E164 formatted phone number.
     * @return $this Fluent Builder
     */
    public function setPhoneNumber($phoneNumber) {
        $this->options['phoneNumber'] = $phoneNumber;
        return $this;
    }

    /**
     * A 34 character string that uniquely identifies the IncomingPhoneNumber resource created by this HostedNumberOrder.
     *
     * @param string $incomingPhoneNumberSid IncomingPhoneNumber sid.
     * @return $this Fluent Builder
     */
    public function setIncomingPhoneNumberSid($incomingPhoneNumberSid) {
        $this->options['incomingPhoneNumberSid'] = $incomingPhoneNumberSid;
        return $this;
    }

    /**
     * A human readable description of this resource, up to 64 characters.
     *
     * @param string $friendlyName A human readable description of this resource.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provides a unique and addressable name to be assigned to this HostedNumberOrder, assigned by the developer, to be optionally used in addition to SID.
     *
     * @param string $uniqueName A unique, developer assigned name of this
     *                           HostedNumberOrder.
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
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
        return '[Twilio.Preview.HostedNumbers.ReadHostedNumberOrderOptions ' . implode(' ', $options) . ']';
    }
}

class CreateHostedNumberOrderOptions extends Options {
    /**
     * @param string $accountSid Account Sid.
     * @param string $friendlyName A human readable description of this resource.
     * @param string $uniqueName A unique, developer assigned name of this
     *                           HostedNumberOrder.
     * @param string $ccEmails A list of emails.
     * @param string $smsUrl SMS URL.
     * @param string $smsMethod SMS Method.
     * @param string $smsFallbackUrl SMS Fallback URL.
     * @param string $smsFallbackMethod SMS Fallback Method.
     * @param string $statusCallbackUrl Status Callback URL.
     * @param string $statusCallbackMethod Status Callback Method.
     * @param string $smsApplicationSid SMS Application Sid.
     * @param string $addressSid Address sid.
     * @param string $email Email.
     * @param string $verificationType Verification Type.
     * @param string $verificationDocumentSid Verification Document Sid
     */
    public function __construct($accountSid = Values::NONE, $friendlyName = Values::NONE, $uniqueName = Values::NONE, $ccEmails = Values::NONE, $smsUrl = Values::NONE, $smsMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $statusCallbackUrl = Values::NONE, $statusCallbackMethod = Values::NONE, $smsApplicationSid = Values::NONE, $addressSid = Values::NONE, $email = Values::NONE, $verificationType = Values::NONE, $verificationDocumentSid = Values::NONE) {
        $this->options['accountSid'] = $accountSid;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['uniqueName'] = $uniqueName;
        $this->options['ccEmails'] = $ccEmails;
        $this->options['smsUrl'] = $smsUrl;
        $this->options['smsMethod'] = $smsMethod;
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        $this->options['statusCallbackUrl'] = $statusCallbackUrl;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['smsApplicationSid'] = $smsApplicationSid;
        $this->options['addressSid'] = $addressSid;
        $this->options['email'] = $email;
        $this->options['verificationType'] = $verificationType;
        $this->options['verificationDocumentSid'] = $verificationDocumentSid;
    }

    /**
     * This defaults to the AccountSid of the authorization the user is using. This can be provided to specify a subaccount to add the HostedNumberOrder to.
     *
     * @param string $accountSid Account Sid.
     * @return $this Fluent Builder
     */
    public function setAccountSid($accountSid) {
        $this->options['accountSid'] = $accountSid;
        return $this;
    }

    /**
     * A 64 character string that is a human readable text that describes this resource.
     *
     * @param string $friendlyName A human readable description of this resource.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Optional. Provides a unique and addressable name to be assigned to this HostedNumberOrder, assigned by the developer, to be optionally used in addition to SID.
     *
     * @param string $uniqueName A unique, developer assigned name of this
     *                           HostedNumberOrder.
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * Optional. A list of emails that the LOA document for this HostedNumberOrder will be carbon copied to.
     *
     * @param string $ccEmails A list of emails.
     * @return $this Fluent Builder
     */
    public function setCcEmails($ccEmails) {
        $this->options['ccEmails'] = $ccEmails;
        return $this;
    }

    /**
     * The URL that Twilio should request when somebody sends an SMS to the phone number. This will be copied onto the IncomingPhoneNumber resource.
     *
     * @param string $smsUrl SMS URL.
     * @return $this Fluent Builder
     */
    public function setSmsUrl($smsUrl) {
        $this->options['smsUrl'] = $smsUrl;
        return $this;
    }

    /**
     * The HTTP method that should be used to request the SmsUrl. Must be either `GET` or `POST`.  This will be copied onto the IncomingPhoneNumber resource.
     *
     * @param string $smsMethod SMS Method.
     * @return $this Fluent Builder
     */
    public function setSmsMethod($smsMethod) {
        $this->options['smsMethod'] = $smsMethod;
        return $this;
    }

    /**
     * A URL that Twilio will request if an error occurs requesting or executing the TwiML defined by SmsUrl. This will be copied onto the IncomingPhoneNumber resource.
     *
     * @param string $smsFallbackUrl SMS Fallback URL.
     * @return $this Fluent Builder
     */
    public function setSmsFallbackUrl($smsFallbackUrl) {
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method that should be used to request the SmsFallbackUrl. Must be either `GET` or `POST`. This will be copied onto the IncomingPhoneNumber resource.
     *
     * @param string $smsFallbackMethod SMS Fallback Method.
     * @return $this Fluent Builder
     */
    public function setSmsFallbackMethod($smsFallbackMethod) {
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        return $this;
    }

    /**
     * Optional. The Status Callback URL attached to the IncomingPhoneNumber resource.
     *
     * @param string $statusCallbackUrl Status Callback URL.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackUrl($statusCallbackUrl) {
        $this->options['statusCallbackUrl'] = $statusCallbackUrl;
        return $this;
    }

    /**
     * Optional. The Status Callback Method attached to the IncomingPhoneNumber resource.
     *
     * @param string $statusCallbackMethod Status Callback Method.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * Optional. The 34 character sid of the application Twilio should use to handle SMS messages sent to this number. If a `SmsApplicationSid` is present, Twilio will ignore all of the SMS urls above and use those set on the application.
     *
     * @param string $smsApplicationSid SMS Application Sid.
     * @return $this Fluent Builder
     */
    public function setSmsApplicationSid($smsApplicationSid) {
        $this->options['smsApplicationSid'] = $smsApplicationSid;
        return $this;
    }

    /**
     * Optional. A 34 character string that uniquely identifies the Address resource that represents the address of the owner of this phone number.
     *
     * @param string $addressSid Address sid.
     * @return $this Fluent Builder
     */
    public function setAddressSid($addressSid) {
        $this->options['addressSid'] = $addressSid;
        return $this;
    }

    /**
     * Optional. Email of the owner of this phone number that is being hosted.
     *
     * @param string $email Email.
     * @return $this Fluent Builder
     */
    public function setEmail($email) {
        $this->options['email'] = $email;
        return $this;
    }

    /**
     * Optional. The method used for verifying ownership of the number to be hosted. One of phone-call (default) or phone-bill.
     *
     * @param string $verificationType Verification Type.
     * @return $this Fluent Builder
     */
    public function setVerificationType($verificationType) {
        $this->options['verificationType'] = $verificationType;
        return $this;
    }

    /**
     * Optional. The unique sid identifier of the Identity Document that represents the document for verifying ownership of the number to be hosted. Required when VerificationType is phone-bill.
     *
     * @param string $verificationDocumentSid Verification Document Sid
     * @return $this Fluent Builder
     */
    public function setVerificationDocumentSid($verificationDocumentSid) {
        $this->options['verificationDocumentSid'] = $verificationDocumentSid;
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
        return '[Twilio.Preview.HostedNumbers.CreateHostedNumberOrderOptions ' . implode(' ', $options) . ']';
    }
}