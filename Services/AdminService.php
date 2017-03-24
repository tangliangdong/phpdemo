<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/24
 * Time: 10:58
 */
include('../Models/User.php');
$dbConf=include '../Connection/conf.php';
include("../Connection/Connection.php");
$pdo=Connection::getInstance($dbConf);

function deleteUser($id){
    global $pdo;
    $pdo->beginTransaction();
    try{
        $sql='delete from user where id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $id);
        if($stmt->execute()>0){

            $arr = array ('status'=>1);
            echo json_encode($arr);
        }else{
            $arr = array ('status'=>0);
            echo json_encode($arr);
        }
        $pdo->commit();
    }catch(PDOException $e){
        $pdo->rollBack();
        throw $e;
    }

}

function addUser($username,$pass){
    global $pdo;
    $pdo->beginTransaction();
    try{
        $password = md5($pass);
        $sql='insert into user(username,password,type) VALUES(?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);
        $stmt->bindValue(3, 2);
        if($stmt->execute()>0){
//            $sql='select id from user where username = ?';
//            $stmt = $pdo->prepare($sql);
//            $stmt->bindValue(1, $username);
//            $stmt->execute();
//            $row = $stmt->fetch();
            $arr = array ('status'=>1);
            echo json_encode($arr);
        }else{
            $arr = array ('status'=>0);
            echo json_encode($arr);
        }
        $pdo->commit();
    }catch(PDOException $e){
        $pdo->rollBack();
        throw $e;
    }

}
