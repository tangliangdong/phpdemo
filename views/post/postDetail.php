<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    $board_id = $_GET['board_id'];
    $post_id = $_GET['post_id'];

    $dbConf=include '../../Connection/conf.php';
    include("../../Connection/Connection.php");
    $pdo=Connection::getInstance($dbConf);

    $sql='SELECT post.id as postId,User.id as userId,post.text,User.username,own_id,board_id 
        from post join User on User.id = post.author_id WHERE post.id=?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $post_id);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $rows = $stmt->fetchAll();
    }


    ?>
</head>
<body>
<button onclick="javascript:history.go(-1)">返回</button>
<table>

</table>
<?php
$index = 1;
foreach ($rows as $row){
    echo '<tr>
        <td>第'.$index.'贴</td>
        <td>'.$row['text'].'</td>
        <td><a href="../person/person.php?userId='.$row['userId'].'">'.$row['username'].'</a></td>
        </tr>';
}

?>

</body>
</html>