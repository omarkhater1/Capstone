<?php
include('../xloop/mainclass.php');
$obj= new xloop();
$obj->updategender($_POST['gender'],$_POST['uid']);
echo $_POST['gender'];
?>