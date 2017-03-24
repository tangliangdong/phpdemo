<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理员登录界面</title>
</head>
<body>
<h1>管理员登录界面</h1>
<form action="../../Controllers/LoginController.php" method="post">
    账号：<input type="text" name="adminuser">
    密码<input type="password" name="password">
    <button type="submit">登录</button>
    <?php echo '<span style="color: red;">'.((isset($_GET['status'])&&$_GET['status']==0)?'用户名或密码错误':'').'</span>' ?>
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/19
 * Time: 12:34
 */