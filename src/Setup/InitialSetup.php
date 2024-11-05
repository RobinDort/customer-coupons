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
        if (empty($GLOBALS["INITIAL_SETUP"])) {

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
                $couponProductGroup->setProductType(32);
                $couponProductGroup->setSorting(900);
        
                // save for debug purpose
                $couponProductGroup->save();
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
                $couponProduct = new CouponProduct($couponProductType->id, $couponPage->id);
                $dbProductInteraction = new DBProductInteraction();
                $productCount = $dbProductInteraction->selectProduct($couponProduct->getAlias());
        
                if ($productCount === 0) {
                    $couponProduct->save();
        
                     // register the new product type in order to use it.
                    TypeAgent::registerModelType($couponProductType->getName(), CouponProduct::class);
                }
        
            }
        
            /**
             * Set the GLOBAL variable to prevent this code segment from running more than once.
             */
            $GLOBALS["INITIAL_SETUP"] = true;
        }

    }
}

?>