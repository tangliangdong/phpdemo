<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/10
 * Time: 11:12
 */

//include("../Models/User.php");
include("../Connection/Connection.php");
$dbConf=include '../Connection/conf.php';
$pdo=Connection::getInstance($dbConf);

function addUser($user){
    global $pdo;
    $sql='SELECT * from User WHERE username=?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1,$user->getUsername());
    $stmt->execute();
    if($stmt->rowCount()>0){
        echo '此用户已存在';
    }else{
        $password = md5($user->getPassword());
        $pdo->beginTransaction();
        $sql = 'insert into USER(username,password) VALUES (:username,:password)';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':username', $user->getUsername());
        $sth->bindParam(':password', $password);
        $sth->execute();
        $pdo->commit();
        echo '成功注册';
        header("location: ../views/login/login.php");
        exit;

    }
}
function checkUserIsExist($username){
    global $pdo;
    $sql='SELECT * from User WHERE username=?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1,$username);
    $stmt->execute();
    if($stmt->rowCount()>0){
        return true;
    }else{
        return false;
    }
}



//$rows = $stmt->fetchAll();
//print_r($rows);

//$rs=$pdo->query($sql);
//$data=$rs->fetchAll();//取出所有结果
//print_r($data);
//
//echo $user->getUsername();
//echo $user->getPassword();

//move_uploaded_file($_FILES["file"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']);
