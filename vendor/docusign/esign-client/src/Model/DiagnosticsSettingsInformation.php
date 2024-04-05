<?php
/**
 * DiagnosticsSettingsInformation
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  DocuSign\eSign
 * @author   Swagger Codegen team <apihelp@docusign.com>
 * @license  The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * DocuSign REST API
 *
 * The DocuSign REST API provides you with a powerful, convenient, and simple Web services API for interacting with DocuSign.
 *
 * OpenAPI spec version: v2.1
 * Contact: devcenter@docusign.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.21
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace DocuSign\eSign\Model;

use \ArrayAccess;
use DocuSign\eSign\ObjectSerializer;

/**
 * DiagnosticsSettingsInformation Class Doc Comment
 *
 * @category    Class
 * @package     DocuSign\eSign
 * @author      Swagger Codegen team <apihelp@docusign.com>
 * @license     The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class DiagnosticsSettingsInformation implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'diagnosticsSettingsInformation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'api_request_logging' => '?string',
        'api_request_log_max_entries' => '?string',
        'api_request_log_remaining_entries' => '?string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'api_request_logging' => null,
        'api_request_log_max_entries' => null,
        'api_request_log_remaining_entries' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'api_request_logging' => 'apiRequestLogging',
        'api_request_log_max_entries' => 'apiRequestLogMaxEntries',
        'api_request_log_remaining_entries' => 'apiRequestLogRemainingEntries'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'api_request_logging' => 'setApiRequestLogging',
        'api_request_log_max_entries' => 'setApiRequestLogMaxEntries',
        'api_request_log_remaining_entries' => 'setApiRequestLogRemainingEntries'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'api_request_logging' => 'getApiRequestLogging',
        'api_request_log_max_entries' => 'getApiRequestLogMaxEntries',
        'api_request_log_remaining_entries' => 'getApiRequestLogRemainingEntries'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['api_request_logging'] = isset($data['api_request_logging']) ? $data['api_request_logging'] : null;
        $this->container['api_request_log_max_entries'] = isset($data['api_request_log_max_entries']) ? $data['api_request_log_max_entries'] : null;
        $this->container['api_request_log_remaining_entries'] = isset($data['api_request_log_remaining_entries']) ? $data['api_request_log_remaining_entries'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets api_request_logging
     *
     * @return ?string
     */
    public function getApiRequestLogging()
    {
        return $this->container['api_request_logging'];
    }

    /**
     * Sets api_request_logging
     *
     * @param ?string $api_request_logging When set to **true**, enables API request logging for the user.
     *
     * @return $this
     */
    public function setApiRequestLogging($api_request_logging)
    {
        $this->container['api_request_logging'] = $api_request_logging;

        return $this;
    }

    /**
     * Gets api_request_log_max_entries
     *
     * @return ?string
     */
    public function getApiRequestLogMaxEntries()
    {
        return $this->container['api_request_log_max_entries'];
    }

    /**
     * Sets api_request_log_max_entries
     *
     * @param ?string $api_request_log_max_entries Specifies the maximum number of API requests to log.
     *
     * @return $this
     */
    public function setApiRequestLogMaxEntries($api_request_log_max_entries)
    {
        $this->container['api_request_log_max_entries'] = $api_request_log_max_entries;

        return $this;
    }

    /**
     * Gets api_request_log_remaining_entries
     *
     * @return ?string
     */
    public function getApiRequestLogRemainingEntries()
    {
        return $this->container['api_request_log_remaining_entries'];
    }

    /**
     * Sets api_request_log_remaining_entries
     *
     * @param ?string $api_request_log_remaining_entries Indicates the remaining number of API requests that can be logged.
     *
     * @return $this
     */
    public function setApiRequestLogRemainingEntries($api_request_log_remaining_entries)
    {
        $this->container['api_request_log_remaining_entries'] = $api_request_log_remaining_entries;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

