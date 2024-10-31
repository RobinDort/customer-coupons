<?php
namespace RobinDort\CustomerCoupons\Backend\Database;

use RobinDort\CustomerCoupons\Backend\Database\DBTable;
use Contao\Database;


class DBProductTypeInteraction extends DBTable {

    private const TABLE_NAME = "tl_iso_producttype";

    public function __construct() {
        $this->tableName = self::TABLE_NAME;
    }

    public function selectProductType($name) {
        $stmt = "SELECT COUNT(*) as productTypeCount FROM " . $this->getTableName() . " WHERE name = '" . $name . "'";

        $result = Database::getInstance()->execute($stmt)->fetchAssoc();

        return $result["productTypeCount"] ?? 0;;
    }
}

?>