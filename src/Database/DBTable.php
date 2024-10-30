<?php
namespace RobinDort\CustomerCoupons\Database;


abstract class DBTable {
    protected $tableName;

    public function getTableName() {
        return $this->tableName;
    }
}

?>