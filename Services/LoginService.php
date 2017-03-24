<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/10
 * Time: 11:11
 */

$dbConf=include '../Connection/conf.php';
include("../Connection/Connection.php");
$pdo=Connection::getInstance($dbConf);
function check($user){
    session_start();
    global $pdo;
    $password = md5($user->getPassword());
    $sql='SELECT * from User WHERE username=? and password=? and type=?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $user->getUsername());
    $stmt->bindValue(2, $password);
    $stmt->bindValue(3, $user->getType());
    $stmt->execute();
    if($stmt->rowCount()>0){
        $row = $stmt->fetch();
        $_SESSION['username']=$row['username'];
        $_SESSION['id']=$row['id'];
        $_SESSION['type']=$row['type'];
        $_REQUEST['error'] = '用户名或或者密码错误';
        if($user->getType() === 1){
            header("location: ../views/activity/activity.php");
        }else{
//            findAllUser();
            header("location: ../views/admin/manage.php");
        }
    }else{
        if($user->getType() === 1){
            header("location: ../views/login/login.php?status=0");
        }else{
            findAllUser();
            header("location: ../views/admin/admin.php?status=0");
        }
    }

}

function findAllUser(){
    global $pdo;
    $sql = 'select * from User where type=?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1,1);
    $stmt->execute();
    return $stmt->fetchAll();
}
