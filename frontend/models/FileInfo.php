<?php


namespace ShiGuangXiaoTou\models;


class FileInfo
{


    /**
     * @param $path
     * @param $arr
     * @param $basePath
     * @param string $replace
     * @return array|bool
     */
    public static function getFilesInfo( $path,&$arr,$basePath,$replace="./"){

        if (is_dir($path)) {
            $files = scandir($path);
            foreach ($files  as $file){
                if(($file != "..") and ($file != ".")){
                    if(is_dir($path."/".$file)){
                        self::getFilesInfo($path."/".$file,$arr,$basePath,$replace);
                    }else{
                        $info = self::fileInfo($path."/".$file);
                        $info["dirname"] =str_replace($basePath,$replace, $info["dirname"]);
                        array_unshift($arr,    $info);
                    }
                }
            }
        }
        if(is_file($path)){
            return  self::fileInfo($path);
        }
    }


    /**
     * @param $path
     * @return array
     */
    public static function getFiles($path)
    {
        if (is_dir($path)) {
            $files = scandir($path);
            $result = [];
            foreach ($files as $file) {
                if (($file != "..") and ($file != ".")) {
                    if (file_exists($path . "/" . $file)) {
                        $result[] = $file;
                    }
                }
            }
            return $result;
        }
    }

    /**
     * 获取目录权限
     * @param $path
     * @return array
     */
    public  static function permissions($path)
    {
        return [
            fileperms($path),
            substr(sprintf('%o', fileperms($path)), -4),
            self::permissionsStr($path),
        ];
    }

    /**
     * 获取文件或目录权限
     * @param $path
     * @return string
     */
    public static function permissionsStr($path)
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
    public static function fileInfo($path)
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
            $perms = self::permissions($path);
            $config['perms'] = $perms[1];
            return $config;
        }
    }
}