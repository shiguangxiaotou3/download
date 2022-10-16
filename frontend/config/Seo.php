<?php

return [
    "title"=>[["tag"=>"title","WebSlides Tutorial: Classes"]],
    "description"=>['tag'=>'meta','name'=>"description","content"=>"WebSlides Cheat Sheet. A quick reference guide for beginners. This tutorial contains hundreds of HTML/CSS examples."],
    //meta
    'facebook' => [
        ['property' => "og:url", "content" => 'http://your-url.com/permalink'],
        ['property' => "og:type", "content" => 'article'],
        ['property' => "og:title", "content" => 'WebSlides Documentation: Classes'],
        ['property' => "og:description", "content" => 'A quick reference guide. This tutorial contains hundreds of HTML/CSS examples.'],
        ['property' => "og:updated_time", "content" => '2017-01-04T17:23:46'],
        ['property' => "og:image", "content" => '../static/images/share-webslides.jpg'],
    ],
    //meta
    "twitter" => [
        ["tag"=>"meta", 'name' => "twitter:card", "content" => 'summary_large_image'],
        ["tag"=>"meta",'name' => "twitter:site", "content" => '@webslides'],
        ["tag"=>"meta",'name' => "twitter:creator", "content" => '@jlantunez'],
        ["tag"=>"meta",'name' => "twitter:title", "content" => 'WebSlides Documentation: Classes'],
        ["tag"=>"meta",'name' => "twitter:description", "content" => 'WebSlides Cheat Sheet.This tutorial contains hundreds of HTML/CSS examples.'],
        ["tag"=>"meta",'name' => "twitter:image", "content" => '../static/images/share-webslides.jpg'],
    ],
    //link
    "favicons" => [
        ["tag"=>"link",'rel' => "shortcut icon", "sizes" => '16x16', 'href' => '/assets/img/favicons/favicons_16.png'],
        ["tag"=>"link",'rel' => "shortcut icon", "sizes" => '32x32', 'href' => '/assets/img/favicons/favicons/favicons_32.png'],
        ["tag"=>"link",'rel' => "apple-touch-icon icon", "sizes" => '76x76', 'href' => '/assets/img/favicons/favicons_76.png'],
        ["tag"=>"link",'rel' => "apple-touch-icon icon", "sizes" => '120x120', 'href' => '/assets/img/favicons/favicons_120.png'],
        ["tag"=>"link",'rel' => "apple-touch-icon icon", "sizes" => '152x152', 'href' => '/assets/img/favicons/favicons_152.png'],
        ["tag"=>"link",'rel' => "apple-touch-icon icon", "sizes" => '180x180', 'href' => '/assets/img/favicons/favicons_180.png'],
        ["tag"=>"link",'rel' => "apple-touch-icon icon", "sizes" => '192x192', 'href' => '/assets/img/favicons/favicons_192.png'],
    ],
    //link
    'canonical'=>[
        ["tag"=>"link",'rel'=>"canonical", 'href'=>"http://your-url.com/permalink"]
    ]

];
