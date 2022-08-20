<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
$url = "http://localhost/nairaearners";
 
// it will never let you open index(login) page if session is set
if ( isset($_SESSION['userSession'])!="" ) {
  header("Location: ./dashboard");
  exit;
}

$page_title = "Login";
$page ="login";
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);

  // CHECK IF ACCOUNT EXIST
  $query = $conn->query("SELECT * FROM users WHERE email = '$email'");
  if ($query->num_rows == 1) {
    $row = $query->fetch_assoc();
    if($row['email_verify']==1)
    {
      if (password_verify($pass, $row['password'])) {
        $_SESSION['userSession'] = $row['id'];
        // $user = $row['id'];
        // $sql = "INSERT INTO tbl_login (loginUser, loginIP, loginBrowser, loginPlatform, loginLocation) VALUES ('$user', '$ip', '$browser', '$platform', '$country')";
        // $conn->query($sql);
        header("Location: dashboard");
      }else{
        $msg = "You have entered an incorrect password";
      }
    }else{
      $msg = "Email not verified. Please check your inbox";
    }
  }else{
    $msg = "Invalid account, Check details & Retry!";
  }
}
include "./views/layouts/AuthLayout.php";