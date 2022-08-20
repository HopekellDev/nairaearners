<?php
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
    if($type === 'success'){
        setcookie('notify', $msg, time()+5, '/');
        setcookie('notify_type', $type, time()+5, '/');
    }else{

    }
        
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
        $message = "<h3>Profile Update Notice<p>Dear $name, This is to notify you that your profile has recently been updated.</p> <p> If you did not do this please login and change your password to secure your account.</p> <p>Thanks.</p>";
        notify($msg, 'success');
        sendMail($email,$subject,$message,$name);
        header('Location: ./my-profile');
    }else{
        $msg= "Error" . $conn->error;
   