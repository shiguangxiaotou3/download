<?php


namespace ShiGuangXiaoTou;


class Cropping
{
    /**
     * @param $img_path
     * @param int $x
     * @param int $y
     * @param $savePath
     * @return string
     */
    public  static function resampled($img_path, $x = 100, $y = 100,$savePath="./"){
        list($width, $height) = getimagesize($img_path);
        if ($x && ($width < $height)) {
            $x = $y / $height * $width;
        } else {
            $y = $x / $width * $height;
        }
        $image_p = imagecreatetruecolor($x, $y);
        $image = imagecreatefrompng($img_path);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $x, $y, $width, $height);
        $file_name = $savePath ."tmp_".time() . "_".rand(1,20000) . '.png';
        imagepng($image_p, $file_name, 9);
        imagedestroy($image_p);
        imagedestroy($image);
    }
}