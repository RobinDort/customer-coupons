<?php
use RobinDort\CustomerCoupons\Model\CouponProductType;
use RobinDort\CustomerCoupons\Backend\Database\DBProductTypeInteraction;

use RobinDort\CustomerCoupons\Model\CustomRule;
use RobinDort\CustomerCoupons\Backend\Database\DBRuleRestrictionInteraction;
use RobinDort\CustomerCoupons\Backend\Rule\SaveRuleCallback;

// Create new product type for customer coupons.
$couponProductType = new CouponProductType();

// check if the coupon product type exists.
$dbProductTypeInteraction = new DBProductTypeInteraction();
$couponProductTypeCount = $dbProductTypeInteraction->selectProductType($couponProductType->getName());
if (!$couponProductTypeCount > 0) {
    // save new product type 
    $couponProductType->save();
}





// @TODO -> Rule usage -> use it inside the frontend template later on.

// $customRule = new CustomRule();
// $ruleExists = $customRule->checkRuleExists();

// if (!$ruleExists) {
//     $customRule->save();

//     $newRuleID = $customRule->getRuleID();
//     if ($newRuleID !== null) {
//         // prepare new restrictions for that rule

//         // get only the object_id restrictions with ID of 1 by default.
//         $objID = [1];
//         $varValue = serialize($objID);

//         // create a new data container and set its properties according to the needed restriction.
//         $dc = new \stdClass();
//         $dc->id = $newRuleID;
//         $dc->table = "tl_iso_rule_restriction";
//         $dc->field = "groups";
//         $dc->activeRecord= new \stdClass();
//         $dc->activeRecord->id = 1;

//         // check if the restriction exists before saving it
//         $ruleRestrictionInteraction = new DBRuleRestrictionInteraction();
//         $restrictionCount = $ruleRestrictionInteraction->selectRuleRestriction($newRuleID, "groups", 1);

//         if (!$restrictionCount > 0) {
//             $saveRuleCallback = new SaveRuleCallback();
//             $saveRuleCallback->saveRestrictions($varValue, $dc);
//         }

//     }
// }

?>