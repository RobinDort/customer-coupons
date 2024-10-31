<?php
namespace RobinDort\CustomerCoupons\Model;

use Isotope\Model\Group;

class CouponProductGroup extends Group {

    private const PID = 0;
    private const NAME = "Coupons";

    private $product_type;
    private $sorting;

    public function __construct() {
        parent::__construct();

        $unixTime = time();
        $this->tstamp = $unixTime;
        $this->pid = self::PID;
        $this->name = self::NAME;
    }

    public function getName() {
        return $this->name;
    }

    public function setProductType($productTypeID) {
        $this->product_type = $productTypeID;
    }

    public function setSorting($sorting) {
        $this->sorting = $sorting;
    }
}

?>