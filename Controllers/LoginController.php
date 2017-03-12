<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/12
 * Time: 18:59
 */
include('../Models/User.php');
include('../Services/LoginService.php');
if(isset($_POST['username'])&&isset($_POST['password'])){
    $user = new User($_POST['username'],$_POST['password']);
    check($user);
}

if(isset($_GET['type'])&&$_GET['type']==='cancel'){
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    header("location: ../views/login/login.php");
}


