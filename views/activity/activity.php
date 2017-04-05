<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>活动页面</title>

    <?php
    $dbConf=include '../../Connection/conf.php';
    include("../../Connection/Connection.php");
    $pdo=Connection::getInstance($dbConf);
    session_start();
    $userId = $_SESSION['id'];
    $sql='SELECT * from board';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $rows = $stmt->fetchAll();
    }

    ?>
</head>
<body>
    <a href="../../Controllers/LoginController.php?type=cancel">注销</a>
    <a href="../person/person.php?userId=<?php echo $userId ?>">个人中心</a>
    <h2><?php echo $_SESSION['id'].' '.$_SESSION['username'];?>,welcome to here</h2>


    <?php
    foreach($rows as $row){
        echo '<p><a href="../post/post.php?id='.$row["id"].'&name='.$row['name'].'">'.$row['name'].'</a></p>';
    }


    ?>


</body>
</html>