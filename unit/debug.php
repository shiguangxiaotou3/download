<?php


/**
 * 我的测试公共函数
 *
 */

defined('DEBUG_FILE') or define('DEBUG_FILE', __DIR__."/a.txt");
defined('DEBUG_JSON') or define('DEBUG_JSON', __DIR__."/log.json");

/**
 * @param $conf
 */
function dumpInfo($conf){
    $path =$conf[0]['file'];
    $line =$conf[0]['line'];
    unset($conf);
    $str ='// +----------------------------------------------------------------------'."\r\n";
    $str .='// | 调用文件: '.$path."\r\n";
    $str .='// +----------------------------------------------------------------------'."\r\n";
    $str .='// | 调用行数: '."第".$line."行被调用\r\n";
    $str .='// +----------------------------------------------------------------------'."\r\n";
    $str .='// | 调用时间: '.date('Y-m-d h:m:s',time())."\r\n";
    $str .='// +----------------------------------------------------------------------'."\r\n";

    file_put_contents(DEBUG_FILE,"\r\n".$str,FILE_APPEND);
}

/**
 * @param $str
 */
function logStr($str){
    dumpInfo(debug_backtrace());
    file_put_contents(DEBUG_FILE,$str."\r\n",FILE_APPEND);
}

/**
 * @param $obj
 * @param int $flags
 */
function logObject($obj,$flags = FILE_APPEND){
    $conf = debug_backtrace();
    dumpInfo($conf);
    if(empty($flags)){
        file_put_contents(DEBUG_FILE, print_r($obj, true)."\r\n");
    }else{
        file_put_contents( DEBUG_FILE, print_r($obj, true)."\r\n",$flags);
    }

}

/**
 * @param $res
 */
function dump($res){
    echo "<pre>". print_r($res)."</pre>";
}

/**
 * @param int $flags
 */
function  my_debug_backtrace($flags = FILE_APPEND ){
    $arr = debug_backtrace();
    $str = print_r($arr, true);
    file_put_contents(DEBUG_FILE,str_replace("xxxx","",$str),$flags);
}
