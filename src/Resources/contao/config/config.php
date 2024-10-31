<?php
use RobinDort\CustomerCoupons\Model\CustomRule;
use RobinDort\CustomerCoupons\Model\CustomRuleRestriction;
use RobinDort\CustomerCoupons\Backend\Rule\SaveRuleCallback;

$customRule = new CustomRule();
$ruleExists = $customRule->checkRuleExists();

if (!$ruleExists) {
    $customRule->save();

    $newRuleID = $customRule->getRuleID();
    if ($newRuleID !== null) {
        // prepare new restrictions for that rule

        // get only the object_id restrictions with ID of 1 by default.
        $objID = [1];
        $varValue = serialize($objID);

        // create a new data container and set its properties according to the needed restriction.
        $dc = new \stdClass();
        $dc->id = $newRuleID;
        $dc->table = "tl_iso_rule_restriction";
        $dc->field = "groups";
        $dc->activeRecord= new \stdClass();
        $dc->activeRecord->id = 1;

        $saveRuleCallback = new SaveRuleCallback();
        $saveRuleCallback->saveRestrictions($varValue, $dc);

    }
}

?>