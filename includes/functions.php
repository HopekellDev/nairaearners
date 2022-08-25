<?php
$url = "http://localhost/nairaearners/";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

function CreateSession()
{
    #session_start();
    // If session is not set this will redirect to login page
    if( !isset($_SESSION['userSession']) ) {
        header("Location: ./login");
        exit;
    }
}

if ( isset($_SESSION['userSession'])!="" ) {
    // Get logged in users detail
    $query = $conn->query("SELECT * FROM users WHERE id=".$_SESSION['userSession']);
    $userRow = $query->fetch_assoc();
    extract($userRow);
}

function sendMail($email,$subject,$message,$name)
{
    global $mail;
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.nairaearners.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'no-reply@nairaearners.com';                     //SMTP username
        $mail->Password   = "t;,fe6WDEZbY";                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('no-reply@nairaearners.com', 'Naira Earners');
        $mail->addAddress($email, $name);     //Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function notify($msg, $type)
{
    setcookie('notify', $msg, time()+5, '/');
    setcookie('notify_type', $type, time()+5, '/');
    
        
}

function UpdateProfile($email, $id, $name, $phone, $address, $city, $state, $country)
{
    global $conn;
    $name   =   $_POST['name'];
    $phone  =   $_POST['phone'];
    $address    =   $_POST['address'];
    $city   =   $_POST['city'];
    $state  =   $_POST['state'];
    $country    =   $_POST['country'];
    if ($conn->query("UPDATE users SET name='$name', phone='$phone', address='$address', city='$city', province='$state', country='$country' WHERE id ='$id'")) {
        $msg = "Profile Has been Updated";
        $subject = "Profile Update Notice";
        $message = "<h3>Profile Update Notice</h3><p>Dear $name, This is to notify you that your profile has recently been updated.</p> <p> If you did not do this please login and change your password to secure your account.</p> <p>Thanks.</p>";
        notify($msg, 'success');
        sendMail($email,$subject,$message,$name);
        header('Location: ./my-profile');
    }else{
        $msg= "Error" . $conn->error;
    }

}

function UpdatePassword($email, $id, $name, $password, $old_pass, $new_pass, $pass_confirm)
{
    global $conn;
    // Check if old password is correct
    if (password_verify($old_pass, $password))
    {
        // Check if new passwords mtach
        if($new_pass == $pass_confirm) {
            $pass = password_hash($new_pass, PASSWORD_DEFAULT);
            if ($conn->query("UPDATE users SET password = '$pass' WHERE id ='$id'")) {
                // Message and Notification
                $msg = "Password Has been Updated";
                $subject = "Password Update Notice";
                $message = "<h3>Password Update Notice</h3><p>Dear $name, This is to notify you that your profile has recently been updated.</p> <p> If you did not do this please login and change your password to secure your account.</p> <p>Thanks.</p>";
                notify($msg, 'success');
                sendMail($email,$subject,$message,$name);
                header('Location: ./my-profile');
            }
        }else{
            $msg = "New passwords don't Match!";
            notify($msg, 'error');
            header('Location: ./my-profile');
        }
    }else{
        $msg = "Old password Incrrect!";
        notify($msg, 'error');
        header('Location: ./my-profile');
    }

}

function creditReferrer($ref){
    global $conn;
    if ($ref !=NULL) {
        $conn->query("UPDATE wallets SET balance = balance+700 WHERE username ='$ref'");
    }
}

function allDownlines($username){
    global $conn;
    $result = $conn->query("SELECT * FROM users WHERE ref='$username' ORDER BY id DESC");
    return $result;
}

function CheckWallet($id,$reg_bonus){
    global $conn;
    $result = $conn->query("SELECT user_id FROM wallets WHERE user_id = '$id'");
    if ($result->num_rows <= 0) {
        $tx_ref = strtoupper(uniqid());
        $conn->query("INSERT INTO wallets (user_id, balance) VALUES('$id','$reg_bonus')");
        $conn->query("INSERT INTO transactions (user_id,amount,type,tx_ref,status) VALUES ('$id','$reg_bonus',1,'$tx_ref',1)");
    }
}

function GetBalance($id){
    global $conn;
    $result = $conn->query("SELECT * FROM wallets WHERE user_id = '$id' LIMIT 1");
    if ($result->num_rows > 0) {
        $brow = $result->fetch_assoc();
        $bal = $brow['balance'];
        return $bal;
    }
}

function MakeWithdraw($id, $amount, $min_withdraw, $balance,$method){
    global $conn;
    $ref = strtoupper(uniqid());
    // Check for wallet balance
    if ($balance < $amount) {
        $msg = "No sufficient balance for withdrawal!";
        notify($msg, 'error');
        header('Location: ./withdraw');
    }

    // Check for Withdrawal Threshold
    if ($min_withdraw > $amount) {
        $msg = "Withdrawal Amount must be upto " . $min_withdraw . "!";
        notify($msg, 'error');
        header('Location: ./withdraw');
    }

    // Save Withdrawal request
    if($conn->query("INSERT INTO withdrawals (user_id, method, amount, ref) VALUES ('$id', '$method', '$amount', '$ref')")){
        $sql ="UPDATE wallets SET balance = balance-$amount WHERE user_id ='$id'";
        if ($conn->query($sql)) {
            $msg = "Withdrawal request successful!";
            notify($msg, 'success');
            header('Location: ./withdraw');
        }
    }

}

// Verified Referrals
function VerifRef($username){
    global $conn;
    $result = $conn->query("SELECT * FROM users WHERE status ='1' AND ref = '$username'");
    $active_ref = $result->num_rows;
    return $active_ref;
}

// Unverified Referrals
function UnverifRef($username){
    global $conn;
    $result = $conn->query("SELECT * FROM users WHERE status ='0' AND ref = '$username'");
    $inactive_ref = $result->num_rows;
    return $inactive_ref;
}

// Withdrawal Count
function AllWithdrawals($id){
    global $conn;
    $result = $conn->query("SELECT * FROM withdrawals WHERE user_id='$id'");
    $withdrawals = $result->num_rows;
    return $withdrawals;
}
