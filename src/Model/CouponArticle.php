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

     private const ARTICLE_TITLE = "Coupons";

     public function __construct($parentID) {
        parent::__construct();

        $unixTime = time();
        $this->pid = $parentID;
        $this->title = self::ARTICLE_TITLE;
        $this->time = $unixTime;
        $this->author = 1;
     }

     public function getTitle() {
        return $this->title;
     }
}

?>