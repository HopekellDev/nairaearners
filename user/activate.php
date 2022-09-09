<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();

if (!empty($_GET['id']) && !empty($_GET['state']) ) {
    $sess_id = base64_decode($_GET['id']);
    $status = base64_decode($_GET['state']);
    if ($sess_id === $id && $status === 'success') {
        creditReferrer($ref);
    }else{
        echo "Oops! An Error Occoured.";
    }
}else{
    echo "Oops! An Error Occoured.";
}
