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
if (isset($_POST['fpass'])) {
  $email = $_POST['email'];
  $result = $conn->query("SELECT * FROM users WHERE email ='$email'");
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    extract($row);
    $id = base64_encode($id);
    $message= "<h3>Password Reset request</h3><p>Dear $name, You have reuested to reste your Password Plese click the forlowing link to reset: <a href='" . $url ."/reset-password?token=" . $token_code . "&id=" . $id . "'></a>" . $url ."/reset-password?auth=" . $token_code . "&id=" . $id . "</p><p>Please Ignore this email if you did not request to reset your password.</p>";
    
    $subject = "Password RESET";
    if(sendMail($email,$subject,$message,$name)){
        $msg = "<div class='alert alert-success'>We have sent a link to your email.</div>";
    }
  }else{
      $msg = "<div class='alert alert-danger'>User With $email not Found</div>";
  }
}
$page_title = "Forgot Password";
$page ="fpass";
include "./views/layouts/AuthLayout.php";

