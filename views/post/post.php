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
if($rows!=null && count($rows) > 0){
    foreach ($rows as $row){
        echo '<p>第'.$index.'贴</p>
        <a href="postDetail.php?board_id='.$board_id.'&post_id='.$row['id'].'&own_id='.$row['own_id'].'">'.$row['text'].'</a>';
        $index++;

    }
}


?>

<div>
    <textarea name="" id="text" cols="30" rows="10"></textarea>
    <button id="post-theme-btn">提交</button>
</div>
<script src="../resource/js/jquery.min.js"></script>
<script>
    $(function(){
        $('#post-theme-btn').click(function () {
            var text = $('#text').val();
            console.log(text);
            if(text!=null && text!=''){
                $.ajax({
                  url: '../../postController.php',
                  type: 'POST',
                  dataType: 'json',
                  data: {boardId: <?php echo $board_id?>,
                        text: text},
                  success:function(data){
                    console.log(data);
                  }
                })

            }
        });
    });

</script>
</body>
</html>
