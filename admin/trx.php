<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "../user/includes/Classes/class.site.php";
include "../user/includes/functions.php";
$app = new WebSettings();
$app->getSetings();

CreateSession();

$page = "trx";
if (!empty($_GET['ref'])) {
    $ref = $_GET['ref'];
    $result = $conn->query("SELECT u.*, w.* FROM withdrawals w, users u WHERE w.ref ='$ref' AND u.id = w.user_id");
    if ($result->num_rows > 0) {
        $trx = $result->fetch_assoc();
    }
}

if (isset($_GET['ref']) && isset($_GET['approve'])) {
   withdrawApprove($_GET['ref']);
}
if (isset($_GET['ref']) && isset($_GET['decline'])) {
    declineApprove($_GET['ref'],$_GET['user'],$_GET['coin']);
}
$page_title = "Withdrawal: " . $_GET['ref'];
include "../user/views/layouts/AdminLayout.php";

