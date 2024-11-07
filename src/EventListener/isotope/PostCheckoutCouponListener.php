<?php

namespace RobinDort\CustomerCoupons\EventListener\isotope;

use Isotope\Model\ProductCollection\Order;


class PostCheckoutCouponListener {

    public function __invoke(Order $order, array $tokens): void {
        
    }
}

?>