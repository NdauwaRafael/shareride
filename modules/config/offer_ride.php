<?php
require '../../config/connect.php';

if ($_POST) {
  $origin = mysqli_real_escape_string($con, $_POST['origin']);
  $destination = mysqli_real_escape_string($con, $_POST['destination']);
  $capacity = mysqli_real_escape_string($con, $_POST['capacity']);
  $time = mysqli_real_escape_string($con, $_POST['travel_time']);

  date_default_timezone_set("Africa/Nairobi");
  $t_now = date('h:i:s');

  if (!empty($origin) || !empty($destination) || !empty($capacity) ) {


if ($t_now>$time) {
          echo '<div class="alert alert-warning" role="alert"><strong>Thats Not Right!!</strong> It seems you are trying to add a time that have already erapsed.</div>';
}else{
/*----------------------------------If the time is current or future------------------------------------------*/
      $check = mysqli_query($con, "SELECT * FROM `offer` WHERE `user`='{$_SESSION['user_email']}' AND `status`='Active'");
      if (mysqli_num_rows($check)>0) {
      echo '<div class="alert alert-warning" role="alert"><strong>Oh No!!</strong> It seems you already have an active ride you offered, cannot offer a ride concurrently. Sorry.</div>';
      }else {
          $offer = mysqli_query($con, "INSERT INTO `offer`(`offer_id`, `origin`, `destination`, `travel_time`,`capacity`, `user`, `time`,`status`) VALUES (NULL,'$origin','$destination','$time','$capacity','{$_SESSION['user_email']}',CURRENT_TIME,'Active')");

          if ($offer) {
            echo '<div class="alert alert-success" role="alert">Success!! You have offered your ride successfully.</div>';
          }else {
            echo '<div class="alert alert-danger" role="alert">Oops!! Your ride could not be added.</div>';
          }
      }
/*-----------------------------------------------------------------------------------------------------------------------*/
}


  }else {
    echo '<div class="alert alert-danger" role="alert"><strong>Error!!</strong> Fill in all the fields before submitting.</div>';
  }
}
 ?>
