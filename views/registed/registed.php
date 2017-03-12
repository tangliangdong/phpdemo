<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册</title>
</head>
<body>

<form action="../../Controllers/RegistedController.php" method="post">
    用户名：<input type="text" name="username" id="username">
    密码：<input type="password" name="password">
    重复密码：<input type="password">
    <button type="submit">注册</button>

</form>

<script src="../resource/js/jquery.min.js"></script>
<script>
    $(function () {
        $('#username').focusout(function () {
            var username = $('#username').val();
            var $this = $(this);
            $.ajax({
                url: '../../Controllers/RegistedController.php',
                type: 'POST',
                dataType: 'json',
                data: {username: username,doType:'checkUserIsExist'},
                success:function (data) {
                    console.log(data);
                    if(data.status===1){
                        $this.next('span').remove();
                        $this.css('border-color','green');
                        $this.after('<span style="color:green;">此用户名可以注册</span>')
                    }
                    else{
                        $this.next('span').remove();
                        $this.css('border-color','red');
                        $this.after('<span style="color:red;">此用户名已存在</span>')
                    }

                }
            });

        });
    });
</script>
</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/10
 * Time: 11:10
 */
