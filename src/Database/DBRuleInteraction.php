<?php

namespace RobinDort\CustomerCoupons\Database;
use Contao\Database;

class DBRuleInteraction {

    private const TABLE_NAME = "tl_iso_rule";

    public function selectRulesByName($ruleName) {
        $stmt = "SELECT COUNT(*) as ruleCount from " . self::TABLE_NAME . " WHERE name = '" . $ruleName . "'";

        $result = Database::getInstance()->execute($stmt)->fetch();

        return $result["ruleCount"] ?? 0;;
    }

}

?>