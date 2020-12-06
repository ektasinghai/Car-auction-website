<?php
	include("connection.php");
  $sql = "SELECT CARID, CARNAME, NUMBEROFVOTES, IMAGEPATH, DATEADDED FROM cars ORDER BY NUMBEROFVOTES DESC";
  $result = $conn->query($sql);
  $counter = 1;



echo     "<div class='grid'>";
echo       "<div class='content'>";
  echo       "<ul class='rig columns-4'>";


  while($row = $result->fetch_assoc()){
    $imagepath =  $row['IMAGEPATH'];
    $carname = $row['CARNAME'];
    $carid = $row['CARID'];
    $numberofvotes = $row['NUMBEROFVOTES'];
    $dateAdded = $row['DATEADDED'];

    $now = new \DateTime();



if($dateAdded->diff($now)->weeks >= 1 and $counter <=5) {


switch ($counter) {
    case 1:
        $place = "1st";
        break;
    case 2:
          $place = "2nd";
        break;
    case 3:
          $place = "3rd";
        break;
    case 4:
        $place = "4th";
        break;
    case 5:
      $place = "5th";
      break;
      default:
        break;
}


echo            "<li>";
echo "<div class = 'pageResults'>";


echo   "<p class = 'pageResultsText'>$place</p>";
echo   "<hr class = 'divider'>";
echo "</div>";

echo  "<a href='#'><img class='product-image' src='". $imagepath ."'></a>";
echo                "<h4>$carname</h4>";
          echo      "<hr class ='divider'>";
          echo                "<h4>Votes: $numberofvotes</h4>";
          echo    "<form action='preview.php?q=$carid' method='post'>";
          echo    "<button name = 'previewBtn' value = 'preview' id = 'previewBtn' type='submit'>Preview</button>";
          echo "</form>";        echo     "</li>";
echo "</li>";


$counter++;

} else {

  echo "<h4>Auction has not finished yet</h4>";
}
}

echo "</ul>";
echo "</div>";
echo "</div>";


if($counter == 1) {
  echo"<h4>Auction has not finished yet</h4>";
}
?>
