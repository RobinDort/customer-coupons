<?php
namespace RobinDort\CustomerCoupons\Database;

use RobinDort\CustomerCoupons\Database\DBTable;
use Contao\Database;

class DBRuleRestrictionInteraction extends DBTable {

    public function __construct() {
        $this->tableName = "tl_iso_rule_restriction";
    }

    public function selectRuleRestriction($pid, $type, $objID) {
        $stmt = "SELECT COUNT(*) as ruleRestrictionCount FROM " . $this->getTableName() . " WHERE pid=" . $pid . " AND type='" . $type . "' AND object_id=" . $objID;
        $rslt = Database::getInstance()->execute($stmt)->fetchAssoc();

        return $rslt["ruleRestrictionCount"] ?? 0;
    }
}

?>