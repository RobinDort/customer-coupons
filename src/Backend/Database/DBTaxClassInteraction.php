<?php
namespace RobinDort\CustomerCoupons\Backend\Database;

use RobinDort\CustomerCoupons\Backend\Database\DBTable;
use Contao\Database;


class DBTaxClassInteraction extends DBTable {

    private const TABLE_NAME = "tl_iso_tax_class";

    public function __construct() {
        $this->tableName = self::TABLE_NAME;
    }


    public function selectTaxClassID($taxClassName) {
        $stmt = "SELECT id from " . $this->getTableName() . " WHERE name ='" . $taxClassName . "'";

        $rslt = Database::getInstance()->execute($stmt)->fetchAssoc();

        return $rslt["id"] ?? 1;
    }
}

?>