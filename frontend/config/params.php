<?php

return [

    "seo" => [
//        "title" => [["tag" => "title", "WebSlides Tutorial: Classes"]],
//        "description" => ['tag' => 'meta', 'name' => "description", "content" => "WebSlides Cheat Sheet. A quick reference guide for beginners. This tutorial contains hundreds of HTML/CSS examples."],
        //meta
        'facebook' => [
            ["tag" => "meta", 'property' => "og:url", "content" => 'http://your-url.com/permalink'],
            ["tag" => "meta", 'property' => "og:type", "content" => 'article'],
            ["tag" => "meta", 'property' => "og:title", "content" => 'WebSlides Documentation: Classes'],
            ["tag" => "meta", 'property' => "og:description", "content" => 'A quick reference guide. This tutorial contains hundreds of HTML/CSS examples.'],
            ["tag" => "meta", 'property' => "og:updated_time", "content" => '2017-01-04T17:23:46'],
            ["tag" => "meta", 'property' => "og:image", "content" => '../static/images/share-webslides.jpg'],
        ],
        //meta
        "twitter" => [
            ["tag" => "meta", 'name' => "twitter:card", "content" => 'summary_large_image'],
            ["tag" => "meta", 'name' => "twitter:site", "content" => '@webslides'],
            ["tag" => "meta", 'name' => "twitter:creator", "content" => '@jlantunez'],
            ["tag" => "meta", 'name' => "twitter:title", "content" => 'WebSlides Documentation: Classes'],
            ["tag" => "meta", 'name' => "twitter:description", "content" => 'WebSlides Cheat Sheet.This tutorial contains hundreds of HTML/CSS examples.'],
            ["tag" => "meta", 'name' => "twitter:image", "content" => '../static/images/share-webslides.jpg'],
        ],
        //link
        "favicons" => [
            ["tag" => "link", 'rel' => "shortcut icon", "sizes" => '16x16', 'href' => 'favicons_16.png'],
            ["tag" => "link", 'rel' => "shortcut icon", "sizes" => '32x32', 'href' => 'favicons_32.png'],
            ["tag" => "link", 'rel' => "apple-touch-icon icon", "sizes" => '76x76', 'href' => 'favicons_76.png'],
            ["tag" => "link", 'rel' => "apple-touch-icon icon", "sizes" => '120x120', 'href' => 'favicons_120.png'],
            ["tag" => "link", 'rel' => "apple-touch-icon icon", "sizes" => '152x152', 'href' => 'favicons_152.png'],
            ["tag" => "link", 'rel' => "apple-touch-icon icon", "sizes" => '180x180', 'href' => 'favicons_180.png'],
            ["tag" => "link", 'rel' => "apple-touch-icon icon", "sizes" => '192x192', 'href' => 'favicons_192.png'],
        ],
        //link
        'canonical' => [
            ["tag" => "link", 'rel' => "canonical", 'href' => "http://your-url.com/permalink"],
            ["tag" => "meta", "name" => "mobile-web-app-capable", "content" => "yes"],
            ["tag" => "meta", "name" => "theme-color", "content" => "#333333"],
        ]

    ],

    "menu"=>[
        ["url"=>"/","label"=>'home',"options"=>[]],
        ["url"=>"/doc","label"=>'??????',"options"=>[]],
        ["url"=>"/doc/api","label"=>'??????',"options"=>[]],
    ],
    "pages" => [
        ["id" => 1, "category" => "", "tag" => "", "title" => "Google Translate Client??????api", "description" => "Google Translate??????api????????????", "md" => "./Google Translate Client.md"],
        ["id" => 2, "category" => "Js", "tag" => "js", "title" => "JS??????", "description" => "JS??????", "md" => "./1 JS??????.md"],
        ["id" => 3, "category" => "Css", "tag" => "css", "title" => "2022???Css????????????", "description" => "2022???Css????????????", "md" => "./2 2022???Css????????????.md"],
    ]
];
