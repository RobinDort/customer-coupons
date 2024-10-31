<?php
namespace RobinDort\CustomerCoupons\Model;

use Isotope\Model\ProductType;

class CouponProductType extends ProductType {

    /**
     * Properties extended from Contaos/Isotopes Model/ProductType class.
     * @property int    $id
     * @property int    $tstamp
     * @property string $name
     * @property string $class
     * @property bool   $fallback
     * @property string $description
     * @property bool   $prices
     * @property bool   $show_price_tiers
     * @property string $list_template
     * @property string $reader_template
     * @property int    $list_gallery
     * @property int    $reader_gallery
     * @property string $cssClass
     * @property array  $attributes
     * @property bool   $variants
     * @property array  $variant_attributes
     * @property bool   $force_variant_options
     * @property string $shipping_exempt
     * @property bool   $downloads
     */


     public function __construct() {
        parent::__construct();
     }

}

?>