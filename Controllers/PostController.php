<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/31
 * Time: 11:57
 */

//include('../Models/Post.php');
include('../Services/PostService.php');

session_start();
if(isset($_POST['boardId']) && isset($_POST['text']) ){
    $id = $_POST['boardId'];
    $text = $_POST['text'];
    $post = new Post(0,$id,$text,$_SESSION['id'],0);
    insertPost($post);
}

if(isset($_POST['boardId']) && isset($_POST['detailText'])&& isset($_POST['postId'])){
    $id = $_POST['boardId'];
    $text = $_POST['detailText'];
    $postId = $_POST['postId'];
    $post = new Post($postId,$id,$text,$_SESSION['id'],1);
    insertPostDetail($post);
}

if (isset($_GET['postId']) && isset($_GET['boardId'])){
    $postId = $_GET['postId'];
    $boardId = $_GET['boardId'];
    deletePostDetail($postId,$boardId);
}
