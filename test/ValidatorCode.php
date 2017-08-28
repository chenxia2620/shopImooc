<?php

function imCode()
{
    //定义标题.png格式图像
    header('content-type:image/png');

    //定义画布
    $im = imagecreate(65, 25);

    //区域填充
    imagefill($im, 0, 0, imagecolorallocate($im, 200, 200, 200));

    //获取提交的值
    $validator_code = $_GET['code'];

    //将从超链接中获取的验证码写入到图像中，并应用 imagecolorallocate() 函数随机定义值输出颜色
    imagestring($im, rand(3, 5), 10, 3, substr($validator_code, 0, 1), imagecolorallocate($im, 0, rand(0, 255), rand(0, 255)));
    imagestring($im, rand(3, 5), 25, 6, substr($validator_code, 1, 1), imagecolorallocate($im, rand(0, 255), 0, rand(0, 255)));
    imagestring($im, rand(3, 5), 36, 9, substr($validator_code, 2, 1), imagecolorallocate($im, rand(0, 255), rand(0, 255), 0));
    imagestring($im, rand(3, 5), 48, 12, substr($validator_code, 3, 1), imagecolorallocate($im, 0, rand(0, 255), rand(0, 255)));

    //生成 png 图像
    imagepng($im);

    //销毁图像，释放内存
    imagedestroy();
}
    
imCode();