<div class="container">
<div class="col-md-offset-2 col-sm-8 col-md-8">
  <div class="panel panel-info" style="margin:10% auto; padding:5%;">
   <div class="panel-heading">
     <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Sign Up to Shareride Inc</h3>
   </div>
<br>
<div id="reg_status"></div>
  <form id="reg_frm" action="config/reg.php">
    <div class="form-group">
      <label >First Name</label>
      <input type="text" class="form-control" id="fname" name="firstname" placeholder="firstname">
    </div>

    <div class="form-group">
      <label >Last Name</label>
      <input type="text" class="form-control" id="lname" name="lastname" placeholder="Last Name">
    </div>

    <div class="form-group">
      <label >Identity Number</label>
      <input type="number" class="form-control" id="idno" name="idno" placeholder="Identity Number">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>

    <div class="form-group">
      <label >Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>

    <div class="form-group">
      <label >Password</label>
      <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Comfirm Password">
    </div>

    <button type="submit" class="btn btn-default">Register</button>
    <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Go Home</a>
  </form>
</div>
</div>
</div>

<script>
    $("#reg_frm").submit(function(evt){
         evt.preventDefault();

         var url = $(this).attr('action');
         var postData = $(this).serialize();

         $.post(url, postData, function(responce){
                $("#reg_status").html(responce).show();
                $("#reg_frm")[0].reset();
               })
      })


</script>
