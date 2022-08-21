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
        echo "We are Good to Go!";
        if ($conn->query("UPDATE users SET status = '1' WHERE id = '$id'")) {

            // If has referrer, Credit Referer
            creditReferrer($ref);

            // Message and Notification
            $msg = "Your account have been activated";
            $subject = "Account Activation Notice!";
            $message = "<h3>Account Activation Notice!</h3><p>Dear $name, This is to notify you that your Account have been activated and you can now start earning when you refer family and friends.</p>";
            notify($msg, 'success');
            sendMail($email,$subject,$message,$name);
            header('Location: ./account-activation');
        }
    }else{
        echo "Oops! An Error Occoured.";
    }
}else{
    echo "Oops! An Error Occoured.";
}
