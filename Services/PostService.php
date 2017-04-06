<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/31
 * Time: 12:06
 */
include('../Models/Post.php');
$dbConf=include '../Connection/conf.php';
include("../Connection/Connection.php");
$pdo=Connection::getInstance($dbConf);

function insertPost($post){
    global $pdo;
    $pdo->beginTransaction();
    $sql='insert into post(text,board_id,author_id,own_id) VALUES(?,?,?,?)';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $post->getText());
    $stmt->bindValue(2, $post->getBoardId());
    $stmt->bindValue(3, $post->getAuthorId());
    $stmt->bindValue(4, 0);
    $stmt->execute();

    $pdo->commit();
    header("location: ../views/post/post.php?id=".$post->getBoardId());

//    $arr = array ('status'=>1);
//    echo json_encode($arr);
}

function insertPostDetail($post){
    global $pdo;

    $countsql = "SELECT count(*) as num 
        from post join User on User.id = post.author_id WHERE board_id=?";
    $num = $pdo->prepare($countsql);
    $num->bindValue(1,$post->getBoardId());
    $num->execute();
    $row = $num->fetch();

    $pdo->beginTransaction();
    $sql='insert into post(text,board_id,author_id,own_id) VALUES(?,?,?,?)';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $post->getText());
    $stmt->bindValue(2, $post->getBoardId());
    $stmt->bindValue(3, $post->getAuthorId());
    $stmt->bindValue(4, $post->getId());
    $stmt->execute();

    $pdo->commit();
    header("location: ../views/post/postDetail.php?board_id=".$post->getBoardId().'&post_id='.$post->getId());
}

function deletePostDetail($postId,$boardId){
    global $pdo;
    $pdo->beginTransaction();
    $sql='delete from post WHERE id=?';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $postId);
    $stmt->execute();
    $pdo->commit();
    header("location: ../views/post/postDetail.php?board_id=$boardId&post_id=$postId");
}
