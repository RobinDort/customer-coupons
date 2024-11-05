<?php
namespace RobinDort\CustomerCoupons\Backend\Database;

use RobinDort\CustomerCoupons\Backend\Database\DBTable;
use Contao\Database;

class DBProductInteraction extends DBTable {

    private const TABLE_NAME = "tl_iso_product";

    public function __construct() {
        $this->tableName = self::TABLE_NAME;
    }

    public function selectProduct($alias) {
        $stmt = "SELECT COUNT(*) as productCount FROM " . $this->getTableName() . " WHERE alias = '" . $alias . "'";
        $result = Database::getInstance()->execute($stmt)->fetchAssoc();

        return $result["productCount"] ?? 0;
    }
}


?>