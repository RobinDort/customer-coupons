<?php
namespace RobinDort\CustomerCoupons\Model;

use Isotope\Model\Rule;
use RobinDort\CustomerCoupons\Backend\Database\DBTaxClassInteraction;

class CouponRule extends Rule {

    /**
    * Properties extended from Contaos/Isotopes Rule/Model class.
    * @property int    $id
    * @property int    $tstamp
    * @property string $type
    * @property string $name
    * @property string $label
    * @property string $discount
    * @property int    $tax_class
    * @property array  $groupRules
    * @property string $groupCondition
    * @property string $applyTo
    * @property string $rounding
    * @property bool   $enableCode
    * @property string $code
    * @property bool   $singleCode
    * @property int    $limitPerMember
    * @property int    $limitPerConfig
    * @property int    $minSubtotal
    * @property int    $maxSubtotal
    * @property string $minWeight
    * @property string $maxWeight
    * @property int    $minItemQuantity
    * @property int    $maxItemQuantity
    * @property string $quantityMode
    * @property int    $startDate
    * @property int    $endDate
    * @property int    $startTime
    * @property int    $endTime
    * @property string $configRestrictions
    * @property bool   $configCondition
    * @property string $memberRestrictions
    * @property bool   $memberCondition
    * @property string $productRestrictions
    * @property bool   $productCondition
    * @property string $attributeName
    * @property string $attributeCondition
    * @property string $attributeValue
    * @property bool   $enabled
    * @property bool   $groupOnly
    */

    private const RULE_NAME = "Geschenkgutschein";
    private const TAX_CLASS_NAME = "inkl. MwSt. 7 %";

    public function __construct() {
        parent::__construct();

        $weightConfig = [
            'unit' => 'kg',
            'value' => ''
        ];

        $serializedWeightConfig = serialize($weightConfig);
        $unixTime = time();

        // for the first try set default values for the new rule.
        $this->tstamp = $unixTime;
       // $this->name = "Test Gutschein Plugin";
       // $this->label = "Plugin Gutscheinrabatt 10€";
        $this->type = "cart";
       // $this->discount = "-10";
        $this->tax_class = getTaxClassID();
        $this->applyTo = "subtotal";
        $this->rounding = "down";
        $this->enableCode = true;
        $this->code = "TestCode";
        $this->limitPerMember = 1;
        $this->maxSubtotal = 2000;
        $this->minWeight = $serializedWeightConfig;
        $this->maxWeight = $serializedWeightConfig;
        $this->quantityMode = "product_quantity";
        $this->configCondition = true;
        $this->memberRestrictions = "groups";
        $this->memberCondition = true;
        $this->productRestrictions = "none";
        $this->productCondition = true;
        $this->enabled = true;
    }


    public function checkRuleExists() {
        $dbRuleInteraction = new DBRuleInteraction();
        $ruleCount = $dbRuleInteraction->selectRulesByName($this->name);
        if ($ruleCount > 0) {
            return true;
        }

        return false;
    }

    public function setName($ruleMember, $price) {
        $this->name = "" . self::RULE_NAME . "-" . $ruleMember . "-" . $price;
    }

    public function setLabel($ruleMember, $price) {
        $this->label =  "" . self::RULE_NAME . "-" . $ruleMember . "-" . $price;
    }

    public function setDiscount($discount) {
        $this->discount = "-" . $discount;
    }

    public function getRuleID() {
        return $this->id;
    }

    public function getTaxClassID() {
        $dbTaxClassInteraction = new DBTaxClassInteraction();
        $taxID = $dbTaxClassInteraction->selectTaxClassID(self::TAX_CLASS_NAME);
        return $taxID;

    }

}

?>