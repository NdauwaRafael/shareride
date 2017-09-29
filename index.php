<?php
require 'config/connect.php';
@require 'config/user.php';
if (user_loggedin()) {
  header("location: modules/home.php");
}


require 'inc/header.php';

 ?>

 <div class="row home-bg" >
<div class="container">
<div class="row">
  <div class="col-md-offset-3 col-sm-6 col-md-6">
   <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Login to Shareride Inc</h3>
    </div>
      <div class="panel-body">
        <form id="login_frm" action="config/login.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="lgn_email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="lgn_password" placeholder="Password">
          </div>
             <div id="status"></div>
              <button type="submit" id="login_btn" class="btn btn-success">Sign In</button>
              <a id="reg" class="btn btn-danger">Sign Up</a>
        </form>
      </div>
  </div>
    </div>
  </div>


</div>
</div>

<script type="text/javascript">

$(function() {
$("#reg").click(function(){
  $(".home-bg").load("user/register.php");
})

  $("#login_frm").submit(function(evt){
     evt.preventDefault();

     var url = $(this).attr('action');
     var postData = $(this).serialize();

    $("#status").html('');
     $.post(url, postData, function(responce){
           if (responce=="success") {
              window.location.href="modules/home.php";
           }else{
              $("#status").html(responce).css("color","red");
           }
     })


  })
})
</script>
