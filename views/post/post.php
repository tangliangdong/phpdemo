<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    $board_id = isset($_GET['id'])?$_GET['id']:'';
    $dbConf=include '../../Connection/conf.php';
    include("../../Connection/Connection.php");
    $pdo=Connection::getInstance($dbConf);

    $sql='SELECT * from post WHERE board_id = ? and own_id= 0';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $board_id);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $rows = $stmt->fetchAll();
    }
    ?>

</head>
<body>
<button onclick="javascript:history.go(-1)">返回</button>

<?php
$index = 1;
if(isset($rows) && count($rows) > 0){
    foreach ($rows as $row){
        echo '<div style="line-height: 60px;font-size:20px;"><span>第'.$index.'贴</span>
        <a href="postDetail.php?board_id='.$board_id.'&post_id='.$row['id'].'">'.$row['text'].'</a>';
        echo '<a style="margin-left: 40px;" href="../../Controllers/PostController.php?">删除</a></div>';
        $index++;

    }
}


?>

<div>
    <form action="../../Controllers/PostController.php" method="post">
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
        <input type="hidden" value="<?php echo $board_id?>" name="boardId">
        <button id="post-theme-btn" type="submit">提交</button>
    </form>
</div>
<script src="../resource/js/jquery.min.js"></script>
<script>
$(function(){
//    $('#post-theme-btn').click(function () {
//        var text = $('#text').val();
//        console.log(text);
//        if(text!=null && text!=''){
//            $.ajax({
//                url: '../../Controllers/postController.php',
//                type: 'POST',
//                dataType: 'json',
//                data: {boardId: <?php //echo $board_id?>//,
//                    text: text},
//                success:function(data){
//                    console.log(data);
//                }
//            });
//
//        }
//    });
});

</script>
</body>
</html>
