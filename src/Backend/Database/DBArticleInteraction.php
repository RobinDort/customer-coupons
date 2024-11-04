<?php

namespace RobinDort\CustomerCoupons\Backend\Database;

use Contao\Database;


class DBArticleInteraction extends DBTable {

    private const TABLE_NAME = "tl_article";

    public function __construct() {
        $this->tableName = self::TABLE_NAME;
    }

    public function selectArticle($title) {
        $stmt = "SELECT COUNT(*) as articleCount FROM " . $this->getTableName() . " WHERE title='" . $title . "'";
        $result = Database::getInstance()->execute($stmt)->fetchAssoc();

        return $result["articleCount"] ?? 0;
    }
}
?>