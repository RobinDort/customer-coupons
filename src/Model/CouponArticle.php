<?php
namespace RobinDort\CustomerCoupons\Model;

use Contao\ArticleModel;
use Contao\PageModel;

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

     public function __construct() {
        parent::__construct();

        $unixTime = time();
        $this->pid = $this->findParentID();
        $this->title = self::ARTICLE_TITLE;
        $this->time = $unixTime;
        $this->author = 1;
        $this->published = true;
     }

     private function findParentID() {
        // find the parent page and its ID by searching for its title. Same title as the articles.
        $parentPage = PageModel::findByTitle(self::ARTICLE_TITLE);

        // Check if $parentPage is a collection or a single model, then return its ID
        if ($parentPage instanceof \Model\Collection) {
            return $parentPage->current()->id ?? 1;
        }
        return $parentPage->id ?? 1;
        
     }

     public function getTitle() {
        return $this->title;
     }
}

?>