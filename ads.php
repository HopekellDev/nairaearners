<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
CreateSession();
$page = "ads";
$page_title = "Advertisments";
if (isset($_POST['create-ad'])) {
    $type   =   $_POST['type'];
    $landing=   $_POST['landing'];

    $errors= array();
    $file_name = $_FILES['banner']['name'];
    $file_size =$_FILES['banner']['size'];
    $file_tmp =$_FILES['banner']['tmp_name'];
    $file_type=$_FILES['banner']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['banner']['name'])));
    $final_file = uniqid() . '_' . strtolower($file_name);
    $extensions= array("jpeg","jpg","png");

    CreateAd($id, $type, $landing, $errors, $final_file, $extensions, $file_ext,$file_tmp,$file_name,$file_size);
}
include "./views/layouts/UserLayout.php";
