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
    $stmt->bindValue(4, $post->getOwnId());
    $stmt->execute();
    $pdo->commit();

    $arr = array ('status'=>1);
    echo json_encode($arr);

}