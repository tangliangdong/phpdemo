<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table tr>td{
            width:200px;
        }
    </style>
</head>
<body>
    <h2>后台管理界面</h2>

    <?php
    $dbConf=include '../../Connection/conf.php';
    include("../../Connection/Connection.php");
    $pdo=Connection::getInstance($dbConf);
    $sql='SELECT username,id from User WHERE type = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, 1);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $rows = $stmt->fetchAll();

    }
    session_start();
    ?>

    <h3><?php echo $_SESSION['username'] ?></h3>

    <a href="../../Controllers/AdminController.php?type=cancel">注销</a>

    <table id="table">
            <?php
            echo '<td>用户名</td>';
            echo '<td></td></tr>';
            foreach ($rows as $row){
                echo '<td>'.$row['username'].'</td>';
                echo '<td><button class="delete-btn" data="'.$row['id'].'">删除</button></td></tr>';
            }
            ?>
        </tr>
    </table>

    管理员账号：<input type="text" id="username-input" style="margin: 100px 0 0 0;"><br>
    管理员密码：<input type="password" id="password-input"><br>
    <button id="add-btn">添加用户</button>
    <span id="remind"></span>
</body>
</html>
<script src="../resource/js/jquery.min.js"></script>
<script>
    $(function(){
        $('.delete-btn').click(function () {
            var $this = $(this);
            $.ajax({
                url: '../../Controllers/AdminController.php',
                type: 'POST',
                dataType: 'json',
                data: {id: $this.attr('data'),
                    type: 'delete'},
                success:function(data){
                    console.log(data);
                    if(data.status===1){
                        $this.parent().parent('tr').remove();
                    }
                }
            });
        });

        $('#add-btn').click(function () {
            var $this = $(this);
            console.log(11111);
            $.ajax({
                url: '../../Controllers/AdminController.php',
                type: 'POST',
                dataType: 'json',
                data: {type: 'add',
                        username: $('#username-input').val(),
                        password: $('#password-input').val()},
                success:function(data){
                    console.log(data);
//                    if(data.status===1){
//                        $('#table').append("<tr>" +
//                            "<td>"+$('#username-input').val()+"</td>" +
//                            '<td><button class="delete-btn" data="'+data.id+'">删除</button></td>' +
//                            "</tr>");
//                    }
                    if(data.status===1){
                        $('#remind').text('成功创建管理员');
                    }
                }
            });
        })


    });

</script>
