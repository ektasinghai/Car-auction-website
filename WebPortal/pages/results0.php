!DOCTYPE html>
<html>
<head>
<title>Auction Results</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/WebPortal/style/results.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="/WebPortal/scripts/JS.js"></script>
</head>
<body>

<div class="topnav" id="myTopnav">
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
  <h2 id ="pageTitle">Car Auction Results</h2>
  <p id = "pageDesc">Vote results from the <span style="color:#03b1fc; font-weight: bold;">01/04/2020</span> auction</p>

</div>

<div id ="pageContents">
  <div class = "results">
    <?php

     include('getresults.php') ; ?>

  </div>

</div>

</div>

</body>
