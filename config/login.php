<?php
require 'connect.php';
if ($_POST) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (empty($email) || empty($password)) {
    echo '<div class="alert alert-danger" role="alert">Fill In Email and Password details before submitting.</div>';
  }else {
    $check = mysqli_query($con, "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'");
    if ($check) {
          if (mysqli_num_rows($check)>0) {
            $_SESSION['user_email']=$email;
            echo '<script>window.location.href="modules/home.php"</script>';
          }else{
            echo '<div class="alert alert-danger" role="alert">Invalid Login Details. Make sure you provide right login email and password login details</div>';
          }
    }else {
      echo "Failed to Verify details".mysqli_error($con);
    }
  }
}
 ?>
