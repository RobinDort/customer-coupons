<?php
namespace RobinDort\CustomerCoupons\Model;

use RobinDort\CustomerCoupons\Backend\Database\DBRuleRestrictionInteraction;
use Isotope\Model\Rule;

class CustomRuleRestriction extends Rule {

    private $pid;
    private $object_id;
    private $type;
    
    protected static $strTable = 'tl_iso_rule_restriction';

    public function __construct() {
        parent::__construct();
    }

    public function checkRuleRestrictionExists() {
        $dbRuleRestrictionInteraction = new DBRuleRestrictionInteraction();
        $ruleRestrictionCount = $dbRuleRestrictionInteraction->selectRuleRestriction($this->pid,$this->type,$this->object_id);

        if ($ruleRestrictionCount > 0) {
            return true;
        }

        return false;
    }


    public function setParentID($parentID) {
        $this->pid = $parentID;
    }

    public function setObjectID($objectID) {
        $this->object_id = $objectID;
    }

    public function setType($type) {
        $this->type = $type;
    }
}

?>