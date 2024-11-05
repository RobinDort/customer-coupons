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

     protected static $strTable = 'tl_iso_producttype';

     private const COUPON_NAME = "Coupon";
     private const COUPON_CLASS = "standard";
     private const COUPON_LIST_TEMPLATE = "iso_list_default";
     private const COUPON_READER_TEMPLATE = "iso_reader_default";
     private const COUPON_LIST_GALLERY = 17;
     private const COUPON_READER_GALLERY = 19;
     private const COUPON_ATTRIBUTES = array (
      'type' => [
          'enabled' => '1',
          'name' => 'type',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 0,
      ],
      'pages' => [
          'enabled' => '1',
          'name' => 'pages',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 1,
      ],
      'alias' => [
          'enabled' => '1',
          'name' => 'alias',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 2,
      ],
      'name' => [
          'enabled' => '1',
          'name' => 'name',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 3,
      ],
      'description' => [
          'enabled' => '1',
          'name' => 'name',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 4,
      ],
      'availability' => [
          'enabled' => '1',
          'name' => 'availability',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 5,
      ],
      'price' => [
          'enabled' => '1',
          'name' => 'price',
          'legend' => 'pricing_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 6,
      ],
      'images' => [
          'enabled' => '1',
          'name' => 'images',
          'legend' => 'media_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 7,
      ],
      'published' => [
          'enabled' => '1',
          'name' => 'published',
          'legend' => 'publish_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 8,
      ],
      'start' => [
          'enabled' => '1',
          'name' => 'start',
          'legend' => 'publish_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 9,
      ],
      'stop' => [
          'enabled' => '1',
          'name' => 'stop',
          'legend' => 'publish_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 10,
      ],
      'location' => [
          'enabled' => '1',
          'name' => 'location',
          'legend' => 'options_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 11,
      ],
      'pickup_time' => [
          'enabled' => '1',
          'name' => 'pickup_time',
          'legend' => 'options_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 12,
      ],
      'description' => [
          'enabled' => '',
          'name' => 'description',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 13,
      ],
      'sku' => [
          'enabled' => '',
          'name' => 'sku',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 14,
      ],
      'teaser' => [
          'enabled' => '',
          'name' => 'teaser',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 15,
      ],
      'gtin' => [
          'enabled' => '',
          'name' => 'gtin',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 16,
      ],
      'tracks' => [
          'enabled' => '',
          'name' => 'tracks',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 17,
      ],
      'date' => [
          'enabled' => '',
          'name' => 'date',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 18,
      ],
      'contao' => [
          'enabled' => '',
          'name' => 'contao',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 19,
      ],
      'featured' => [
          'enabled' => '',
          'name' => 'featured',
          'legend' => 'general_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 20,
      ],
      'baseprice' => [
          'enabled' => '',
          'name' => 'baseprice',
          'legend' => 'pricing_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 21,
      ],
      'meta_title' => [
          'enabled' => '',
          'name' => 'meta_title',
          'legend' => 'meta_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 22,
      ],
      'meta_description' => [
          'enabled' => '',
          'name' => 'meta_description',
          'legend' => 'meta_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 23,
      ],
      'meta_keywords' => [
          'enabled' => '',
          'name' => 'meta_keywords',
          'legend' => 'meta_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 24,
      ],
      'shipping_weight' => [
          'enabled' => '',
          'name' => 'shipping_weight',
          'legend' => 'shipping_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 25,
      ],
      'shipping_exempt' => [
          'enabled' => '',
          'name' => 'shipping_exempt',
          'legend' => 'shipping_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 26,
      ],
      'shipping_pickup' => [
          'enabled' => '',
          'name' => 'shipping_pickup',
          'legend' => 'shipping_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 27,
      ],
      'shipping_price' => [
          'enabled' => '',
          'name' => 'shipping_price',
          'legend' => 'shipping_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 28,
      ],
      'protected' => [
          'enabled' => '',
          'name' => 'protected',
          'legend' => 'expert_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 29,
      ],
      'guests' => [
          'enabled' => '',
          'name' => 'guests',
          'legend' => 'expert_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 30,
      ],
      'cssID' => [
          'enabled' => '',
          'name' => 'cssID',
          'legend' => 'expert_legend',
          'tl_class' => '',
          'mandatory' => '',
          'position' => 31,
      ],
   );

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

     public function getID() {
        return $this->id;
     }

}

?>