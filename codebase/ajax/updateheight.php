<?php
include('../xloop/mainclass.php');
$obj= new xloop();
$obj->updateheight($_POST['height'],$_POST['uid']);
echo $_POST['height'];
?>