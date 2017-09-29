<div class="container">


  <div class="col-md-8">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Requested at</th>
            <th>Travelling at</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
<?php
require '../../config/connect.php';
require '../config/expire.php';
$offered = mysqli_query($con, "SELECT * FROM `book`,`offer` WHERE `book`.`passenger`='{$_SESSION['user_email']}' AND `book`.`ride_id`=`offer`.`offer_id` ORDER BY `offer`.`time` DESC") or die(mysqli_error($con));
while ($off = mysqli_fetch_array($offered)) {
  $origin = $off['origin'];
  $dest = $off['destination'];
  $time = $off['travel_time'];
  $when = $off['request_time'];
  $status = $off['status'];
    $com = $off['comment'];
  ?>

  <tr>
    <th scope="row">1</th>
    <td><?=$when?></td>
    <td><?=$time?></td>
    <td><?=$origin?></td>
    <td><?=$dest?></td>
    <td><?php
          if ($com=='Active') {
            echo '<span class="label label-success">Active</span>';
          }else {
            echo '<span class="label label-warning">Expired</span>';
          }
     ?></td>
  </tr>

  <?php
}

 ?>



        </tbody>
      </table>
    </div>

</div>
