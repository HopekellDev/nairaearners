<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
$url = $app->site_url;
 
// it will never let you open index(login) page if session is set
if ( isset($_SESSION['userSession'])!="" ) {
  header("Location: ./dashboard");
  exit;
}
if (!empty($_GET['id']) && !empty($_GET['token'])) {
  $id = base64_decode($_GET['id']);
  $token = base64_decode($_GET['token']);
  $new_token = md5(uniqid());
  $result = $conn->query("SELECT id FROM users WHERE id = '$id' AND token_code = '$token'");
  if ($result->num_rows < 0) {
    echo "USER NOT FOUND";
    exit();
  }
}else{
  header("Location: ./login");
}

if (isset($_POST['reset'])) {
  $pass = $_POST['password'];
  $repass = $_POST['repassword'];
  $enc_pass = password_hash($pass, PASSWORD_DEFAULT);

  if ($pass === $repass) {
    $sql = "UPDATE users SET password ='$enc_pass', token_code ='$new_token' WHERE id ='$id'";
    if ($conn->query($sql)) {
      $msg = "Password Have Been Change :)";
      notify($msg, 'success');
      header('Location: ./login');
    }
  }else{
    $msg = "Password Incorrect :(";
    notify($msg, 'error');
    header('Location: ');
  }
}
$page_title = "Password reset";
$page ="resetpass";
include "./views/layouts/AuthLayout.php";