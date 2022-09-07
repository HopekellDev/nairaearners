<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

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
        $msg = 'Message has been sent '.$email;
        return $msg;
    } catch (Exception $e) {
        $msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return $msg;
    }
    
}


function notify($msg, $type)
{
    setcookie('notify', $msg, time()+5, '/');
    setcookie('notify_type', $type, time()+5, '/');
    
        
}

Function CreateWallet($id)
{
    global $conn;
    $result = $conn->query("SELECT * FROM crypto_wallets WHERE user_id ='$id'");
    if ($result->num_rows < 1) {
       $conn->query("INSERT INTO crypto_wallets (user_id) VALUES ('$id')");
    }
    $result = $conn->query("SELECT * FROM bank_accounts WHERE user_id ='$id'");
    if ($result->num_rows < 1) {
       $conn->query("INSERT INTO bank_accounts (user_id) VALUES ('$id')");
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
        $message = "<h3>Profile Update Notice</h3><p>Dear $name, This is to notify you that your profile has recently been updated.</p> <p> If you did not do this please login and change your password to secure your account.</p> <p>Thanks.</p>";
        notify($msg, 'success');
        sendMail($email,$subject,$message,$name);
        header('Location: ./my-profile');
    }else{
        $msg= "Error" . $conn->error;
    }

}

// Upadte Withdrawal Metthods
Function updateCrypto($id)
{
    global $conn;
    $usdt = $_POST['usdt'];
    $busd = $_POST['busd'];
    if($conn->query("UPDATE crypto_wallets SET busd = '$busd', usdt ='$usdt' WHERE user_id='$id'"))
    {
        $msg = "Crypto Wallets Updated";
        notify($msg, 'success');
        header('Location: ./my-profile');
    }
}

Function updateBank($id)
{
    global $conn;
    $bank = $_POST['bank'];
    $benficiary = $_POST['beneficiary'];
    $nuban = $_POST['nuban'];
    if ($conn->query("UPDATE bank_accounts SET bank_name='$bank', beneficiary='$benficiary', account_number='$nuban' WHERE user_id='$id'")) 
    {
        $msg = "Bank account Updated";
        notify($msg, 'success');
        header('Location: ./my-profile');
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

Function uploadPhoto($id)
{
    global $conn;
    $folder="./uploads/user/";
    $temp_file = explode(".", $_FILES["photo"]["name"]);
	$photo = round(microtime(true)) . '.' . end($temp_file);
	$file_loc = $_FILES['photo']['tmp_name'];
	$new_file_name = strtolower(md5($photo));
	$final_file=str_replace(' ','-',$new_file_name) . '.png';
    if (move_uploaded_file($file_loc,$folder.$final_file)) {
        $conn->query("UPDATE users SET avatar ='$final_file' WHERE id ='$id'");
        $msg = "Pofile photo updated";
        notify($msg, 'success');
        header('Location: ./my-profile');
    }

}

function creditReferrer($ref,$id){
    global $conn;
    $result = $conn->query("SELECT * FROM users WHERE id='$id'");
    $user = $result->fetch_assoc();
    extract($user);
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

function MakeWithdraw($id,$min_withdraw, $balance)
{
    global $conn;
    $method = $_POST['method'];
    $amount = $_POST['amount'];
    $ref = strtoupper(uniqid());

    // Check for wallet balance
    if ($balance <= $amount-1) {
        $error = true;
        $msg = "No sufficient balance for withdrawal!";
        notify($msg, 'error');
        header('Location: ./withdraw');
    }

    // Check for Withdrawal Threshold
    if ($min_withdraw > $amount) {
        $error = true;
        $msg = "Withdrawal Amount must be upto " . $min_withdraw . "!";
        notify($msg, 'error');
        header('Location: ./withdraw');
    }
    // Check Withdrawall Methods

    #Bank
    $result = $conn->query("SELECT * FROM bank_accounts WHERE user_id ='$id'");
    if($result->num_rows == 0){
        $error = true;
        $msg = "Please Update you bank details";
        notify($msg, 'error');
        header('Location: ./withdraw');
    }

    #Crypto
    $result = $conn->query("SELECT * FROM crypto_wallets WHERE user_id = '$id'");
    $wal= $result->fetch_assoc();
    #Check USDT
    if ($method =='USDT' && $wal['usdt'] == null) {
        $error = true;
        $msg = "Please Update your USDT-Bep20 Wallet";
        notify($msg, 'error');
        header('Location: ./withdraw');
    }
    #Check BUSD
    if ($method =='BUSD' && $wal['busd'] == null) {
        $error = true;
        $msg = "Please Update your BUSD-Bep20 Wallet";
        notify($msg, 'error');
        header('Location: ./withdraw');
    }

    // Save Withdrawal request
    if(!isset($error)){
        if($conn->query("INSERT INTO withdrawals (user_id, method, amount, ref) VALUES ('$id', '$method', '$amount', '$ref')")){
            $sql ="UPDATE wallets SET balance = balance-$amount WHERE user_id ='$id'";
            if ($conn->query($sql)) {
                $msg = "Withdrawal request successful!";
                notify($msg, 'success');
                header('Location: ./withdraw');
            }
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

// Create Adverts
function CreateAd($id,$type, $landing, $errors, $final_file, $extensions, $file_ext,$file_tmp,$file_name,$file_size)
{
    global $conn;
    $ads_id = rand(100000,999999);
    $final_file =  time() . '_' . $file_name;
    if(in_array($file_ext,$extensions)=== false){
        // $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        $msg = "extension not allowed, please choose a JPEG or PNG file.";
        notify($msg, 'error');
        header('Location: ./ads');
     }
     
     if($file_size > 2097152){
        // $errors[]='File size must be excately 2 MB';
        $msg = "File size must not exceed 2 MB";
        notify($msg, 'error');
        header('Location: ./ads');
     }
     
     if(empty($errors)==true){
        move_uploaded_file($file_tmp,"uploads/ads/".$final_file);
        $conn->query("INSERT INTO ads (user_id, ads_id, location, ads, landing, expires_at) VALUES ('$id', '$ads_id', '$type', '$final_file', '$landing',null)");
        $msg = "Ads Created Successfully!";
        notify($msg, 'success');
        header('Location: ./ads');
     }
}

function activateAdsPS($id,$ad)
{
    global $conn;
    $ads = base64_decode($ad);
    $exp  = date('Y-m-d H:i:s', time()+(86400*30));
    if($conn->query("UPDATE ads SET status = '1', expires_at='$exp' WHERE ads_id='$ads'"))
    {
        $msg = "Ads " . $ad ." Activated Successfully!";
        notify($msg, 'success');
        header('Location: ./ads');
    }
}




# Admin Functions Start

// Users
 Function activeUsers()
 {
    global $conn;
    $result =$conn->query("SELECT id FROM users WHERE status = '1' AND user_role='user'");
    $count = $result->num_rows;
    return $count;
 }
 Function inactiveUsers()
 {
    global $conn;
    $result =$conn->query("SELECT id FROM users WHERE status = '0' AND user_role='user'");
    $count = $result->num_rows;
    return $count;
 }

 Function removeAdmin($user, $action)
 {
     global $conn;
     $admin_id = $user;
     if ($conn->query("UPDATE users SET user_role='user' WHERE id ='$admin_id'")) {
         $msg = "User Role Changed to 'USER'!";
         notify($msg, 'success');
         header('Location: ./user?id=' . base64_encode($user));
     }
 }
 
 Function ActivateUser($iref)
 {
    global $conn;
    $id = base64_decode($_GET['id']);
    $conn->query("UPDATE users SET status ='1' WHERE id = '$id'");
    $conn->query("UPDATE wallets SET balance = balance + 700 WHERE user_id = '$iref'");
    $msg =  "User Activated";
    notify($msg, 'success');
    header('Location: ./user?id=' . base64_encode($id));
 }


 Function makeAdmin($user, $action)
 {
     global $conn;
     $admin_id = $user;
     if ($conn->query("UPDATE users SET user_role='admin' WHERE id ='$admin_id'")) {

         $msg = "User Role Changed to 'USER'!";
         notify($msg, 'success');
         header('Location: ./user?id=' . base64_encode($user));
     }
 }

 Function unblockUser($user, $action)
 {
    global $conn;
    $admin_id = $user;
    if ($conn->query("UPDATE users SET email_verify='1' WHERE id ='$admin_id'")) {

        $msg = "User Activated!";
        notify($msg, 'success');
        header('Location: ./user?id=' . base64_encode($user));
    }
 }
 Function blockUser($user, $action)
 {
     global $conn;
     $admin_id = $user;
     if ($conn->query("UPDATE users SET email_verify='0' WHERE id ='$admin_id'")) {

         $msg = "User Blocked";
         notify($msg, 'success');
         header('Location: ./user?id=' . base64_encode($user));
     }
 }



//  Witdrawals

Function withdrawCount()
{
    global $conn;
    $result = $conn->query("SELECT * FROM withdrawals");
    $count = $result->num_rows;
    return $count;
}

Function pendingWitdrawals()
{
    global $conn;
    $result = $conn->query("SELECT * FROM withdrawals WHERE status='0'");
    $count = $result->num_rows;
    return $count;
}

Function withdrawApprove($ref)
{
    global $conn;
    if ($conn->query("UPDATE withdrawals SET status ='1' WHERE ref='$ref'")) {
        $msg = "Withdrawal Approved";
        notify($msg, 'success');
        header('Location: ./trx?ref=' . $ref);
    }
}

Function declineApprove($ref,$user_id,$amount)
{
    global $conn;
    if ($conn->query("UPDATE withdrawals SET status ='2' WHERE ref='$ref'")) {
        $conn->query("UPDATE wallets SET balance=balance+$amount WHERE user_id='$user_id'");
        $msg = "Withdrawal Declined";
        notify($msg, 'success');
        header('Location: ./trx?ref=' . $ref);
    }
}

// Advertisments

Function allAds(){
    global $conn;
    $result = $conn->query("SELECT id FROM ads");
    $count = $result->num_rows;
    return $count;
}



// Settings

Function saveGeneral()
{
    global $conn;
    $site_name = $_POST['site_name'];
    $site_url = $_POST['site_url'];
    $site_email = $_POST['site_email'];
    $site_phone = $_POST['site_phone'];
    $seo_title = $_POST['seo_title'];
    $site_description = $_POST['site_description'];
    $site_currency = $_POST['site_currency'];
    $site_currency_symbol = $_POST['site_currency_symbol'];
    $reg_bonus = $_POST['reg_bonus'];
    $min_withdraw = $_POST['min_withdraw'];
    $ads_fee = $_POST['ads_fee'];
    $pstk_publick_key = $_POST['pstk_publick_key'];
    $flw_publick_key = $_POST['flw_publick_key'];
    $date = date("Y-m-d H:i:s");
    if ($conn->query("UPDATE settings SET site_name = '$site_name', site_url = '$site_url', site_email = '$site_email', site_phone = '$site_phone', seo_title = '$seo_title', site_description = '$site_description', currency = '$site_currency', currency_symbol = '$site_currency_symbol', reg_bonus = '$reg_bonus', min_withdraw = '$min_withdraw', ads_fee = '$ads_fee', pstk_public_key = '$pstk_publick_key',flw_public_key ='$flw_publick_key', date_updated ='$date' WHERE id=1")) {
        $msg = "Settings Updated";
        notify($msg, 'success');
        header('Location: ./general-settings');
    }
}

Function saveEmail()
{
    global $conn;
    $smtp_host  =   $_POST['smtp_host'];
    $smtp_port  =   $_POST['smtp_port'];
    $encryption     =   $_POST['encryption'];
    $smtp_user  =   $_POST['smtp_user'];
    $smtp_password  =   $_POST['smtp_password'];
    $smtp_from_email    =   $_POST['smtp_from_email'];
    $smtp_from_name     =   $_POST['smtp_from_name'];

    if($conn->query("UPDATE mail_settings SET smtp_host = '$smtp_host', smtp_port = '$smtp_port', encryption = '$encryption', smtp_user = '$smtp_user', smtp_pass = '$smtp_password', smtp_email = '$smtp_from_email', smtp_from = '$smtp_from_name'"))
    {
        $msg = "Settings Updated";
        notify($msg, 'success');
        header('Location: ./email-settings');
    }
}

Function testSMTP()
{
    global $conn;
    $email = $_POST['email'];
    $subject = "Test SMTP Email";
    $message = "This is a test email. Your Email Configuration is working";
    $name ="Admin";
    $msg = sendMail($email,$subject,$message,$name);

    notify($msg, 'info');
    header('Location: ./email-settings');
}

Function CreateCountry()
{
    global $conn;
    $country_name   = $_POST['country_name'];
    $currency_code  = $_POST['currency_code'];
    $currency_symbol    = $_POST['currency_symbol'];
    
    $conn->query("INSERT INTO countries (country_name, country_currency, country_symbol) VALUES ('$country_name', '$currency_code', '$currency_symbol')");
    $msg = "Country Created";
    notify($msg, 'success');
    header('Location: ./country-settings');
}

Function UploadLogo()
{
    global $conn;
    $folder="../assets/images/";
    $temp_file = explode(".", $_FILES["logo"]["name"]);
	$logo = round(microtime(true)) . '.' . end($temp_file);
	$file_loc = $_FILES['logo']['tmp_name'];
	$new_file_name = strtolower(md5($logo));
	$final_file=str_replace(' ','-',$new_file_name) . '.png';
    if (move_uploaded_file($file_loc,$folder.$final_file)) {
        $conn->query("UPDATE frontend SET logo ='$final_file'");
        $msg = "Logo Uploaded";
        notify($msg, 'success');
        header('Location: ./front-settings');
    }
}

Function UploadIcon()
{
    global $conn;
    $folder="../assets/images/";
    $temp_file = explode(".", $_FILES["icon"]["name"]);
	$icon = round(microtime(true)) . '.' . end($temp_file);
	$file_loc = $_FILES['icon']['tmp_name'];
	$new_file_name = strtolower(md5($icon));
	$final_file=str_replace(' ','-',$new_file_name) . 'png';
    if (move_uploaded_file($file_loc,$folder.$final_file)) {
        $conn->query("UPDATE frontend SET icon ='$final_file'");
        $msg = "Logo Uploaded";
        notify($msg, 'success');
        header('Location: ./front-settings');
    }
}