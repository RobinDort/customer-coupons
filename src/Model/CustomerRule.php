<?php
namespace RobinDort\CustomerCoupons\Model;

use Isotope\Model\Rule;

class CustomerRule extends Rule {

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

    public function __construct() {
        parent::__construct();

        // for the first try set default values for the new rule.
        $this->name = "Test Gutschein Plugin";
        $this->label = "Plugin Gutscheinrabatt 10€";
        $this->type = "cart";
        $this->discount = "-10";
        $this->tax_class = 0;
        $this->applyTo = "subtotal";
        $this->rounding = "down";
        $this->enableCode = true;
        $this->code = "TestCode";
        $this->limitPerMember = 1;
        $this->maxSubtotal = 2000;
        $this->configCondition = true;
        $this->memberRestrictions = "groups";
        $this->memberCondition = true;
        $this->productRestrictions = "none";
        $this->productCondition = true;
        $this->enabled = true;
    }

    public function saveRule() {
        try {
            if ($this->discount <= 0) {
                throw new \Exception("Discount must contain a positive value");
            }

            // save the newly created rule
            if ($this->save()) {
                \System::log("Custom rule with ID {$this->id} was created", __METHOD__, 'TL_GENERAL');
            } else {
                throw new \Exception("Unable to save new rule to the database.");
            }

        } catch (\Exception $e) {
            \System::log("Error while trying to save new rule:" . $e->getMessage(),__METHOD__,"TL_ERROR");
        }
    }
}

?>