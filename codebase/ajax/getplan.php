<?php
include('../xloop/mainclass.php');
$obj= new xloop();
// var_dump($_POST['bmr']);exit;
if(!empty($_POST['uid'])){
    $result = $obj->getPlan($_POST['bmr'],$_POST['uid']);
}else{
    session_start();
    $result = $obj->getPlan($_POST['bmr'],$_SESSION['rm_user_id']);
}
$arr;
foreach($result as $r){
    $arr[] = $r;
}
echo json_encode($arr);
?>