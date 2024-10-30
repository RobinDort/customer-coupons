<?php
use RobinDort\CustomerCoupons\Model\CustomRule;
use RobinDort\CustomerCoupons\Model\CustomRuleRestriction;

$customRule = new CustomRule();
$ruleExists = $customRule->checkRuleExists();

if (!$ruleExists) {
    $customRule->save();

    $newRuleID = $customRule->getRuleID();
    if ($newRuleID !== null) {

        // create a new rule restriction and set the depending table entries. 
        $customRuleRestriction = new CustomRuleRestriction();
        $customRuleRestriction->setParentID($newRuleID);
        // object_id of tl_iso_rule_restrictions will be 1 by default but can be changed later inside the backend.
        $customRuleRestriction->setObjectID(1);
        // type of tl_iso_rule_restrictions will be groups by default but can be changed later inside the backend.
        $customRuleRestriction->setType("groups");
        // save the new rule restriction when it does not already exist.
        $ruleRestrictionExists = $customRuleRestriction->checkRuleRestrictionExists();
        if (!$ruleRestrictionExists) {
            $customRuleRestriction->save();
        }

    }
}

?>