<?php
namespace RobinDort\CustomerCoupons\Backend\Database;

use RobinDort\CustomerCoupons\Backend\Database\DBTable;
use Contao\Database;

class DBProductGroupInteraction extends DBTable {

    private const TABLE_NAME = "tl_iso_group";

    public function __construct() {
        $this->tableName = self::TABLE_NAME;
    }

    public function selectMaxSorting() {
        $stmt = "SELECT MAX(sorting) as maxSorting FROM " . $this->getTableName();
        $result = Database::getInstance()->execute($stmt)->fetchAssoc();
        
        return $result["maxSorting"] ?? 0;
    }

    public function selectProductGroup($name) {
        $stmt = "SELECT COUNT(*) as productGroupCount FROM " . $this->getTableName() . " WHERE name= '" . $name . "'";
        $result = Database::getInstance()->execute($stmt)->fetchAssoc();
        
        return $result["productGroupCount"] ?? 0;
    }
}

?>