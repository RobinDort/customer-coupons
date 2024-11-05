<?php
namespace RobinDort\CustomerCoupons\Model;

use Isotope\Model\Product;

class CouponProduct extends Product {
    /**
     * Properties extended from Contaos/Isotopes Model/Product class.
     * @property int    $id
     * @property int    $pid
     * @property int    $gid
     * @property int    $tstamp
     * @property string $language
     * @property int    $dateAdded
     * @property int    $type
     * @property array  $pages
     * @property array  $orderPages
     * @property array  $inherit
     * @property bool   $fallback
     * @property string $alias
     * @property string $sku
     * @property string $name
     * @property string $teaser
     * @property string $description
     * @property string $meta_title
     * @property string $meta_description
     * @property string $meta_keywords
     * @property bool   $shipping_exempt
     * @property array  $images
     * @property bool   $protected
     * @property array  $groups
     * @property bool   $guests
     * @property array  $cssID
     * @property bool   $published
     * @property string $start
     * @property string $stop
     */

     private const PRODUCT_NAME = "Geschenkgutschein";
     private const PRODUCT_DESCRIPTION = "<p class='p1'><span class='s1'><strong>Geschenkgutschein</strong>, einzulösen in unserem Shop</span></p>";

     public function __construct($productTypeID, $productPageID) {
        parent::__construct();

        $unixTime = time();
        $this->tstamp = $unixTime;
        $this->dateAdded = $unixTime;
        $this->type = $productTypeID;
        $this->pages = array(
            "0" => $productPageID
        );
        $this->orderPages = array(
            "0" => $productPageID
        );
        $this->alias = strtolower(self::PRODUCT_NAME);
        $this->name = self::PRODUCT_NAME;
        $this->description = self::PRODUCT_DESCRIPTION;
        $this->published = true;
     }

     public function getAlias() {
        return $this->alias;
     }

}

?>