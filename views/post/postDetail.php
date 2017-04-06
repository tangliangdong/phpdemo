<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    session_start();
    $board_id = $_GET['board_id'];
    $post_id = $_GET['post_id'];

    $dbConf=include '../../Connection/conf.php';
    include("../../Connection/Connection.php");
    $pdo=Connection::getInstance($dbConf);

    $sql='SELECT post.id as postId,User.id as userId,post.text,User.username,own_id,board_id 
        from post join User on User.id = post.author_id WHERE board_id=? and (own_id=? or post.id=?) order by post.id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $board_id);
    $stmt->bindValue(2, $post_id);
    $stmt->bindValue(3, $post_id);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $rows = $stmt->fetchAll();
    }
    ?>
</head>
<body>
<button onclick="javascript:history.go(-1)">返回</button>
<table>
    <?php
    $index = 0;
    if(isset($rows)&&count($rows)>0){
        foreach ($rows as $row){
            if($index===0){
                echo '<tr style="line-height: 60px;font-size:24px;">
                    <th>主题帖</th>
                    <th>'.$row['text'].'</th>
                    <th><a href="../person/person.php?userId='.$row['userId'].'">'.$row['username'].'</a></th>';

                        if($row['userId']===$_SESSION['id'] && $row['own_id']!=0){
                            echo '<th><a href="../../Controllers/PostController.php?postId='.$row['postId'].'&boardId='.$board_id.'">删除</a></th>';
                        }
                        echo '</tr>';
            }else{
                echo '<tr>
            <td>第'.$index.'贴</td>
            <td>'.$row['text'].'</td>
            <td><a href="../person/person.php?userId='.$row['userId'].'">'.$row['username'].'</a></td>';

                if($row['userId']===$_SESSION['id'] && $row['own_id']!=0){
                    echo '<td><a href="../../Controllers/PostController.php?postId='.$row['postId'].'&boardId='.$board_id.'">删除</a></td>';
                }
                echo '</tr>';
            }
            $index++;
        }
    }


    ?>
</table>


<form action="../../Controllers/PostController.php" method="post">
    <input type="hidden" name="boardId" value="<?php echo $board_id?>">
    <input type="hidden" name="postId" value="<?php echo $post_id?>">
    <textarea name="detailText" id="" cols="30" rows="10"></textarea>
    <button type="submit">发布</button>
</form>

</body>
</html>