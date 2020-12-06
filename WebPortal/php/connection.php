<?php

  $servername = "katara.scam.keele.ac.uk";
  $username = "w6f60";
  $password = "w6f60w6f60";
  $dbname = "w6f60";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $db = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
  	die("Connection failed: " . mysqli_connect_error());
  }
?>
