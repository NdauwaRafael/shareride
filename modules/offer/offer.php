<div class="container">


  <div class="row">
    <div class="col-md-4">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation" ><a id="add_offer">Add Offer</a></li>
          <li role="presentation"><a id="view_offer">View offers</a></li>
          <li role="presentation"><a id="view_requests">View Requests</a></li>
        </ul>
    </div>

    <div class="col-md-8" id="offer_column">.col-md-6</div>
  </div>

</div>

<script>
$("#offer_column").load("offer/add.php");
$("#add_offer").click(function(){
  $("#offer_column").load("offer/add.php");
})

$("#view_requests").click(function(){
  $("#offer_column").load("offer/view.php");
})

$("#view_offer").click(function(){
  $("#offer_column").load("offer/offered.php");
})
</script>
