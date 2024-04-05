<?php
/**
 * PlanInformation
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
 * PlanInformation Class Doc Comment
 *
 * @category    Class
 * @description An object used to identify the features and attributes of the account being created.
 * @package     DocuSign\eSign
 * @author      Swagger Codegen team <apihelp@docusign.com>
 * @license     The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PlanInformation implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'planInformation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'add_ons' => '\DocuSign\eSign\Model\AddOn[]',
        'currency_code' => '?string',
        'free_trial_days_override' => '?string',
        'plan_feature_sets' => '\DocuSign\eSign\Model\FeatureSet[]',
        'plan_id' => '?string',
        'recipient_domains' => '\DocuSign\eSign\Model\RecipientDomain[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'add_ons' => null,
        'currency_code' => null,
        'free_trial_days_override' => null,
        'plan_feature_sets' => null,
        'plan_id' => null,
        'recipient_domains' => null
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
        'add_ons' => 'addOns',
        'currency_code' => 'currencyCode',
        'free_trial_days_override' => 'freeTrialDaysOverride',
        'plan_feature_sets' => 'planFeatureSets',
        'plan_id' => 'planId',
        'recipient_domains' => 'recipientDomains'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'add_ons' => 'setAddOns',
        'currency_code' => 'setCurrencyCode',
        'free_trial_days_override' => 'setFreeTrialDaysOverride',
        'plan_feature_sets' => 'setPlanFeatureSets',
        'plan_id' => 'setPlanId',
        'recipient_domains' => 'setRecipientDomains'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'add_ons' => 'getAddOns',
        'currency_code' => 'getCurrencyCode',
        'free_trial_days_override' => 'getFreeTrialDaysOverride',
        'plan_feature_sets' => 'getPlanFeatureSets',
        'plan_id' => 'getPlanId',
        'recipient_domains' => 'getRecipientDomains'
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
        $this->container['add_ons'] = isset($data['add_ons']) ? $data['add_ons'] : null;
        $this->container['currency_code'] = isset($data['currency_code']) ? $data['currency_code'] : null;
        $this->container['free_trial_days_override'] = isset($data['free_trial_days_override']) ? $data['free_trial_days_override'] : null;
        $this->container['plan_feature_sets'] = isset($data['plan_feature_sets']) ? $data['plan_feature_sets'] : null;
        $this->container['plan_id'] = isset($data['plan_id']) ? $data['plan_id'] : null;
        $this->container['recipient_domains'] = isset($data['recipient_domains']) ? $data['recipient_domains'] : null;
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
     * Gets add_ons
     *
     * @return \DocuSign\eSign\Model\AddOn[]
     */
    public function getAddOns()
    {
        return $this->container['add_ons'];
    }

    /**
     * Sets add_ons
     *
     * @param \DocuSign\eSign\Model\AddOn[] $add_ons Reserved:
     *
     * @return $this
     */
    public function setAddOns($add_ons)
    {
        $this->container['add_ons'] = $add_ons;

        return $this;
    }

    /**
     * Gets currency_code
     *
     * @return ?string
     */
    public function getCurrencyCode()
    {
        return $this->container['currency_code'];
    }

    /**
     * Sets currency_code
     *
     * @param ?string $currency_code Specifies the ISO currency code for the account.
     *
     * @return $this
     */
    public function setCurrencyCode($currency_code)
    {
        $this->container['currency_code'] = $currency_code;

        return $this;
    }

    /**
     * Gets free_trial_days_override
     *
     * @return ?string
     */
    public function getFreeTrialDaysOverride()
    {
        return $this->container['free_trial_days_override'];
    }

    /**
     * Sets free_trial_days_override
     *
     * @param ?string $free_trial_days_override Reserved for DocuSign use only.
     *
     * @return $this
     */
    public function setFreeTrialDaysOverride($free_trial_days_override)
    {
        $this->container['free_trial_days_override'] = $free_trial_days_override;

        return $this;
    }

    /**
     * Gets plan_feature_sets
     *
     * @return \DocuSign\eSign\Model\FeatureSet[]
     */
    public function getPlanFeatureSets()
    {
        return $this->container['plan_feature_sets'];
    }

    /**
     * Sets plan_feature_sets
     *
     * @param \DocuSign\eSign\Model\FeatureSet[] $plan_feature_sets A complex type that sets the feature sets for the account.
     *
     * @return $this
     */
    public function setPlanFeatureSets($plan_feature_sets)
    {
        $this->container['plan_feature_sets'] = $plan_feature_sets;

        return $this;
    }

    /**
     * Gets plan_id
     *
     * @return ?string
     */
    public function getPlanId()
    {
        return $this->container['plan_id'];
    }

    /**
     * Sets plan_id
     *
     * @param ?string $plan_id The DocuSign Plan ID for the account.
     *
     * @return $this
     */
    public function setPlanId($plan_id)
    {
        $this->container['plan_id'] = $plan_id;

        return $this;
    }

    /**
     * Gets recipient_domains
     *
     * @return \DocuSign\eSign\Model\RecipientDomain[]
     */
    public function getRecipientDomains()
    {
        return $this->container['recipient_domains'];
    }

    /**
     * Sets recipient_domains
     *
     * @param \DocuSign\eSign\Model\RecipientDomain[] $recipient_domains 
     *
     * @return $this
     */
    public function setRecipientDomains($recipient_domains)
    {
        $this->container['recipient_domains'] = $recipient_domains;

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

