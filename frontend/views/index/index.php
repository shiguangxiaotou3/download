<?php

use \yii\web\View;
use \ShiGuangXiaoTou\models\FileInfo;

/** @var $this View */
/** @var $data array */

$files = FileInfo::getFiles(Yii::getAlias("@appAssets/webslides/static/images/background"));
$file= $files[rand(0,count($files)-1)];

$path = Yii::$app->assetManager->getPublishedUrl("@appAssets/webslides");
?>

<section>

    <span class="background" style="background-image:url('<?= $path ?>/static/images/background/<?=$file  ?>')"></span>
    <!--.wrap = container (width: 90%) -->
    <div class="wrap aligncenter">
        <h1 class=""><strong>Create beautiful stories</strong></h1>
        <p class="text-intro">WebSlides makes HTML presentations easy.<br>
            Just the essentials and using lovely CSS.
        </p>
        <p>
            <a href="https://webslides.tv/webslides-latest.zip" class="button zoomIn" title="Download WebSlides for free">
                <svg class="fa-cloud-download">
                    <use xlink:href="#fa-cloud-download"></use>
                </svg>
                WebSlides
            </a>
        </p>
    </div>
    <!-- .end .wrap -->
</section>



<section>
    <div class="wrap">
        <h2>Features</h2>
        <ul class="flexblock features">
            <li>
                <div>
                    <h2>
                        <span>&rarr;</span>
                        Simple Navigation
                    </h2>
                    with arrow keys, presenter...
                </div>
            </li>
            <li>
                <div>
                    <h2>
                        <svg class="fa-link">
                            <use xlink:href="#fa-link"></use>
                        </svg>
                        Permalinks
                    </h2>
                    Go to a specific slide.
                </div>
            </li>
            <li>
                <div>
                    <h2>
                        <svg class="fa-clock-o">
                            <use xlink:href="#fa-clock-o"></use>
                        </svg>
                        Slide Counter
                    </h2>
                    Current/Total number.
                </div>
            </li>
            <li>
                <div>
                    <h2>
                        <span>40<sup>+</sup></span>
                        Beautiful Components
                    </h2>
                    Covers, cards, quotes...
                </div>
            </li>
            <li>
                <div>
                    <h2>
                        <svg class="fa-text-height">
                            <use xlink:href="#fa-text-height"></use>
                        </svg>
                        Vertical Rhythm
                    </h2>
                    Use multiples of 8.
                </div>
            </li>
            <li>
                <div>
                    <h2>
                        <span>500<sup>+</sup></span>
                        SVG Icons
                    </h2>
                    Font Awesome Kit.
                </div>
            </li>
        </ul>
    </div>
</section>

<section>
    <div class="wrap">
        <h2><strong>WebSlides Demos</strong></h2>
        <p>Contribute on <a href="https://github.com/webslides/webslides" title="Contribute on Github">Github</a>. <span class="alignright"><a href="demos/index.html" title="WebSlides Demos">View all &rsaquo;</a></span></p>
        <ul class="flexblock gallery">
            <li>
                <a href="demos/why-webslides.html" title="Why WebSlides?">
                    <figure>
                        <img alt="Thumbnail Why WebSlides?" src="https://webslides.tv/static/images/demos-why.png">
                        <figcaption>
                            <h2>Why WebSlides?</h2>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="demos/landings.html" title="Landings">
                    <figure>
                        <img alt="Thumbnail Landings" src="https://webslides.tv/static/images/demos-landings.png">
                        <figcaption>
                            <h2>Landings</h2>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="demos/portfolios.html" title="Portfolios">
                    <figure>
                        <img alt="Thumbnail Portfolios" src="https://webslides.tv/static/images/demos-portfolios.png">
                        <figcaption>
                            <h2>Portfolios</h2>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="demos/keynote.html" title="Apple Keynote">
                    <figure>
                        <img alt="Thumbnail Apple Keynote" src="https://webslides.tv/static/images/demos-apple.png">
                        <figcaption>
                            <h2>Apple Keynote</h2>
                        </figcaption>
                    </figure>
                </a>
            </li>
        </ul>
    </div>
    <!-- .end .wrap -->
</section>

<section>
    <div class="wrap">
        <div class="grid vertical-align">
            <div class="column">
                <h4>
                    <svg class="fa-life-ring">
                        <use xlink:href="#fa-life-ring"></use>
                    </svg>
                    <strong>Guides</strong>
                </h4>
                <p>If you need help, here's just some tutorials. Just a basic knowledge of HTML is required:</p>
                <ul class="description">
                    <li><a href="/demos/components.html" title="WebSlides Components">Components</a> &middot; <a href="/demos/classes.html" title="WebSlides Classes">Classes</a>.</li>
                    <li><a href="https://codepen.io/webslides" title="WebSlides on Codepen">WebSlides on Codepen</a>.</li>
                    <li><a href="/demos/media.html" title="WebSlides Media">WebSlides Media: images, videos...</a></li>
                </ul>
            </div>
            <div class="column">
                <figure><img class="aligncenter" src="" alt="WebSlides Files"></figure>
            </div>
            <div class="column">
                <h4>
                    <svg class="fa-cubes">
                        <use xlink:href="#fa-cubes"></use>
                    </svg>
                    <strong>Built to expand</strong>
                </h4>
                <p>The best way to <strong>inspire with your content</strong> is to connect on a personal level:</p>
                <ul class="description">
                    <li>Background images: <a href="http://unsplash.com">Unsplash</a>.</li>
                    <li>CSS animations: <a href="https://daneden.github.io/animate.css/">Animate.css</a>.</li>
                    <li>Longforms: <a href="http://michalsnik.github.io/aos/"> Animate on scroll</a>.</li>
                </ul>
            </div>
        </div>
        <!--end .grid -->
    </div>
</section>

<section class="aligncenter">
    <!-- .wrap = container (width: 90%) -->
    <div class="wrap">
        <h2><strong>Ready to Start?</strong> </h2>
        <p class="text-intro">Create your own presentation instantly. <br>120+ premium slides ready to use.</p>
        <p>
            <a href="https://webslides.tv/webslides-latest.zip" class="button" title="Download WebSlides">
                <svg class="fa-cloud-download">
                    <use xlink:href="#fa-cloud-download"></use>
                </svg>
                Free Download
            </a>
            <span class="try">
                <a href="https://www.paypal.me/jlantunez/8" title="Thanks :)">
                  <svg class="fa-paypal">
                    <use xlink:href="#fa-paypal"></use>
                  </svg>
                  Pay what you want.
                </a>
              </span>
        </p>
    </div>
    <!-- .end .wrap -->
</section>

<section class="slide-bottom">
    <div class="wrap">
        <div class="content-right text-serif">
            <h2>
                <strong>Thanks.</strong>
                <a target="_blank" title="Share on Twitter" href="#">
                    <svg class="fa-twitter">
                        <use xlink:href="#fa-twitter"></use>
                    </svg>
                </a>
            </h2>
            <p>People share content that makes them feel inspired. WebSlides is a very effective way to engage young audiences, customers, and teams.</p>
            <p>Best,<br> <a href="https://twitter.com/jlantunez">@jlantunez</a>, <a href="https://twitter.com/belelros">@belelros</a>, and <a href="https://twitter.com/luissacristan">@luissacristan</a>.</p>
        </div>
        <!-- .end .content-right -->
    </div>
    <!-- .end .wrap -->
</section>