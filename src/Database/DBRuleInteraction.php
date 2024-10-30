<?php

namespace RobinDort\CustomerCoupons\Database;

use RobinDort\CustomerCoupons\Database\DBTable;
use Contao\Database;

class DBRuleInteraction extends DBTable {


    public function __construct() {
        $this->tableName = "tl_iso_rule";
    }

    public function selectRulesByName($ruleName) {
        $stmt = "SELECT COUNT(*) as ruleCount from " . $this->getTableName() . " WHERE name = '" . $ruleName . "'";

        $result = Database::getInstance()->execute($stmt)->fetchAssoc();

        return $result["ruleCount"] ?? 0;;
    }

}

?>