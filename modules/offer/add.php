<form id="offer_ride_frm" action="config/offer_ride.php">
  <div id="offer_status"></div>
  <div class="form-group">
    <label >Origin</label>
    <input type="text" class="form-control" id="origin"  name="origin" placeholder="Origin">
  </div>

  <div class="form-group">
    <label >Destination</label>
    <input type="text" class="form-control" id="destination" name="destination" placeholder="Destination">
  </div>

  <div class="form-group">
    <label >Travel Time</label>
    <input type="time" class="form-control" id="capacity" name="travel_time" >
  </div>

  <div class="form-group">
    <label >Vehicle Capacity</label>
    <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Vehicle Capacity">
  </div>


  <button type="submit" class="btn btn-default">Offer Now!!</button>
</form>

<script type="text/javascript">

$(function() {

  $("#offer_ride_frm").submit(function(evt){
     evt.preventDefault();

     var url = $(this).attr('action');
     var postData = $(this).serialize();

    $("#offer_status").html('');
     $.post(url, postData, function(responce){
        $("#offer_status").html(responce);
        $("#offer_ride_frm")[0].reset();
     })


  })
})
</script>
