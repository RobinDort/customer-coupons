<?php

namespace RobinDort\CustomerCoupons\Backend\Database;

use Contao\Database;


class DBArticleInteraction extends DBTable {

    private const TABLE_NAME = "tl_article";

    public function __construct() {
        $this->tableName = self::TABLE_NAME;
    }
}
?>