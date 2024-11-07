<?php

namespace RobinDort\CustomerCoupons\EventListener\isotope;

use RobinDort\CustomerCoupons\Model\CouponRule;
use RobinDort\CustomerCoupons\Backend\Rule\SaveRuleCallback;
use RobinDort\CustomerCoupons\Backend\Database\DBRuleRestrictionInteraction;

use Isotope\Model\ProductCollection\Order;


class PostCheckoutCouponListener {

    public function __invoke(Order $order, array $tokens): void {
        // Get all items (products) in the order
        $orderItems = $order->getItems();

        // The product ID or some other identifier you're looking for
        $targetProductType = "Coupon"; // Example: the product ID you're checking for


        foreach ($orderItems as $item) {
            // Get the product from the order item
            $product = $item->getRelated('product'); // Make sure the 'product' relation exists
            
            // check for name to make sure the product is a coupon
            if ($product && $product->getType() === $targetProductType) {
                $couponFound = true;

                // Order contains at least one coupon. Create a new rule for each coupon inside the order.
                $couponBuyedByMember = $order->getRelated('member');
                if ($couponBuyedByMember) {

                    $memberUsername = $couponBuyedByMember->username;
                    $couponPrice = round($product->getPrice());

                    // Set dynamic coupon properties
                    $couponRule = new CouponRule();
                    $couponRule->setName($memberUsername, $couponPrice);
                    $couponRule->setLabel($memberUsername, $couponPrice);
                    $couponRule->setDiscount($couponPrice);

                    // Check if rule exists
                   // $ruleExists = $couponRule->checkRuleExists();
                    
                   // if (!$ruleExists) {
                        $couponRule->save();

                        $newRuleID = $couponRule->getRuleID();
                            if ($newRuleID !== null) {
                                // Prepare restrictions for this rule

                                // Get object_id restrictions with ID of 1 by default.
                                $objID = [1];
                                $varValue = serialize($objID);

                                // create a new data container and set its properties according to the needed restriction.
                                $dc = new \stdClass();
                                $dc->id = $newRuleID;
                                $dc->table = "tl_iso_rule_restriction";
                                $dc->field = "groups";
                                $dc->activeRecord= new \stdClass();
                                $dc->activeRecord->id = 1;

                                // Check if the restriction exists before saving it
                                $ruleRestrictionInteraction = new DBRuleRestrictionInteraction();
                                $restrictionCount = $ruleRestrictionInteraction->selectRuleRestriction($newRuleID, "groups", 1);

                                if (!$restrictionCount > 0) {
                                    $saveRuleCallback = new SaveRuleCallback();
                                    $saveRuleCallback->saveRestrictions($varValue, $dc);
                                }

                            }
                   // }
                }
            }
        }
    }
}

?>