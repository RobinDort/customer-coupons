<?php
namespace RobinDort\CustomerCoupons\Model;

use Isotope\Model\Product;
use Isotope\Model\ProductPrice;
use Isotope\Interfaces\IsotopeProductCollection;
use Contao\PageModel;

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

     protected static $strTable = 'tl_iso_product';

     private const PRODUCT_NAME = "Geschenkgutschein";
     private const PRODUCT_DESCRIPTION = "Geschenkgutschein, einzulösen in unserem Shop";
     private const PRODUCT_PRICE = 19.99;

     public function __construct() {
        parent::__construct();

        $unixTime = time();

        $this->pid = 0;
        $this->tstamp = $unixTime;
        $this->dateAdded = $unixTime;
        $this->alias = strtolower(self::PRODUCT_NAME);
        $this->name = self::PRODUCT_NAME;
        $this->description = self::PRODUCT_DESCRIPTION;
        $this->price = 19.99;
        $this->published = true;

        //create price
        $this->setProductPrice();
     }


     private function setProductPrice() {
        // Create a ProductPrice object
        $objPrice = new ProductPrice();

        // Set the price using arrData
        $objPrice->arrData = [
            'price' => self::PRODUCT_PRICE,   // Set the price
            'tier_keys' => '1',               // Tier quantity
            'tier_values' => self::PRODUCT_PRICE, // Price for the tier
            'tax_class' => 0                  // Assuming no tax class for simplicity
        ];

        // Associate this price with the product
        $objPrice->setProduct($this);

        // Save the price in the database
        $objPrice->save();
     }

     /**
      * @inheritdoc
      */
     public function getCategories($blnPublished = false) {}

     /**
      * @inheritdoc
      */
     public function getId() {
        return $this->id;
     }

     /**
      * @inheritdoc
      */
     public function getProductId() {
        return $this->pid;
     }

     public function setType($typeID) {
        $this->type = $typeID;
     }

     /**
      * @inheritdoc
      */
     public function getFormId(){}


     /**
      * @inheritdoc
      */
     public function getType() {
        return $this->type;
     }

     /**
      * @inheritdoc
      */
      public function getName() {
        return $this->name;
      }

      /**
       * @inheritdoc
       */
      public function getSku() {
        return $this->sku;
      }

      /**
       * @inheritdoc
       */
      public function isAvailableInFrontend() {
        return true;
      }

      /**
       * @inheritdoc
       */
      public function isAvailableForCollection(IsotopeProductCollection $objCollection) {}

      /**
       * @inheritdoc
       */
      public function isPublished() { 
        return $this->published;
      }

      /**
       * @inheritdoc
       */
      public function isNew() {}

      /**
       * @inheritdoc
       */
      public function isExemptFromShipping() {}

      /**
       * @inheritdoc
       */
      public function hasVariants() {}

      /**
       * @inheritdoc
       */
      public function getVariantIds() {}

      /**
       * @inheritdoc
       */
      public function isVariant() {}

      /**
       * @inheritdoc
       */
      public function hasVariantPrices() {}

      /**
       * @inheritdoc
       */
      public function hasAdvancedPrices() {}

      /**
       * @inheritdoc
       */
      public function getPrice(IsotopeProductCollection $objCollection = null) {}

       /**
       * @inheritdoc
       */
      public function getMinimumQuantity() {}

      /**
       * @inheritdoc
       */
      public function getOptions() {}

      /**
       * @inheritdoc
       */
      public function generate(array $arrConfig) {}

      /**
       * @inheritdoc
       */
      public function generateUrl(PageModel $objJumpTo = null/*, bool $absolute = false*/) {}
      


     public function setPages($pagesArr) {
        $this->pages = serialize($pagesArr);
     }

     public function setOrderPages($orderPagesArr) {
        $this->orderPages = serialize($orderPages);
     }

     public function getAlias() {
        return $this->alias;
     }

}

?>