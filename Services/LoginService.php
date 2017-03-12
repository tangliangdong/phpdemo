<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/10
 * Time: 11:11
 */

include("../Connection/Connection.php");
$dbConf=include '../Connection/conf.php';
$pdo=Connection::getInstance($dbConf);
function check($user){
    session_start();
    global $pdo;
    $password = md5($user->getPassword());
    $sql='SELECT * from User WHERE username=? and password=?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1,$user->getUsername());
    $stmt->bindValue(2,$password);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $row = $stmt->fetch();
        $_SESSION['username']=$row['username'];
        $_SESSION['id']=$row['id'];
        $_REQUEST['error'] = '用户名或或者密码错误';
        header("location: ../views/activity/activity.php");
    }else{
        header("location: ../views/login/login.php?status=0");
    }

}