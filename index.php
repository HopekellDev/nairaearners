<?php
// Set Referral Var.
if(isset($_GET['ref']))
{
    
    $ref = base64_decode($_GET['ref']);
    setcookie('REF_USER', $ref, time() + (86400 * 30), "/");
    
}

include "./user/includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
$front = new FrontEnd();
$front->GetFrontEnd();
$url = $app->site_url;

include "./views/layouts/FrontLayout.php";