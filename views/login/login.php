<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页面</title>
</head>
<body>

    <h1>用户登录界面</h1>
    <form action="../../Controllers/LoginController.php" method="post">
        用户名：<input type="text" name="username">
        密码：<input type="password" name="password">
        <button type="submit">登录</button>
        <a href="../registed/registed.php">去注册</a>
        <span style="color: red;"><?php echo isset($_REQUEST['status'])?'用户名或密码错误':''; ?></span>
    </form>
</body>
</html>