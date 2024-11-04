<?php
namespace RobinDort\CustomerCoupons\Model;

use Contao\ArticleModel;

class CouponArticle extends ArticleModel {

    /**
     * Properties extended from Contaos ArticleModel class.
     * @property integer $id
     * @property integer $pid
     * @property integer $sorting
     * @property integer $tstamp
     * @property string  $title
     * @property string  $alias
     * @property integer $author
     * @property string  $inColumn
     * @property string  $keywords
     * @property boolean $showTeaser
     * @property string  $teaserCssID
     * @property string  $teaser
     * @property string  $printable
     * @property string  $customTpl
     * @property boolean $protected
     * @property string  $groups
     * @property boolean $guests
     * @property string  $cssID
     * @property string  $space
     * @property boolean $published
     * @property string  $start
     * @property string  $stop
     * @property string  $classes
     */

     public function __construct() {
        parent::__construct();

        $unixTime = time();
     }

     private function findParentID() {
        
     }
}

?>