<?php

/**
 * 控制台输入二维数组
 * Class PrintTable
 * @package common\models\tool
 */

/**
 * 获取文件权限
 * @param $path
 * @return array
 */
function permissions($path)
{
    return [
        fileperms($path),
        substr(sprintf('%o', fileperms($path)), -4),
        permissionsStr($path),
    ];
}
/**
 * 获取文件或目录权限
 * @param $path
 * @return string
 */
function permissionsStr($path)
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
function fileInfo($path)
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
            'atime' =>date("Y-m-d H:i:s", fileatime($path)),
        ];
        //权限
        $perms=permissions($path);
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
function strEndWith($str,$suffix='/'){
    $length = strlen($suffix);
    if($length ==0){
        return false;
    }
    return (substr($str,-$length) == $suffix);
}
/**
 * 下载文件
 * @param $url
 * @param $save_path
 * @param string $path
 */
function download($url,$save_path,$path ="C:/AppServ/www/download/"){
    set_time_limit(0);
    $powerShell_path ="C:/Windows/System32/WindowsPowerShell/v1.0/powershell.exe";
    shell_exec("$powerShell_path wget  ". $url ." -OutFile ".$path.$save_path);
    file_put_contents("download.txt","$powerShell_path wget  ". $url ." -o ".$path.$save_path."\r\n",FILE_APPEND);
    shell_exec("$powerShell_path wget  ". $url ." -o ".$path.$save_path);
}
/**
 * 记录访问者ip
 */
function getClientIP(){
    if (getenv("HTTP_CLIENT_IP")) {
        $ip = getenv("HTTP_CLIENT_IP");
    }elseif(getenv("HTTP_X_FORWARDED_FOR")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    }elseif(getenv("REMOTE_ADDR")) {
        $ip = getenv("REMOTE_ADDR");
    }else{
        $ip = "Unknow";
    }
    return $ip;
}

/**
 * 统计当前目录下的文件
 * @param string $path
 * @return bool|false|int
 */
function index($path ="./assets"){
    global $data,$config;
    if (is_dir($path)){
        $handle = opendir($path);
        $sizeResult = 0;
        while (false !== ($FolderOrFile = readdir($handle))){
            if (!in_array($FolderOrFile,$config)){
                if (is_dir($path.'/'.$FolderOrFile)){
                    index($path.'/'.$FolderOrFile);
                }else{
                    array_unshift($data,fileInfo($path.'/'.$FolderOrFile));
                    $sizeResult += filesize($path."/".$FolderOrFile);
                }
            }
        }
        closedir($handle);

    }else{
        return  false;
    }
}

/**
 * 文件名称兼容
 * @param $file_name
 * @return mixed
 */
function getTmpFilePath($file_name){
    if(!file_exists($file_name)){
        return $file_name;
    }else{
        $info = pathinfo($file_name);
        // echo $info['filename'];
        $download_path = str_replace($info['filename'],$info['filename']."_1",$file_name);
        return getTmpFilePath( $download_path);
    }
    
}

/**
 * 替换字符串
 * @param $str
 * @param array $options
 * @return mixed|string|string[]
 */
function my_str_replace($str,$options=[]){
    $options =  empty($options) ? [
        "<h1>"=>"",
        '</h1>'=>"",
        '<b>'=>'',
        '</b>'=>'',
        '<p>'=>"",
        "</p>"=>''
    ]:$options;
    foreach ($options as $key =>$value){
        $str =   str_replace($key,$value,$str);
    }
    return $str;
}

if($_POST){
    if( isset($_POST["Download_Task"]) and !empty($_POST["Download_Task"])){
        $url =$_POST["Download_Task"];
        $file_name = basename($_POST["Download_Task"]);
        if(isset($_POST["save_path"]) and !empty($_POST["save_path"])){
            $save_path = $_POST["save_path"];
            if(!strEndWith($save_path)){
                $save_path .="/";
            }
            if(!is_dir($save_path)){
                mkdir($save_path);
            }
        }else{
            $save_path ="./assets";
        }

        echo "下载任务已添加成功\r\n";
        download($url ,getTmpFilePath($save_path. $file_name));
        die();
    }

}

$dome ="download.shiguangxiaotou.cn/";
$data =[];
$str = <<<html
<h1>时光小偷的代理下载插件:1.0.0</h1>\r\n
<b>你可以使用控制台或者浏览器,创建下载任务和下载文件</b>\r\n
以下命令可以使用:\r\n
  Download_Task(post)                        创建下载任务\r\n
    eq:http://{$dome}?Download_Task={url}&save_path=.\/test.png\r\n
  download file(get)                         下载文件\r\n
    eq:http://{$dome}test.txt\r\n\r\n
文件列表:\r\n
html;
$config=[".","..",".idea","ip.txt","download.txt","index.php",".htaccess"];
index();
$str .=PrintTable::Print_table($data,['目录','文件名','拓展名',"大小",'类型','访问时间','权限']);
if(!empty($_SERVER['HTTP_USER_AGENT'])){
    $contact ="   如有BUG,<a href='https://www.shiguangxiaotou.com' target='_blank'>请联系我</a>";
    echo "<pre><code>".$str.$contact."</code></pre>";
}else{
    echo my_str_replace($str);
}

?>