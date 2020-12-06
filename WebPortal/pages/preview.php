<!DOCTYPE html>
<html>
<head>
<title>Car Preview</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/WebPortal/style/preview.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="/WebPortal/scripts/JS.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>

 <script>
   function onSubmit(token) {
     document.getElementById("comments").submit();
   }
 </script>
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
  <h2 id ="pageTitle">Car Title</h2>
  <p id = "pageDesc">Vote or comment below:</p>

</div>
<hr class="divider">

<?php include('../php/getPreview.php') ; ?>

  <span><?php $errors; ?></span>



</div>
</body>
