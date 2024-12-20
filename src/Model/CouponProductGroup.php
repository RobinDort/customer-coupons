<?php
namespace RobinDort\CustomerCoupons\Model;

use Isotope\Model\Group;

class CouponProductGroup extends Group {

    private const NAME = "Coupons";

    private $productType;
    private $sorting;

    public function __construct() {
        parent::__construct();

        $unixTime = time();
        $this->tstamp = $unixTime;
        $this->name = self::NAME;
    }

    public function getName() {
        return $this->name;
    }

    public function setProductType($productTypeID) {
        $this->productType = $productTypeID;
    }

    public function setSorting($sorting) {
        $this->sorting = $sorting;
    }
}

?>