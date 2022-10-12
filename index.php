<?php
require_once  "./vendor/autoload.php";

use ShiGuangXiaoTou\Download;

define("BASE_PATH",dirname(__FILE__));
define("BASE_ASSETS",dirname(__FILE__)."/assets");

(new  Download())->run();