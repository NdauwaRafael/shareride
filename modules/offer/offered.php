<div class="container">


  <div class="col-md-8">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>When</th>
            <th>Origin</th>
            <th>Travel At</th>
            <th>Destination</th>
            <th>Capacity</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
<?php
require '../../config/connect.php';
require '../config/expire.php';
$n = date('H:i:s');

$offered = mysqli_query($con, "SELECT * FROM `offer` WHERE `user`='{$_SESSION['user_email']}' ORDER BY `offer`.`time` DESC");
while ($off = mysqli_fetch_array($offered)) {
  $origin = $off['origin'];
  $dest = $off['destination'];
  $capacity = $off['capacity'];
  $when = $off['time'];
  $time = $off['travel_time'];
  $status = $off['status'];
  ?>

  <tr>
    <th scope="row">1</th>
    <td><?=$when?></td>
    <td><?=$origin?></td>
    <td><?=$time?></td>
    <td><?=$dest?></td>
    <td><?=$capacity?></td>
    <td><?php
          if ($status=='Active') {
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
