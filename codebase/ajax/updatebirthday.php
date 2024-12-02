<?php
include('../xloop/mainclass.php');
$obj= new xloop();
$obj->updatebirthday($_POST['birthday'],$_POST['uid']);
echo $_POST['birthday'];
?>