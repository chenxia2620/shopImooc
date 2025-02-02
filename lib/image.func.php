<?php
    require_once 'string.func.php';

    //通过GD库做验证码
    function verifyImage($type=1,$length=4,$pixel=0,$line=0,$sess_name='verify')
    {
        //session_start();

        //创建画布
        $width = 80;
        $height = 28;
        $image = imagecreatetruecolor($width, $height);
        $white = imagecolorallocate($image, 255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);

        //用填充矩形填充画布
        imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
        
        
        $chars = buildRandomString($type, $length);
        
        $_SESSION[$sess_name] = $chars;
        $fontfiles = array("msyh.ttc", "msyhbd.ttc", "msyhl.ttc", "SIMLI.TTF", "simsun.ttc", "SIMYOU.TTF");
        for ($i = 0; $i < $length; $i ++)
        {
            $size = mt_rand(14, 18);
            $angle = mt_rand(-15, 15);
            $x = 5 + $i * $size;
            $y = mt_rand(20, 26);
            //产生一个随机的字体
            $fontfile = "../fonts/" . $fontfiles[mt_rand(0, count($fontfiles) - 1)];
            //产生一个随机的颜色
            $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90,180));
            //产生验证码
            $text = substr($chars, $i, 1);
            imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
        }

        //干扰元素
        
        if ($pixel)
        {
            for ($i = 0; $i < 50; $i ++)
            {
                imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
            }
        }
        
        if ($line)
        {
            for ($i = 0; $i < $line; $i ++)
            {
                $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90,180));
                imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $color);
            }
        }

        header("content-type:image/gif");
        imagegif($image);
        imagedestroy($image);
    }
    