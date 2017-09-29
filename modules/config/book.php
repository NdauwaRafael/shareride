<?php
require '../../config/connect.php';
if ($_POST) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $id = mysqli_real_escape_string($con, $_POST['id']);
  $origin = mysqli_real_escape_string($con, $_POST['origin']);
  $dest = mysqli_real_escape_string($con, $_POST['dest']);

  function notify($user, $ride, $from, $to){


    $subject = "Book Notification";
    // the message
    $msg = "Congratulations!! You have successfully Book A ride from ".$from." to ".$to;
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    $headers = "From: info@shareride.com" . "\r\n" .
    "CC: rider@shareride.com.com";

    mail($to,$subject,$msg,$headers);
  }
$check = mysqli_query($con, "SELECT * FROM `book` WHERE `passenger`='$email' AND `comment`='Active'");
if(mysqli_num_rows($check)){
  echo '<div class="alert alert-warning" role="alert">You are trying to reserve a ride but you still have an active request</div>';

}else{

  $book = mysqli_query($con, "INSERT INTO `book`(`book_id`, `ride_id`, `request_time`, `passenger`) VALUES (NULL,'$id',CURRENT_TIME,'$email')");
  $update = mysqli_query($con, "UPDATE `offer` SET `capacity`=`capacity`-1 WHERE `offer_id`='$id'");
  if ($book && $update) {
    notify($email, $id, $origin, $dest);
    echo '<div class="alert alert-success" role="alert">The ride have been Booked successfully!!</div>';
  }else {
      echo '<div class="alert alert-danger" role="alert">An error occurred while booking</div>'.mysqli_error($con);
  }
}




}

 ?>
