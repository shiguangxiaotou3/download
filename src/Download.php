<?php

namespace ShiGuangXiaoTou;

use ShiGuangXiaoTou\PrintTable;

class Download{
    public $basePath ;
    public $assetsPath ;
    public $savePath;
    public $url;
    public $domain;
    public $ignore;
    private $ipInfo=[];
    public $files = [];
    const ipIgnore =["127.0.0.1","192.168.*"];

    /**
     * Download constructor.
     * @param $config
     */
    public function __construct($config){
        $this->basePath = $config["basePath"];
        $this->assetsPath = $config["assetsPath"];
        $this->savePath = $config["savePath"];
        $this->domain = $config["domain"];
        $this->ignore = $config["ignore"];
        $this->ipInfo = $config["ipInfo"];

    }

    /**
     * controller
     */
    public function run()
    {
        if ($_POST) {
            $this->getArgs();
        } else {
            $this->Visits();
            $th = ['目录', '文件名', '拓展名', "大小", '类型', '访问时间', '权限'];
            $this->getAssetsInfo($this->assetsPath);
            $files =$this->files;
            $domain =$this->domain;
            self::view('index',compact("th","files","domain"));
        }
    }

    /**
     * 递归读取文件
     * @param string $assetsPath
     * @return false
     * @link $files
     */
    public function getAssetsInfo($assetsPath = '')
    {
        if (is_dir($assetsPath)) {
            $handle = opendir($assetsPath);
            while (false !== ($FolderOrFile = readdir($handle))) {
                if (!in_array($FolderOrFile, $this->ignore)) {
                    if (is_dir($assetsPath . '/' . $FolderOrFile)) {
                        $this->getAssetsInfo($assetsPath . '/' . $FolderOrFile);
                    } else {
                        array_unshift($this->files, $this->fileInfo($assetsPath . '/' . $FolderOrFile));
                    }
                }
            }
            closedir($handle);
        } else {
            return false;
        }
    }

    /**
     * 接收post下载文件
     */
    public function getArgs(){
        if (isset($_POST["Download_Task"]) and !empty($_POST["Download_Task"])) {
            $url = $_POST["Download_Task"];
            $file_name = basename($_POST["Download_Task"]);
            if (isset($_POST["save_path"]) and !empty($_POST["save_path"])) {
                $save_path = $_POST["save_path"];
                if (!$this->strEndWith($save_path)) {
                    $save_path .= "/";
                }
                if (!is_dir($save_path)) {
                    mkdir($save_path);
                }
            } else {
                $save_path = "./assets";
            }
            echo "下载任务已添加成功\r\n";
            $this->download($url, $this->getTmpFilePath($save_path . $file_name));
            die();
        }
    }

    /**
     * 获取目录权限
     * @param $path
     * @return array
     */
    public function permissions($path)
    {
        return [
            fileperms($path),
            substr(sprintf('%o', fileperms($path)), -4),
            $this->permissionsStr($path),
        ];
    }

    /**
     * 获取文件或目录权限
     * @param $path
     * @return string
     */
    public function permissionsStr($path)
    {
        $perms = fileperms($path);
        if (($perms & 0xC000) == 0xC000) {
            // Socket
            $info = 's';
        } elseif (($perms & 0xA000) == 0xA000) {
            // Symbolic Link
            $info = 'l';
        } elseif (($perms & 0x8000) == 0x8000) {
            // Regular
            $info = '_';
        } elseif (($perms & 0x6000) == 0x6000) {
            // Block special
            $info = 'b';
        } elseif (($perms & 0x4000) == 0x4000) {
            // Directory
            $info = 'd';
        } elseif (($perms & 0x2000) == 0x2000) {
            // Character special
            $info = 'c';
        } elseif (($perms & 0x1000) == 0x1000) {
            // FIFO pipe
            $info = 'p';
        } else {
            // Unknown
            $info = 'u';
        }
        // Owner
        $info .= (($perms & 0x0100) ? 'r' : '_');
        $info .= (($perms & 0x0080) ? 'w' : '_');
        $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x') : (($perms & 0x0800) ? 'S' : '_'));

        // Group
        $info .= (($perms & 0x0020) ? 'r' : '_');
        $info .= (($perms & 0x0010) ? 'w' : '_');
        $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x') : (($perms & 0x0400) ? 'S' : '_'));

        // World
        $info .= (($perms & 0x0004) ? 'r' : '_');
        $info .= (($perms & 0x0002) ? 'w' : '_');
        $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x') : (($perms & 0x0200) ? 'T' : '_'));

        return $info;
    }

    /**
     * 获取文件配置信息
     * @param $path
     * @return array|bool
     */
    public function fileInfo($path)
    {
        if (is_file($path)) {
            $info = pathinfo($path);
            $stat = stat($path);
            $config = [
                //返回路径中的目录部分
                'dirname' => dirname($path),
                //文件名
                'filename' => $info['filename'],
                //文件拓展名
                'extension' => $info['extension'],
                //取得文件大小
                'size' => filesize($path),
                //取得文件类型
                'type' => filetype($path),
                //取得文件的上次访问时间
                'atime' => date("Y-m-d H:i:s", fileatime($path)),
            ];
            //权限
            $perms = $this->permissions($path);
            $config['perms'] = $perms[1];
            return $config;
        } else {
            return false;
        }
    }

    /**
     * 判断字符串是否已/结尾
     * @param $str
     * @param string $suffix
     * @return bool
     */
    public function strEndWith($str, $suffix = '/')
    {
        $length = strlen($suffix);
        if ($length == 0) {
            return false;
        }
        return (substr($str, -$length) == $suffix);
    }

    /**
     * 下载文件
     * @param $url
     * @param $save_path
     * @param string $path
     */
    public function download($url, $save_path, $path = "C:/AppServ/www/download/assets")
    {
        set_time_limit(0);
        $powerShell_path = "C:/Windows/System32/WindowsPowerShell/v1.0/powershell.exe";
        shell_exec("$powerShell_path wget  " . $url . " -OutFile " . $path . $save_path);
        file_put_contents("download.txt", "$powerShell_path wget  " . $url . " -o " . $path . $save_path . "\r\n", FILE_APPEND);
        shell_exec("$powerShell_path wget  " . $url . " -o " . $path . $save_path);
    }

    /**
     * 文件重复问题
     * @param $file_name
     * @return mixed
     */
    public function getTmpFilePath($file_name)
    {
        if (!file_exists($file_name)) {
            return $file_name;
        } else {
            $info = pathinfo($file_name);
            $download_path = str_replace($info['filename'], $info['filename'] . "_1", $file_name);
            return $this-> getTmpFilePath($download_path);
        }

    }

    /**
     * 替换字符串
     * @param $str
     * @param array $options
     * @return mixed|string|string[]
     */
    public function my_str_replace($str, $options = [])
    {
        $options = empty($options) ? [
            "<h1>" => "",
            '</h1>' => "",
            '<b>' => '',
            '</b>' => '',
            '<p>' => "",
            "</p>" => ''
        ] : $options;
        foreach ($options as $key => $value) {
            $str = str_replace($key, $value, $str);
        }
        return $str;
    }

    /**
     * 记录访问者ip
     */
    public static function getClientIP()
    {
        if (getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } elseif (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } elseif (getenv("REMOTE_ADDR")) {
            $ip = getenv("REMOTE_ADDR");
        } else {
            return false;
        }
        return $ip;
    }


    /**
     * 显示视图
     * @param $view
     * @param $data
     */
    public static function view($view,$data){
        extract($data);
        include "./../views/index.php";
    }

    /**
     * 解析访问这ip 并转换为物理地址
     */
    public  function  Visits(){
        $ipInfo =$this->ipInfo;
        $filePath = dirname( __FILE__,2)."/runtime/markers.php";
        if(!file_exists( $filePath)){
            file_put_contents( $filePath ,"<?php \r\nreturn [\r\n];");
        }
        /** @var array $filePath */
        $data = require_once  $filePath;
        $ip = self::getClientIP();
        $ip ="123.56.7.205";
         $config_str ="";
        if($ip and is_array($data)   and !in_array($ip,array_keys($data))){
            $res_ipInfo = self::get_ipInfo($ip);
            if($res_ipInfo){
                $data[$ip] = $res_ipInfo;
                self::updateJsonFile($data);
                self::ConfigToStr($config_str, $data,1);
                file_put_contents( $filePath ,"<?php \r\nreturn [\r\n".$config_str ."\r\n];");
            }
        }
    }

    /**
     * 解析ip的物理地址
     * @param $ip
     * @return array|bool
     */
    public function get_ipInfo($ip){
        $ipInfo = $this->ipInfo;
        $str = file_get_contents($ipInfo['url'] . $ip . "/?token=" . $ipInfo['token']);
        if ($str) {
            $res = json_decode($str, true);
            if (isset($res["city"]) and !empty($res["city"]) and
                isset($res['loc']) and !empty($res['loc'])) {
                return [
                    "name" => $res["city"],
                    "latLng" => explode(",", $res['loc']),
                ];
            }
        }
        return false;
    }

    /**
     * 生产php配置文件字符串
     * @param $str
     * @param $array
     * @param int $space
     */
    public static function ConfigToStr(&$str, $array, $space = 0){
        $s ='' ;
        for($i=0; $i<$space*4;$i++){
            $s .= " ";
        }
        foreach($array as $k=>$item){
            if(is_array($item)){
                $str .= "$s'$k' => [\r\n";
                $str .= self::ConfigToStr($str, $item, $space+1);
                $str .= "$s],\r\n";
            }else{
                $item =str_replace('\'','\\\'',$item);
                $str .= "$s'$k' => '$item',\r\n";
            }
        }
    }

    /**
     * 记录日志
     * @param $str
     * @param string $file
     * @param int $flags
     */
    public  static function log($str,$file ="ip.txt",$flags=FILE_APPEND){
        $path = dirname( __FILE__,2)."/runtime/";
        file_put_contents($path.$file,$str,$flags);
    }

    /**
     * 刷新json文件
     * @param $arr
     */
    public static function updateJsonFile($arr){
        $data =[];
        foreach ($arr as $item){
            $data[] = $item;
        }
        $json_str = json_encode($data);
        self::log($json_str);
        $filePath = dirname( __FILE__,2)."/public/assets/js/markers.json";
        self::log($filePath);
        file_put_contents($filePath,$json_str);
    }
}
