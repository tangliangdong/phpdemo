<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>活动页面</title>
    <?php session_start() ?>
</head>
<body>
    <a href="../../Controllers/LoginController.php?type=cancel">注销</a>
    <h2><?php echo $_SESSION['id'].' '.$_SESSION['username'];?>,welcome to join us</h2>
</body>
</html>