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

     private const COUPON_NAME = "Coupon";
     private const COUPON_CLASS = "standard";
     private const COUPON_LIST_TEMPLATE = "iso_list_default";
     private const COUPON_READER_TEMPLATE = "iso_reader_default";
     private const COUPON_LIST_GALLERY = 17;
     private const COUPON_READER_GALLERY = 19;
     private const COUPON_ATTRIBUTES = array('name'=>'price', 'enabled'=>1);


     public function __construct() {
        parent::__construct();

        // set the new attributes and options of the coupons product type.
        $unixtime = time();
        $this->tstamp = $unixtime;
        $this->name = self::COUPON_NAME;
        $this->class = self::COUPON_CLASS;
        $this->list_template = self::COUPON_LIST_TEMPLATE;
        $this->reader_template = self::COUPON_READER_TEMPLATE;
        $this->list_gallery = self::COUPON_LIST_GALLERY;
        $this->reader_gallery = self::COUPON_READER_GALLERY;
        $this->attributes = serialize(self::COUPON_ATTRIBUTES);
     }


     public function getName() {
        return $this->name;
     }

}

?>