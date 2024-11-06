<?php
namespace RobinDort\CustomerCoupons\Setup;

use RobinDort\CustomerCoupons\Model\CouponProductType;
use RobinDort\CustomerCoupons\Model\CouponProductGroup;
use RobinDort\CustomerCoupons\Model\CouponPage;
use RobinDort\CustomerCoupons\Model\CouponArticle;
use RobinDort\CustomerCoupons\Model\CouponProduct;

use RobinDort\CustomerCoupons\Backend\Database\DBProductTypeInteraction;
use RobinDort\CustomerCoupons\Backend\Database\DBProductGroupInteraction;
use RobinDort\CustomerCoupons\Backend\Database\DBPageInteraction;
use RobinDort\CustomerCoupons\Backend\Database\DBProductInteraction;

class InitialSetup {
    public function runSetup() {
        
        /**
         * Create new product type for customer coupons.
         */
        $couponProductType = new CouponProductType();
    
        /** 
         * Check if the coupon product type exists.
         * */
        $dbProductTypeInteraction = new DBProductTypeInteraction();
        $couponProductTypeCount = $dbProductTypeInteraction->selectProductType($couponProductType->getName());
        if ($couponProductTypeCount === 0) {
            // save new product type 
            $couponProductType->save();
    

            /**
             * Create product group for the coupons
             */
            $couponProductGroup = new CouponProductGroup();
            $dbProductGroupInteraction = new DBProductGroupInteraction();

            if ($dbProductGroupInteraction->selectProductGroup($couponProductGroup->getName()) === 0) {
                $couponProductGroup->setProductType($couponProductType->id);
                $couponProductGroup->setSorting(900);
        
                // save group
                $couponProductGroup->save();
            }
        }
    
        /**
         * Create new page that displays later on newly created product "coupon".
         */
        $couponPage = new CouponPage();
        
        // Check if the page already exists.
        $dbPageInteraction = new DBPageInteraction();
    
        if (!$couponPage->selfExists()) {
            // Get parent page ID.
            $parentPageID = $dbPageInteraction->selectActiveRootID();
            $couponPage->setParentPageID($parentPageID);
    
            // save the new page
            $couponPage->save();
    
    
            // create an article inside the new page to handle coupon content.
            $couponArticle = new CouponArticle();
    
            // check if article exists
            if (!$couponArticle->selfExists()) {
                $couponArticle->save();
            }
    
            // Create new isotope product with different prices to represent the coupons.
            $couponProduct = new CouponProduct();
            $dbProductInteraction = new DBProductInteraction();
            $productCount = $dbProductInteraction->selectProduct($couponProduct->getAlias());
    
           // if ($productCount === 0) {
                // register the new product type in order to use it.
                TypeAgent::registerModelType("Coupon", CouponProduct::class);

                // $couponProductOrderPages = array(
                //     "0" => 171
                // );
                // $couponProduct->setType($couponProductType->id);
                // $couponProduct->setPages($couponProductOrderPages);
                // $couponProduct->setOrderPages($couponProductOrderPages);

                $couponProduct->save();
    
           // }
    
        }

    }
}

?>