<?php


namespace shiguangxiaotou;


class Tag
{


    /**
     * @param $options
     */
    private static function join_options($options){
        $str ='';
        foreach ($options as $key=>$value){
            if($key !=="tag"){
                $str .=" ".$key."='".$value ."'";
            }
        }
    }
    /**
     * @param $content
     * @param array $options
     * @return string
     */
    public static function link($options=[]){
        $str = self::join_options($options);
        return "<link  {$str}  />";


    }

    /**
     * @param $content
     * @param array $options
     * @return string
     */
    public static function meta($options=[]){
        $str = self::join_options($options);
        return "<meta {$str} />";

    }

    /**
     * @param $content
     * @param array $options
     * @return string
     */
    public static function cssFile($options=[]){
        $str = self::join_options($options);
        return "<link { $str} />";
    }

    /**
     * @param $content
     * @param array $options
     * @return string
     */
    public static  function jsFile($options=[]){
        $str = self::join_options($options);
        return "<script  $str > </script>";
    }

    /**
     * @param $content
     * @param $options
     * @return string
     */
    public static function cssCode($content,$options){
        $str = self::join_options($options);
        return "<style  $str> $content </style>";
    }

    /**
     * @param $content
     * @param $options
     * @return string
     */
    public static function jsCode($content,$options){
        $str = self::join_options($options);
        return "<script  $str > $content</script>";
    }

    /**
     * @param $type
     * @param $name
     * @param $value
     * @param array $options
     */
    public static function input($type,$name,$value,$options=[]){
        $str = self::join_options($options);
        return "<input type='".$type."' value='".$value."'  $str />";
    }

    /**
     * @param $content
     * @param string $herf
     * @param array $opnions
     */
    public static function a($content,$herf="#",$opnions=[]){

    }


    /**
     * @param $itme array
     * @return string
     */
    public static function createTag($itme){
        if( isset($itme["tag"]) and !empty($itme["tag"]) ){
            $tag = $itme["tag"];
            unset($itme['tag']);
            switch ($tag){
                case "link":
                    return self::link($itme);
                case "meta":
                    return self::meta($itme);
                case "cssFile":
                    return self::cssFile($itme);
                case "jsFile":
                    return self::jsFile($itme);
                case "cssCode":
                    $code = ($itme["code"] !=="") ? $itme["code"]:"";
                    unset($itme['code']);
                    return self::cssCode($code,$itme);
                case "jsCode":
                    $code = ($itme["code"] !=="") ? $itme["code"]:"";
                    unset($itme['code']);
                    return self::jsCode($code,$itme);
            }
        }
    }

}