<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/13
 * Time: 18:06
 */
include('../Services/CalculatorService1.php');
if(isset($_POST['first'])&&isset($_POST['second'])&&isset($_POST['sign'])){
    $result = calculator($_POST['first'],$_POST['second'],$_POST['sign']);
    if($result==='error'){
        $json = Array('status'=>0);
        echo json_encode($json);
    }else if(is_numeric($result)){
        $json = Array('status'=>1,'result'=> $result);
        echo json_encode($json);
    }else{
        $json = Array('status'=>2,'result'=> $result);
        echo json_encode($json);
    }
}