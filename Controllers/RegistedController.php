<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/12
 * Time: 18:43
 */
include('../Services/RegistedService.php');
include("../Models/User.php");

if(isset($_POST['username'])&&isset($_POST['password'])){
    $user=new User($_POST['username'],$_POST['password']);
    addUser($user);
}

if(isset($_POST['doType'])&& $_POST['doType']==='checkUserIsExist'){

    if(checkUserIsExist($_POST['username'])){
        $arr = Array('status'=>0);
        echo json_encode($arr);
    }else{
        $arr = Array('status'=>1);
        echo json_encode($arr);
    }
}

