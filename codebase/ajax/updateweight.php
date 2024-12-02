<?php
include('../xloop/mainclass.php');
$obj= new xloop();
$obj->updateweight($_POST['weight'],$_POST['uid']);
echo $_POST['weight'];
?>