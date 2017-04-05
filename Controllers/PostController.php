<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/31
 * Time: 11:57
 */

include('../Models/Post.php');
session_start();
if(isset($_POST['boardId']) && isset($_POST['text'])){
    $id = $_POST['id'];
    $text = $_POST['text'];
    $post = new Post(0,$id,$text,$_SESSION['id'],0);
    insertPost(post);
}
