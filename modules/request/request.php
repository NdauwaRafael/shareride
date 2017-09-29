<div class="container">


  <div class="row">
    <div class="col-md-4">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation" ><a id="av_rides">Available Rides</a></li>
          <li role="presentation"><a id="view_booked">Booked</a></li>
        </ul>
    </div>

    <div class="col-md-8" id="request_column">.col-md-6</div>
  </div>

</div>

<script>
$("#request_column").load("request/available.php");
$("#av_rides").click(function(){
  $("#request_column").load("request/available.php");
})

$("#view_booked").click(function(){
  $("#request_column").load("request/booked.php");
})
</script>
