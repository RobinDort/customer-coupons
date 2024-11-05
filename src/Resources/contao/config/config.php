<?php
use RobinDort\CustomerCoupons\Model\CouponProductType;
use RobinDort\CustomerCoupons\Model\CouponPage;
use RobinDort\CustomerCoupons\Model\CouponArticle;
use RobinDort\CustomerCoupons\Model\CouponProduct;
/**
 * Register models
 */
$GLOBALS['TL_MODELS']['tl_iso_producttype'] = CouponProductType::class;
$GLOBALS['TL_MODELS']['tl_page'] = CouponPage::class; 
$GLOBALS['TL_MODELS']['tl_article'] = CouponArticle::class;
$GLOBALS['TL_MODELS']['tl_iso_product'] = CouponProduct::class;


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