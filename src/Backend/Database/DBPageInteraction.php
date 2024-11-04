<?php
namespace RobinDort\CustomerCoupons\Backend\Database;

use RobinDort\CustomerCoupons\Backend\Database\DBTable;
use Contao\Database;


class DBPageInteraction extends DBTable {

    private const TABLE_NAME = "tl_page";

    public function __construct() {
        $this->tableName = self::TABLE_NAME;
    }


    public function selectActiveRootID() {
        $stmt = "SELECT id FROM " . $this->getTableName() . " WHERE type='root' AND fallback=1";
        $result = Database::getInstance()->execute($stmt)->fetchAssoc();

        return $result["id"] ?? 1;
    }

    public function selectPage($name) {
        $stmt = "SELECT COUNT(*) as pageCount FROM " . $this->getTableName() . " WHERE title='" . $name . "'";
        $result = Database::getInstance()->execute($stmt)->fetchAssoc();

        return $result["pageCount"] ?? 0;
    }
}

?>