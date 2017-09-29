<?php
require '../config/connect.php';
@require '../config/user.php';
if (!user_loggedin()) {
  header("location: ../index.php");
}

require 'inc/header.php';
 ?>

 <nav class="navbar navbar-default">
   <div class="container">
  <div class="container-fluid">
    <div class="navbar-header">
      <ul class=" navbar-nav navbar-left>">
      <button type="button" id="request" class="btn btn-default navbar-btn">Request Ride</button>
      <button type="button" id="offer" class="btn btn-default navbar-btn">Offer Ride</button>
    </ul>
      <ul class="navbar-nav navbar-right">
        <div id="time"></div>
      </ul>
    </div>
  </div>
</div>
</nav>

<div id="my_space">
   <div class="front_ban">
      <img src="../assets/images/78.jpg" width="100%">
   </div>
</div>

<script>
 $("#request").click(function(){
   $("#my_space").load("request/request.php");
 })

 $("#offer").click(function(){
   $("#my_space").load("offer/offer.php");
 })

 $(function(){
 var interval = setInterval(function() {
   var momentNow = moment();
   $("#time").html('<strong style="color:red !important">Today:</strong> '+momentNow.format('H:mm:ss ')).css('color','green').css('font-size','24px');
 }, 100)
 })
 </script>
