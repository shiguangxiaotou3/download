<?php
require_once "./../vendor/autoload.php";
use ShiGuangXiaoTou\Download;
$config =  require_once "./../src/config.php";
(new Download($config))->run();

