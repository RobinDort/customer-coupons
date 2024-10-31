<?php
use RobinDort\CustomerCoupons\Backend\Group\SaveGroupCallback;

$GLOBALS['TL_DCA']['tl_iso_group']["config"]["onload_callback"] = [SaveGroupCallback::class, 'checkPermission'];

?>