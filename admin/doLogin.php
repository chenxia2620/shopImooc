<?php
    //验证登录
    
    require_once '../include.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $verify = $_POST['verify'];
    $verify1 = $_SESSION['verify'];

    //判断验证码正确或错误
    if ($verify == $verify1)
    {
        $sql = "select * from imooc_admin where username='{$username}' and password='{$password}'";
        $res = checkAdmin($sql);
        if ($res)
        {
            $_SESSION['adminName'] = $row['username'];
            //header("location:index.php");
            alertMes("登录成功", "login.php");
        }
        else
        {
            alertMes("登录失败，重新登录", "login.php");
        }
    }
    else
    {
        alertMes("验证码错误", "login.php");
    }