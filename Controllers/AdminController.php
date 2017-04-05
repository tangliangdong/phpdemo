<?php

/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/19
 * Time: 12:37
 */
//include('../Models/User.php');
include('../Services/AdminService.php');
if (isset($_POST['type'])&&isset($_POST['id'])){
    deleteUser($_POST['id']);
}

if (isset($_POST['type'])&&isset($_POST['username'])&&isset($_POST['password'])){
    $user = new User($_POST['username'],$_POST['password'],2);
//    addUser($_POST['username'],$_POST['password']);
    addUser($user);
}

if(isset($_GET['type'])&&$_GET['type']==='cancel'){
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    header("location: ../views/admin/admin.php");
}