<div class="container">

<div id="book_status"></div>
  <div class="col-md-8">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>When</th>
            <th>Origin</th>
            <th>Travelling At</th>
            <th>Destination</th>
            <th>Capacity Remaining</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php
require '../../config/connect.php';
require '../config/expire.php';
$offered = mysqli_query($con, "SELECT * FROM `offer` WHERE `status`='Active' ORDER BY `offer`.`time` DESC");
$email_o = $_SESSION['user_email'];
while ($off = mysqli_fetch_array($offered)) {
  $origin = $off['origin'];
  $dest = $off['destination'];
  $capacity = $off['capacity'];
  $when = $off['time'];
  $time = $off['travel_time'];
  $status = $off['status'];
  $off_id  = $off['offer_id'];
  ?>

  <tr>
    <th scope="row">1</th>
    <td><?=$when?></td>
    <td><?=$origin?></td>
    <td><?=$time?></td>
    <td><?=$dest?></td>
    <td><?=$capacity?></td>
    <td><button type="button" id="book<?=$off_id?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-hand-up"></span> Book The Ride</button></td>
  </tr>

<script>
   $("#book<?=$off_id?>").click(function(){
     var id_o = "<?=$off_id?>";
     var email_o = "<?=$email_o?>";
     var origin_o = "<?=$origin?>";
     var dest_o = "<?=$dest?>";


     $.post("config/book.php",{id:id_o, email:email_o, origin:origin_o, dest:dest_o}, function(data){
        $("#book_status").html(data);
     })
   })
</script>
  <?php
}

 ?>



        </tbody>
      </table>
    </div>

</div>
