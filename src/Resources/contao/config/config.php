<?php
use RobinDort\CustomerCoupons\Model\CouponProductType;
use RobinDort\CustomerCoupons\Model\CouponProductGroup;
use RobinDort\CustomerCoupons\Model\CouponPage;

use RobinDort\CustomerCoupons\Backend\Database\DBProductTypeInteraction;
use RobinDort\CustomerCoupons\Backend\Database\DBProductGroupInteraction;
use RobinDort\CustomerCoupons\Backend\Database\DBPageInteraction;

// use RobinDort\CustomerCoupons\Model\CustomRule;
// use RobinDort\CustomerCoupons\Backend\Database\DBRuleRestrictionInteraction;
// use RobinDort\CustomerCoupons\Backend\Rule\SaveRuleCallback;


if (empty($GLOBALS["INITIAL_SETUP"])) {

    /**
     * Create new product type for customer coupons.
     */
    $couponProductType = new CouponProductType();

    /** 
     * Check if the coupon product type exists.
     * */
    $dbProductTypeInteraction = new DBProductTypeInteraction();
    $couponProductTypeCount = $dbProductTypeInteraction->selectProductType($couponProductType->getName());
    if ($couponProductTypeCount === 0) {
        // save new product type 
        $couponProductType->save();

        /**
         * Create product group for the coupons
         */
        $couponProductGroup = new CouponProductGroup();
        $couponProductGroup->setProductType(32);
        $couponProductGroup->setSorting(900);

        // save for debug purpose
        $couponProductGroup->save();
    }

    /**
     * Create new page that displays later on newly created product "coupon".
     */
    $couponPage = new CouponPage();
    
    // Check if the page already exists
    $dbPageInteraction = new DBPageInteraction();
    $couponPageCount = $dbPageInteraction->selectPage($couponPage->getTitle());
    if ($couponPageCount === 0) {
        // save the new page
        $couponPage->save();


        // create an article inside the new page to handle coupon content.
        

        // create content inside the new article and set the isotope module in order to place products inside there
    }

    /**
     * Set the GLOBAL variable to prevent this code segment from running more than once.
     */
    $GLOBALS["INITIAL_SETUP"] = true;
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