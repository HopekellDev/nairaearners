<?php
include "./user/includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
$front = new FrontEnd();
$front->getFrontEnd();
$url = $app->site_url;

include "./views/layouts/FrontLayout.php";