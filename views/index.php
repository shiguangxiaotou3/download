<?php
use ShiGuangXiaoTou\PrintTable;
/** @var $th array */
/** @var $files array */
/** @var $domain array */
$str =<<<HTML
Download_Task(post)                        创建下载任务
  eq:http://{$domain}?Download_Task={url}&save_path=.\/test.png
download file(get)                         下载文件
  eq:http://{$domain}test.txt
HTML;

define("ASSETS","./assets/");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?= ASSETS ?>js/highlight/styles/monokai_sublime.css" type="text/css" />
    <link rel="stylesheet" href="<?= ASSETS ?>css/download.css" type="text/css" />
    <link rel="stylesheet" href="<?= ASSETS ?>js/jvectormap/jquery-jvectormap.css" type="text/css" />
    <script src="<?= ASSETS ?>js/highlight/highlight.pack.js" type="text/javascript"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>
<body style="margin: 0;padding: 0">
<div class="wrapper">
    <h1>时光小偷的代理下载插件:1.0.0</h1>
    <p><b>你可以使用控制台或者浏览器,创建下载任务和下载文件</b></p>
    <p>以下命令可以使用:</p>
    <pre><code><?= $str ?></code></pre>
    <p> 文件列表:</p>
    <pre><code><?= PrintTable::Print_table($files, $th) ?></code></pre>
    <p>Visits</p>
    <div id="world-map-markers" style="height: 325px;"></div>
</div>
</body>
    <script src="<?= ASSETS ?>js/jquery/dist/jquery.js"></script>
    <script src="<?= ASSETS ?>js/chart.js/Chart.js"></script>
    <script src="<?= ASSETS ?>js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?= ASSETS ?>js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= ASSETS ?>js/jvectormap/jquery-jvectormap-cn-merc-en.js"></script>
    <script src="<?= ASSETS ?>js/download.js"></script>
</html>