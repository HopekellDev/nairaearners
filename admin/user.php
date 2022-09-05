<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "../user/includes/Classes/class.site.php";
include "../user/includes/functions.php";
$app = new WebSettings();
$app->getSetings();

CreateSession();
if (!empty($_GET['id'])) {
    $this_id = base64_decode($_GET['id']);
    $result = $conn->query("SELECT * FROM users WHERE id = '$this_id' LIMIT 1");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    
}else{

}

if (isset($_GET['id']) && isset($_GET['removeadmin'])) {
    $user = base64_decode($_GET['id']);
    $action = true;
    removeAdmin($this_id, $action);
}

if (isset($_GET['id']) && isset($_GET['makeadmin'])) {
    $user = base64_decode($_GET['id']);
    $action = true;
    makeAdmin($this_id, $action);
}

if (isset($_GET['id']) && isset($_GET['block'])) {
    $user = base64_decode($_GET['id']);
    $action = true;
    blockUser($this_id, $action);
}

if (isset($_GET['id']) && isset($_GET['activate'])) {
    $user = base64_decode($_GET['id']);
    $action = true;
    unblockUser($this_id, $action);
}

if (isset($_GET['activate_acct'])) {
    ActivateUser();
}
$page = "user";
$page_title = "User: " . $row['name'];
include "../user/views/layouts/AdminLayout.php";

