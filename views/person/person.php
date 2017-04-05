<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    $dbConf=include '../../Connection/conf.php';
    include("../../Connection/Connection.php");
    $pdo=Connection::getInstance($dbConf);
    session_start();
    $userId = $_GET['userId'];

    $sql='SELECT User.id as userId,username,User.type,post.id as postId,post.text as postText, 
          board.id as boardId, board.name as boardName 
          from User join post on User.id = post.author_id 
          join board on board.id = post.board_id WHERE User.id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $userId);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $rows = $stmt->fetchAll();
    }

    echo '<title>'.isset($rows)? $rows[0]['username']:'nobody'.'个人中心</title>'
    ?>
</head>
<body>
<button onclick="javascript:history.go(-1)">返回</button>
<?php
if(isset($rows)){
    echo '<h3>'.$rows[0]['username'].'</h3>';

    echo '<ul>';
    foreach ($rows as $row){

        echo '<li>'.$row["postText"].'</li>';
    }
    echo '</ul>';
}
?>

</body>
</html>