<?php
use ShiGuangXiaoTou\Tag;

/**
 * @var $seo
 * @var $cssFile
 * @var $jsFile
 * @var $cssCode
 * @var $jsCode
 * @var $content
 * @var
 */
?>

<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CLEAN MARKUP = GOOD KARMA.
      Hi source code lover,

      you're a curious person and a fast learner ;)
      Let's make something beautiful together. Contribute on Github:
      https://github.com/webslides/webslides

      Thanks!
    -->

    <!-- SEO -->
    <title>WebSlides Tutorial: Classes</title>
    <meta name="description" content="">
    <?php
    foreach ($seo as $item) {
        echo Tag::createTag($item);
    }
    foreach ($cssFile as $item) {
        echo Tag::createTag($item);
    }
    foreach ($jsCode as $item) {
        echo Tag::createTag($item);
    }

    ?>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#333333">

    <link rel="stylesheet" type='text/css' media='all' href="../static/css/webslides.css">
    <link rel="stylesheet" type="text/css" media="all" href="../static/css/svg-icons.css">
</head>
<body>
    <?
    echo $content;
    foreach ($jsFile as $item) {
        echo Tag::createTag($item);
    }
    foreach ($jsCode as $item) {
        echo Tag::createTag($item);
    }
    ?>

<!--<script src="../static/js/webslides.js"></script>-->
<!--<script defer src="../static/js/svg-icons.js"></script>-->
<!--<script>window.ws = new WebSlides();</script>-->
</body>
</html>
