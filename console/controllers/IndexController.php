<?php


namespace console\controllers;


use yii\console\Controller;

/**
 * 地图翻译
 * @package console\controllers
 */
class IndexController extends Controller
{

    const savePath ="./assets/jvectormap/maps/run";

    /**
     * 获取地图数据
     */
    public function actionIndex(){
        $base_path ="./assets/jvectormap/";
        $files = [
            [
                "file" => './assets/publish/jvectormap-maps-data/dist/maps/city/china/cn_mill.js',
                "json_file" => "./assets/publish/jvectormap-maps-data/dist/maps/city/china/cn_mill_language/zh.json",
                "replace" => [
                    "jQuery.fn.vectorMap('addMap', 'cn_merc'," => '',
                    ");" => "",
                    "%"=>""
                ],
            ],
        ];

        foreach ( $files   as $file){
            self:: recursionCreate(dirname( $file['json_file']),$base_path);
            $json_str = file_get_contents($file['file']);

            foreach ($file['replace'] as $key=>$value){
                $json_str = str_replace( $key,$value,$json_str);
            }

            $arr = json_decode($json_str,true);
            $insets =isset($arr["insets"][0]) ? json_encode( $arr["insets"][0]):json_encode([]);
            $paths =$arr["paths"];
            $names =[];
            foreach ($paths as $key =>$item){
                $names[] ="         {\"code\":\"".$key."\",\"name\":\"".$item['name']."\"}";
            }

            $str = join(",\n",$names);
            $template =<<<JSON
{
    "insets":{$insets},
    "names":[
{$str}
    ] 
}
JSON;
//            echo $template."\r";

            file_put_contents($file['json_file'],$template,FILE_APPEND);
        }

    }

    public function actionA(){
        $path ="./assets/jvectormap/maps/a";
        self::json_to_js_a( $path );
    }

    /**
     * @param $path
     * @param string $tag 分类
     */
    public static function  json_to_js_a($path, $tag ="city"){
        $base_path ="./assets/jvectormap/maps/a/";

        $files  = scandir($path);
        foreach ($files as $file){
            if($file !="." and $file !==".." ){
                if(is_dir( $path."/".$file)){
                    self::json_to_js_a($path."/".$file);
                }
                if(is_file($path."/".$file)){
                    $str = file_get_contents($path."/".$file);
                    $arr = json_decode($str,true);
                    $maps_name = $arr["name"];

                    $insets = isset($arr["content"]["insets"]) ? json_encode( $arr["content"]["insets"]) : json_encode([]);
                    $paths = json_encode($arr["content"]['paths']);
                    $height = $arr["content"]['height'];
                    $projection = isset($arr["content"]['projection'])? json_encode($arr["content"]['projection']): json_encode([]);
                    $width =$arr["content"]['width'];
                    $template=<<<JSON
jQuery.fn.vectorMap("addMap", "{$maps_name}", {
    "insets":{$insets},
    "paths":{$paths},
    "height": {$height},
    "projection": {$projection}, 
    "width": {$width}
});
JSON;
                    $tmp = explode("/",str_replace($base_path,"", dirname($path."/".$file))) ;
                    $dirname = $tmp[0];
                    $save_path = self::savePath ."/".$tag."/".$dirname."/".$maps_name.".js";
                    $language_save_path = self::savePath ."/".$tag."/".$dirname."/".$maps_name."_language/en.json";
                    self::recursionCreate(dirname($save_path));
                    self::recursionCreate(dirname($language_save_path));
                    file_put_contents(self::file_name( $save_path),$template,FILE_APPEND);
                    self::language(
                         $arr["content"]['paths'],
                        isset($arr["content"]["insets"][0]) ? $arr["content"]["insets"][0]:[],
                       $language_save_path);
                }
            }
        }
    }

    public function actionB(){
        self::json_to_js_b("./assets/jvectormap/maps/b");
    }

    public static function json_to_js_b($path,$tag ="region")
    {
        $base_path = "./assets/jvectormap/maps/b/";
        $files = scandir($path);
        foreach ($files as $file) {
            if ($file != "." and $file !== "..") {
                if (is_file($path . "/" . $file)) {
                    if ((substr($file, 2, 1) == "-") or (substr($file, 2, 1) == "_")) {
                        $code = substr($file, 0, 2);
                        $tag ="region";
                    }else{

                        $code = str_replace("-merc.js","",$file);
                        $code = str_replace("-mill.js","",$code);
                        $code = str_replace("_merc.js","",$code);
                        $code = str_replace("_mill.js","",$code);
                        $tag ="city";
                    }
                    $json_str = file_get_contents($path . "/" . $file);
                    $maps_name = str_replace(".js","",$file);

                    $start = stripos($json_str ,"{");
                    $end= stripos($json_str ,";");
                    $json_str = substr($json_str, $start, $end-$start );

                    preg_match_all("/\s{4}((([A-Z]{2})\:)|([A-Z]{3})\:)\s{1}\{/",$json_str,$a);

                    $tmp = [];
                    foreach ($a[0] as $item){
                        $tmp[$item] = "    \"".self::my_str_replace($item)."\": {\r";
                    }
                    $con =[
                        "\'"=>"\"",
                        "insets:"=>"\"insets\":",
                        "bbox:"=>"\"bbox\":",
                        "paths:"=>"\"paths\":",
                        "path:"=>"\"path\":",
                        "height:"=>"\"height\":",
                        "left:"=>"\"left\":",
                        "x:"=>"\"x\":",
                        "y:"=>"\"y\":",
                        "width:"=>"\"width\":",
                        "top:"=>"\"top\":",
                        "name:"=>"\"name\":",
                        "type:"=>"\"type\":",
                        "projection:"=>"\"projection\":",
                        "centralMeridian:"=>"\"centralMeridian\":",
                    ];
                    foreach ( array_merge($tmp,$con ) as $key=>$value){
                        $json_str = str_replace($key,$value,$json_str);
                    }
                    echo $file."\r\n";
                    $json_str = str_replace("'M","\"M",$json_str);
                    $json_str = str_replace("Z',","Z\",",$json_str);
                    $json_str = str_replace("\": '","\": \"",$json_str);
                    $json_str = str_replace("',","\",",$json_str);
                    $json_str=preg_replace("/\,\s*\n\s*}/","\r  }",$json_str);
                    $json_str=preg_replace("/\,\s*\n\s*]/","\r  ]",$json_str);
//                    file_put_contents("./assets./jvectormap./maps/eq.json",print_r($json_str,true));

                    $arr = json_decode($json_str,true);

                    $insets = isset($arr["insets"]) ? json_encode( $arr["insets"]) : json_encode([]);
                    $paths =  isset($arr["paths"]) ? json_encode($arr["paths"]): json_encode([]);
                    $height =isset($arr['height']) ? $arr['height'] : json_encode([]);;
                    $projection = isset($arr['projection'])? json_encode($arr['projection']): json_encode([]);
                    $width = isset($arr['width']) ?$arr['width'] :0;
                    $template=<<<JSON
jQuery.fn.vectorMap("addMap", "{$maps_name}", {
    "insets":{$insets},
    "paths":{$paths},
    "height": {$height},
    "projection": {$projection},
    "width": {$width}
});
JSON;

                    $save_path = self::savePath ."/".$tag."/". $code."/".$maps_name.".js";
                    self::recursionCreate(dirname( $save_path ));
                    file_put_contents(self::file_name($save_path),$template,FILE_APPEND);
                    $language_save_path = self::savePath ."/".$tag."/". $code."/".$maps_name."_language/en.json";
                    self::language(
                       $arr['paths'],
                        isset($arr["insets"][0]) ? $arr["insets"][0]:[],
                        $language_save_path);

                } else {
                    self::json_to_js_b($path . "/" . $file);
                }
            }

        }
    }

    public function actionReact(){
        self::json_to_js_react("./assets/jvectormap/maps/react");
    }

    public static function json_to_js_react($path,$tag ="region"){
        $base_path = "./assets/jvectormap/maps/b/";
        $files = scandir($path);
        foreach ($files as $file){
            if (is_file($path . "/" . $file)) {
                echo $file."\r\n";
                if ((substr($file, 2, 1) == "-") or (substr($file, 2, 1) == "_")) {
                    $code = substr($file, 0, 2);
                    $tag ="region";
                }else{
                    $code = str_replace("-merc.js","",$file);
                    $code = str_replace("-mill.js","",$code);
                    $code = str_replace("_merc.js","",$code);
                    $code = str_replace("_mill.js","",$code);
                    $tag ="city";
                }

                $maps_name = str_replace(".js","",$file);
                $json_str = file_get_contents($path . "/" . $file);



                $json_str = str_replace("'M","\"M",$json_str);
                $json_str = str_replace("Z',","Z\",",$json_str);
                preg_match_all("/[A-Z]{2}_[a-z]{2}/",$json_str,$a);
                file_put_contents("./assets./jvectormap./maps/eq.json",  $json_str);

                $tmp = [];
                if (isset($a[0])) {
                    foreach ($a[0] as $item) {
                        $tmp[$item] = "\"" . $item . "\"";
                    }
                }

                $con =[

                    "insets:"=>"\"insets\":",
                    "bbox:"=>"\"bbox\":",
                    "paths:"=>"\"paths\":",
                    "path:"=>"\"path\":",
                    "height:"=>"\"height\":",
                    "left:"=>"\"left\":",
                    "x:"=>"\"x\":",
                    "y:"=>"\"y\":",
                    "width:"=>"\"width\":",
                    "top:"=>"\"top\":",
                    "name:"=>"\"name\":",
                    "type:"=>"\"type\":",
                    "projection:"=>"\"projection\":",
                    "centralMeridian:"=>"\"centralMeridian\":",
                ];
                foreach ( array_merge($tmp,$con ) as $key=>$value){
                    $json_str = str_replace($key,$value,$json_str);
                }
                file_put_contents("./assets./jvectormap./maps/eq.js", print_r(array_merge($tmp,$con ),true));
                $template =str_replace("window.jQuery","jQuery",$json_str);

//                $json_str = str_replace("'","\"", $json_str);
                $start = stripos($json_str ,"{");
                $end =stripos($json_str ,");");
                $data_str  =  substr($json_str, $start, $end-$start);
                file_put_contents("./assets./jvectormap./maps/eq.json", $data_str);
                $arr = json_decode( $data_str,true);

//                $insets = isset($arr["insets"]) ? json_encode( $arr["insets"]) : json_encode([]);
//                $paths =  isset($arr["paths"]) ? json_encode($arr["paths"]): json_encode([]);
//                $height =isset($arr['height']) ? $arr['height'] : json_encode([]);;
//                $projection = isset($arr['projection'])? json_encode($arr['projection']): json_encode([]);
//                $width = isset($arr['width']) ?$arr['width'] :0;


                $save_path = self::savePath ."/".$tag."/". $code."/".$maps_name.".js";
                file_put_contents(self::file_name($save_path),$template,FILE_APPEND);
                $language_save_path = self::savePath ."/".$tag."/". $code."/".$maps_name."_language/en.json";
                self::language(
                    $arr['paths'],
                    isset($arr["insets"][0]) ? $arr["insets"][0]:[],
                    $language_save_path);

            }
        }
    }

    public function actionTest(){
        $username ="admi你好";
        $b= preg_replace("/[^\x{4E00}-\x{9FFF}]+/u","",$username);
        if($b !== ""){
            $this->error("用户名不能含有中文");
        }
    }








    public static function my_str_replace($str){
        $config =[
            "   "=>"",
            " "=>"",
            ":"=>"",
            "{"=>""
        ];
        foreach ($config as $key =>$item){
            $str = str_replace($key,$item,$str);
        }
        return $str;
    }

    public static function file_name($path){
        $ext  = explode(".", basename($path))[1];

        if (file_exists($path)){
            $path =str_replace(".".$ext,"_1.".$ext,$path);
            self::recursionCreate(dirname($path));
            return $path;
        }
        self::recursionCreate(dirname($path));
        return $path;


    }



    /**
     * @param $paths
     * @param $insets
     * @param $language_save_path
     */
    public static function language($paths,$insets,$language_save_path){
        self::file_name($language_save_path);
        self::recursionCreate(dirname($language_save_path));
        $insets = json_encode( $insets);
        $names =[];
        foreach ($paths as $key =>$item){
            $names[] ="         {\"code\":\"".$key."\",\"name\":\"".$item['name']."\"}";
        }
        $str = join(",\r\n",$names);
        $template =<<<JSON
{
    "insets":{$insets},
    "names":[
{$str}
    ] 
}
JSON;
        file_put_contents( $language_save_path,$template,FILE_APPEND);
    }
    public static function recursionCreate($path,$base="./"){
        $base = str_replace("\\","/",$base);
        $path = str_replace("\\","/",$path);
        $arr = explode("/",str_replace($base,"",$path ));
        $tmp_path = $base;

        foreach ($arr as $item){
            if(!empty($item)){
                $tmp_path .="/".$item;
                if(!is_dir($tmp_path)){
                    mkdir( $tmp_path,0777);
                }
            }

        }

    }


    /**
     * 匹配icon 名字
     */
    public function actionIconName(){
        $file = "a.text";
        $data = file_get_contents($file);

        preg_match_all("/id=\"[^\s]*\"/",$data,$arr);
        $reslut =[];
        foreach ($arr[0] as $item){
            $str = str_replace("id=\"","",$item);
            $str = str_replace("\"","",$str);
            $reslut[] = $str;
            unset($str);
        }
        logObject(json_encode($reslut,true));

        $save_file = \Yii::getAlias('@appAssets')."/webslides/static/js/iconName.json";


        file_put_contents($save_file ,json_encode($reslut,true),FILE_APPEND);



    }


}