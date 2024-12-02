<?php
session_start();
include_once('mainclass.php');
require_once(dirname(__DIR__, 3).'/assets/libraries/DB/vendor/joshcam/mysqli-database-class/MysqliDB.php');
include_once(dirname(__DIR__, 3).'/assets/includes/tabels.php');
require_once(dirname(__DIR__, 3).'/assets/includes/cache.php');
include_once(dirname(__DIR__, 3).'/assets/includes/functions_general.php');
$obj = new xloop();
$db        = new MysqliDb($obj->xcon());
// for language and config
$config = $obj->Wo_GetConfig();
$wo["config"]              = $config;
if (empty($_SESSION["lang"])) {
    $_SESSION["lang"] = $wo["config"]["defualtLang"];
}

$wo["language"] = $_SESSION["lang"];
$wo["language_type"] = "ltr";
$rtl_langs = array(
    "arabic"
);

// checking if corrent language is rtl.

foreach ($rtl_langs as $lang) {
    if ($wo["language"] == strtolower($lang)) {
        $wo["language_type"] = "rtl";
    }
}

// Include Language File

$wo["lang"] = $obj->Wo_LangsFromDB($wo["language"]);
if (file_exists("assets/languages/extra/" . $wo["language"] . ".php")) {
    require "assets/languages/extra/" . $wo["language"] . ".php";
}

if (empty($wo["lang"])) {
    $wo["lang"] = Wo_LangsFromDB();
}

$main_user_id = $_SESSION['rm_user_id']; //this session is comming from app_start.php from wowonder
$q = $obj->getUserData($main_user_id);
mysqli_num_rows($q) <= 0 ? header("Location: erroraddfitness.php") : 'ok';
foreach ($q as $a) {
    // echo "<pre>";
    // print_r($a);
    $_SESSION["rm_user_id"] = $a['user_id'];
    $_SESSION["rm_user_name"] = $a['username'];
    $_SESSION["rm_full_name"] = $a['full_name'];
    $_SESSION["rm_user_gender"] = ucfirst($a['gender']);
    // echo "</pre>";
}

?>
