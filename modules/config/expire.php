<?php
@require '../../config/connect.php';
date_default_timezone_set("Africa/Nairobi");
$now = date('h:i:s');

$slect =mysqli_query($con, "SELECT * FROM `offer` WHERE `status`='Active'");
while ($ffer=mysqli_fetch_array($slect)) {
  $f_id = $ffer['offer_id'];
  $f_st = $ffer['status'];
  $f_tm = $ffer['travel_time'];

  if ($f_tm<$now ) {
    $update_offer = mysqli_query($con, "UPDATE `offer` SET `status`='Expired' WHERE `offer_id`='$f_id'");
    $update_request = mysqli_query($con, "UPDATE `book` SET `comment`='Expired' WHERE `ride_id`='$f_id'");

    if ($update_request && $update_offer) {
      echo '<script>alert("Offer Just Expired")</script>';
    }
  }

}

 ?>
