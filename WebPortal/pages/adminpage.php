<!DOCTYPE html>
<html>
<head>
<title>Admin Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/WebPortal/style/admin.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="/WebPortal/scripts/JS.js"></script>
</head>
<body>

<div class="topnav" id="myTopnav">
    <a href="logout.php">Logout</a>
  <a href="login.php">Login/Register</a>
  <a href="about.php">About</a>
  <a href="results.php">Auction Results</a>
  <a href="catologue.php" class="active">Catologue</a>
  <a id = "siteName" href="catologue.php">Car Auction Web Portal</a>



  <a href="javascript:void(0);" class="icon" onclick="responsiveNav()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div id = "container">

<div id= "pageHeader">
  <h2 id ="pageTitle">Add, Delete or Set auction</h2>
  <p id = "pageDesc">Add cars to auction below:</p>
</div>
<hr class = "divider">

<div id= "loginForm">
    <form class="modal-content animate" action="" method="post" enctype="multipart/form-data">
      <div class="container">
        <form action='' method='post'>";
        <label for="carName"><b>Car Name</b></label>
        <input type="text" placeholder="Enter Car Name" name="CarName" required>
        <label for="carDesc"><b>Car Description:</b></label>
        <input type="text" placeholder="Enter Car Description" name="carDesc" required>
        <label for="carStatus"><b>Car Status:</b></label>
        <input type="text" placeholder="Enter Car Status" name="carStatus" required>
        <label for="file"><b>Car Image:</b></label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <button name = "addCar" type="submit">Add Car</button>
      </form>
        </div>
      </div>

    <h2 id ="pageTitle">Delete a car</h2>
    <p id = "pageDesc">Remove a car from the catologue and results page:</p>
      <hr class = "divider">
    <div id = "scroll">




<?php include('php/admin.php') ; ?>



</div>
</body>
