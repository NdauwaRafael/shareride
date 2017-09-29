<?php
session_start();

function user_loggedin()
{
  if (isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])) {
    return true;
  }else {
    return false;
  }
}

$sel_user = mysqli_query($con, "SELECT * FROM `user` WHERE `email`='{$_SESSION['user_email']}'");
while ($user = mysqli_fetch_array($sel_user)) {
  $user_name = $user['firstname']." ".$user['lastname'];
}
 ?>
