<?php
function dump($res){
    echo "<pre>";
    print_r($res);
    echo "</pre>";
}
return [
    "basePath"=>dirname( __DIR__),
    "assetsPath"=>"./assets/files",
    "savePath"=>"./assets/files",
    "ipInfo"=>[
        "url"=>"http://ipinfo.io/",
        'token' => '7265d1b29d49c2'
    ],
    'ignore'=>[".", "..", ".idea", "ip.txt", "download.txt", "index.php", ".htaccess"],
    "domain"=>"http://download.myweb.com/",//$_SERVER["HTTP_HOST"],
];

