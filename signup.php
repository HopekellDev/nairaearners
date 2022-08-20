<?php
ob_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
$url = "http://localhost/nairaearners";
$page_title = "Signup";
$page ="register";
if (isset($_POST['signup'])) {
  $name   = $_POST['name'];
  $username   = $_POST['username'];
  $email  = $_POST['email'];
  $phone  = $_POST['phone'];
  $pass   = $_POST['pass'];
  $repass   = $_POST['re_pass'];
  $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
  if (isset($_COOKIE['REF_USER'])) {
    $ref = $_COOKIE['REF_USER'];
  }else{
    $ref = null;
  }
  $token_code = md5(uniqid());

  // Email Properties
  $subject ="Confirm Your Email: Registration";
  
  // Check for password
  if ($pass !== $repass) {
    $err = "Passwords Don't match";
  }

  // Check for duplicate email
  $result = $conn->query("SELECT email from users WHERE email='$email'");
  if($result->num_rows > 0){
    $err = "Email address already in use, please login or reset password.";
  }

  // Check Username
  $result = $conn->query("SELECT username from users WHERE username='$username'");
  if($result->num_rows > 0){
    $err = "Username taken!, please choose another one.";
  }

  if(!isset($err)){
    $sql = "INSERT INTO users (name, username, email, password, phone, ref, token_code) VALUES ('$name', '$username','$email','$pass_hash','$phone','$ref','$token_code')";
    if($conn->query($sql))
    {
      $last_id = $conn->insert_id;
      $id = base64_encode($last_id);
      $message= "<h3>Email Verification</h3><p>Dear $name, We're pleased to have you aboard. To complete your registration, please click on the following link to confirm your email: <a href='" . $url ."/verify-email?auth=" . $token_code . "&id=" . $id . "'></a>" . $url ."/verify-email?auth=" . $token_code . "&id=" . $id . "</p>";
      $msg = "<div class='alert alert-success'>Welcome $name, Your account has been created. Please check your email to verify account.</div>";
      sendMail($email,$subject,$message,$name);
    }else{
        $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
  }
  
}
include "./views/layouts/AuthLayout.php";