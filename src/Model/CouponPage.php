<?php
namespace RobinDort\CustomerCoupons\Model;

use Contao\PageModel;
use RobinDort\CustomerCoupons\Backend\Database\DBPageInteraction;

class CouponPage extends PageModel {
    /**
     * Properties extended from Contaos PageModel class.
     * @property integer $id
     * @property integer $pid
     * @property integer $sorting
     * @property integer $tstamp
     * @property string  $title
     * @property string  $alias
     * @property string  $type
     * @property string  $pageTitle
     * @property string  $language
     * @property string  $robots
     * @property string  $description
     * @property string  $redirect
     * @property integer $jumpTo
     * @property string  $url
     * @property boolean $target
     * @property string  $dns
     * @property string  $staticFiles
     * @property string  $staticPlugins
     * @property boolean $fallback
     * @property string  $adminEmail
     * @property string  $dateFormat
     * @property string  $timeFormat
     * @property string  $datimFormat
     * @property boolean $createSitemap
     * @property string  $sitemapName
     * @property boolean $useSSL
     * @property boolean $autoforward
     * @property boolean $protected
     * @property string  $groups
     * @property boolean $includeLayout
     * @property integer $layout
     * @property integer $mobileLayout
     * @property boolean $includeCache
     * @property integer $cache
     * @property boolean $includeChmod
     * @property integer $cuser
     * @property integer $cgroup
     * @property string  $chmod
     * @property boolean $noSearch
     * @property string  $cssClass
     * @property string  $sitemap
     * @property boolean $hide
     * @property boolean $guests
     * @property integer $tabindex
     * @property boolean $accesskey
     * @property boolean $published
     * @property string  $start
     * @property string  $stop
     * @property array   $trail
     * @property string  $mainAlias
     * @property string  $mainTitle
     * @property string  $mainPageTitle
     * @property string  $parentAlias
     * @property string  $parentTitle
     * @property string  $parentPageTitle
     * @property string  $folderUrl
     * @property integer $rootId
     * @property string  $rootAlias
     * @property string  $rootTitle
     * @property string  $rootPageTitle
     * @property string  $domain
     * @property string  $rootLanguage
     * @property boolean $rootIsPublic
     * @property boolean $rootIsFallback
     * @property boolean $rootUseSSL
     * @property string  $rootFallbackLanguage
     * @property array   $subpages
     * @property string  $outputFormat
     * @property string  $outputVariant
     * @property boolean $hasJQuery
     * @property boolean $hasMooTools
     * @property boolean $isMobile
     * @property string  $template
     * @property string  $templateGroup
     * */



     public function __construct() {
        parent::__construct();

        $unixTime = time();
        
        $this->pid = findParentID();
        // Set the sorting of the new page directly after the root.
        $this->sorting = $this->pid + 1; 
        $this->tstamp = $unixTime;
        $this->title = $GLOBALS['TL_LANG']['MOD']['coupon_page'];
        $this->pageTitle = $GLOBALS['TL_LANG']['MOD']['coupon_page'];
        $this->type = "regular";
        $this->robots = "index,follow";
        $this->redirect = "permanent";
        $this->jumpTo = 0;
        $this->includeLayout = true;
        $this->layout = 2;
        $this->chmod = serialize(array(
         0 => "u1",
         1 => "u2",
         2 => "u3",
         3 => "u4",
         4 => "u5",
         5 => "u6",
         6 => "g4",
         7 => "g5",
         8 => "g6"
        ));
        $this->sitemap = "map_default";
        $this->hide = true;
        $this->published = true;
     }


     private function findParentID() {
        $dbPageInteraction = new DBPageInteraction();
        $rootID = $dbPageInteraction->selectActiveRootID();
        return $rootID;
     }
}

?>