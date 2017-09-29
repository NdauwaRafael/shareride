<?php
require 'connect.php';
if ($_POST) {
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $idno = mysqli_real_escape_string($con, $_POST['idno']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpass = mysqli_real_escape_string($con, $_POST['cpass']);

  if (empty($firstname) || empty($lastname)||empty($email) || empty($password)|| empty($cpass)) {
    echo '<div class="alert alert-danger" role="alert">Fill In All inputs details before submitting.</div>';
  }else {
    $reg = mysqli_query($con, "INSERT INTO `user`(`id`, `firstname`, `lastname`, `idno`, `email`, `password`) VALUES (NULL,'$firstname','$lastname','$idno','$email','$password')");

     if ($reg) {
        $_SESSION['user_email']=$email;
        echo '<script>window.location.href="modules/home.php"</script>';
     }else {
       echo '<div class="alert alert-danger" role="alert">Failed to register the User, verify the submited data and try again</div>'.mysqli_error($con);
     }
  }
}
 ?>
