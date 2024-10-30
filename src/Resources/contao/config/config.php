<?php
use RobinDort\CustomerCoupons\Model\CustomerRule;

$customerRule = new CustomerRule();
$ruleExists = $customerRule->checkRuleExists();

if (!$ruleExists) {
    $customerRule->save();
}

?>