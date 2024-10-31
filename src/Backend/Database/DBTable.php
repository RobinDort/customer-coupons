<?php
namespace RobinDort\CustomerCoupons\Backend\Database;


abstract class DBTable {
    protected $tableName;

    public function getTableName() {
        return $this->tableName;
    }
}

?>