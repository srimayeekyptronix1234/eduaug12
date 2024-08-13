<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Video\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class CompositionSettingsOptions {
    /**
     * @param string $awsCredentialsSid The SID of the stored Credential resource
     * @param string $encryptionKeySid The SID of the Public Key resource to use
     *                                 for encryption
     * @param string $awsS3Url The URL of the AWS S3 bucket where the compositions
     *                         should be stored
     * @param bool $awsStorageEnabled Whether all compositions should be written to
     *                                the aws_s3_url
     * @param bool $encryptionEnabled Whether all compositions should be stored in
     *                                an encrypted form
     * @return CreateCompositionSettingsOptions Options builder
     */
    public static function create($awsCredentialsSid = Values::NONE, $encryptionKeySid = Values::NONE, $awsS3Url = Values::NONE, $awsStorageEnabled = Values::NONE, $encryptionEnabled = Values::NONE) {
        return new CreateCompositionSettingsOptions($awsCredentialsSid, $encryptionKeySid, $awsS3Url, $awsStorageEnabled, $encryptionEnabled);
    }
}

class CreateCompositionSettingsOptions extends Options {
    /**
     * @param string $awsCredentialsSid The SID of the stored Credential resource
     * @param string $encryptionKeySid The SID of the Public Key resource to use
     *                                 for encryption
     * @param string $awsS3Url The URL of the AWS S3 bucket where the compositions
     *                         should be stored
     * @param bool $awsStorageEnabled Whether all compositions should be written to
     *                                the aws_s3_url
     * @param bool $encryptionEnabled Whether all compositions should be stored in
     *                                an encrypted form
     */
    public function __construct($awsCredentialsSid = Values::NONE, $encryptionKeySid = Values::NONE, $awsS3Url = Values::NONE, $awsStorageEnabled = Values::NONE, $encryptionEnabled = Values::NONE) {
        $this->options['awsCredentialsSid'] = $awsCredentialsSid;
        $this->options['encryptionKeySid'] = $encryptionKeySid;
        $this->options['awsS3Url'] = $awsS3Url;
        $this->options['awsStorageEnabled'] = $awsStorageEnabled;
        $this->options['encryptionEnabled'] = $encryptionEnabled;
    }

    /**
     * The SID of the stored Credential resource.
     *
     * @param string $awsCredentialsSid The SID of the stored Credential resource
     * @return $this Fluent Builder
     */
    public function setAwsCredentialsSid($awsCredentialsSid) {
        $this->options['awsCredentialsSid'] = $awsCredentialsSid;
        return $this;
    }

    /**
     * The SID of the Public Key resource to use for encryption.
     *
     * @param string $encryptionKeySid The SID of the Public Key resource to use
     *                                 for encryption
     * @return $this Fluent Builder
     */
    public function setEncryptionKeySid($encryptionKeySid) {
        $this->options['encryptionKeySid'] = $encryptionKeySid;
        return $this;
    }

    /**
     * The URL of the AWS S3 bucket where the compositions should be stored. We only support DNS-compliant URLs like `http://<my-bucket>.s3-<aws-region>.amazonaws.com/compositions`, where `compositions` is the path in which you want the compositions to be stored.
     *
     * @param string $awsS3Url The URL of the AWS S3 bucket where the compositions
     *                         should be stored
     * @return $this Fluent Builder
     */
    public function setAwsS3Url($awsS3Url) {
        $this->options['awsS3Url'] = $awsS3Url;
        return $this;
    }

    /**
     * Whether all compositions should be written to the `aws_s3_url`. When `false`, all compositions are stored in our cloud.
     *
     * @param bool $awsStorageEnabled Whether all compositions should be written to
     *                                the aws_s3_url
     * @return $this Fluent Builder
     */
    public function setAwsStorageEnabled($awsStorageEnabled) {
        $this->options['awsStorageEnabled'] = $awsStorageEnabled;
        return $this;
    }

    /**
     * Whether all compositions should be stored in an encrypted form. The default is `false`.
     *
     * @param bool $encryptionEnabled Whether all compositions should be stored in
     *                                an encrypted form
     * @return $this Fluent Builder
     */
    public function setEncryptionEnabled($encryptionEnabled) {
        $this->options['encryptionEnabled'] = $encryptionEnabled;
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
        return '[Twilio.Video.V1.CreateCompositionSettingsOptions ' . implode(' ', $options) . ']';
    }
}