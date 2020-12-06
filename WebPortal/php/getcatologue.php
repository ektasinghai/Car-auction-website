<?php
include("connection.php");
session_start();

//QUERY TO SELECT ALL CARS FROM THE DB
  $sql = "SELECT  CARID, CARNAME, IMAGEPATH FROM cars";
  $result = $conn->query($sql);
  $counter = 0;


echo     "<div class='grid'>";
echo       "<div class='content'>";
  echo       "<ul class='rig columns-4'>";


//LOOP THROUGH THE RESULTS OF QUERY
  while($row = $result->fetch_assoc()){
    $imagepath =  $row['IMAGEPATH'];
    $carname = $row['CARNAME'];
    $carid = $row['CARID'];
//DISPLAY THE CARS TO THE PAGE
echo            "<li>";
echo  "<a href='#'><img class='product-image' src='". $imagepath ."'></a>";
echo                "<h4>$carname</h4>";
          echo      "<hr class ='divider'>";
          echo    "<form action='preview.php?q=$carid' method='post'>";
          echo    "<button name = 'previewBtn' value = 'preview' id = 'previewBtn' type='submit'>Preview</button>";
          echo "</form>";        echo     "</li>";
echo "</li>";


}
echo "</ul>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
