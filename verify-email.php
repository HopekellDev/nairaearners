<?php
ob_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
$page_title = "Verify Registration";
$page ="verify";

if (!isset($_GET['auth']) && !isset($_GET['id']))
{
    header("Location: ./");
}elseif (empty($_GET['auth']) || empty($_GET['id'])) 
{
    header("Location: ./");
}elseif (isset($_GET['auth']) && isset($_GET['id']))
{
    $verified = 1;
    $unverified = 0;
    $code = $_GET['auth'];
    $id = base64_decode($_GET['id']);
    // Validate user
    $query = $conn->query("SELECT * FROM users WHERE id =$id AND token_code='$code' LIMIT 1");
    if ($query->num_rows > 0) 
    {
        $row = $query->fetch_assoc();
        if($row['email_verify'] == $unverified)
        {
            $new_code = md5(uniqid());
            if($conn->query("UPDATE users SET email_verify='$verified', token_code = '$new_code' WHERE id =$id"))
            {
                $msg =" Account ownership verified. Please login";
            }
        }else{
            $err ="You are already Verifid";
        }
    }else{
        $err ="There was a fatal error. That's all we know";
    }
}
include "./views/layouts/AuthLayout.php";
