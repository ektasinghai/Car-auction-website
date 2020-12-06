
<?php
include("connection.php");
session_start();


//QUERY SPECIFIC CAR DETAILS BASED ON THE USER SELECTION(q)
$errors = "";
if  ($_GET["q"]) {

  $carid = $_GET["q"];
  $param =  mysqli_real_escape_string($conn, $carid);
  $sql = "SELECT CARID, CARNAME, CARSTATUS, CARDETAIL, NUMBEROFVOTES, DATEADDED, IMAGEPATH FROM cars WHERE CARID = '$carid'";
  $result = $conn->query($sql);

//LOOP THROUGH RESULTS AND DISPLAY TO WEB PAGE
  while($row = $result->fetch_assoc()){
  $imagepath = $row['IMAGEPATH'];
  $carname = $row['CARNAME'];
  $carstatus = $row['CARSTATUS'];
  $cardetail =$row['CARDETAIL'];
  $dateadded = $row['DATEADDED'];
  $numberofvotes =$row['NUMBEROFVOTES'];



echo  "<div id = 'previewPicture'>";
echo  "<a href='#''><img id = 'previewImage' src='". $imagepath ."'></a>";
echo     "<a href='#'><id = 'previewImage' img src='". $imagepath ."'></a>";
echo  "</div>";
echo  "<div id = 'carDesc'>";
  echo  "<h4>$carname<h4>";
  echo  "<p id = 'desc'>$cardetail</p>";
  echo  "<p id = 'desc'>Status: <span style='font-weight: normal;'>$carstatus</p>";
  echo "<p id = 'desc'>Date Added: <span style='font-weight: normal;''>$dateadded</span></p>";



  echo  "<div id = votes>";
    echo "<p class ='pageResultsText'>Votes: $numberofvotes</p>  ";
    echo "<form action='' method='post'>";
    echo "<button class = 'pageResultsText'name = 'vote' id = 'voteBtn' type='submit'>Vote</button> ";
    echo "</form>";
    echo "<p id = 'errors'>$errors </p>";
  echo "</div>";
echo "</div>";
echo "<div id = 'comment'>";
echo "<form  id = 'comments' action='' method='post'>";
echo "<input type='text' placeholder='Enter comment' name='comment' required>";
echo "<button class='g-recaptcha'
        data-sitekey='reCAPTCHA_site_key'
        data-callback='onSubmit'
        data-action='submit' type='submit' name = 'save'>Add comment</button>";
echo "<p id = 'errors'><span><?php $errors; ?></span> </p>";
echo "</form>";
echo "</div>";



}


//QUERY TO DISPLAY COMMENTS
$sql = "SELECT COMMENT FROM comments WHERE CARID = '" . $carid. "'";
$result = $conn->query($sql);

  echo "<div id = 'commentsDiv'>";
  echo  "<p id = 'desc' class = 'comment' style='font-weight: bold'>Comments:</p>";


while($row = $result->fetch_assoc()){
  $comment = $row['COMMENT'];
  echo  "<p id = 'desc' class = 'comment'>$comment</p>";





}
echo "</div>";
echo "</div>";

echo "</div>";



}

//WHEN THE ADD COMMENT BUTTON IS CLICKED
if (isset($_POST['save'])) {
  if(isset($_SESSION['username'])){

    $content = $_POST["comment"];
$carid = $_GET["q"];

  if (trim(empty($content))) { $errors = "Please add content before posting!"; }

  if ($errors === "") {
//QUERY TO ADD NEW COMMENT TO DB
    $stmt = $conn->prepare("INSERT INTO comments (CARID, COMMENT) VALUES (?, ?)");
        $authlevel = 1;
          $stmt->bind_param("ss", $carid, $content);
      $stmt->execute();
    header("Refresh:0");



} else {
  echo "<div id='snackbar'>Please login before voting!</div>";
  echo "<Script> showNotification2(); </script>";
}
}
}



//WHEN THE VOTE BUTTON IS CLICKED
if (isset($_POST['vote'])) {
  if(isset($_SESSION['username'])){

//QUERY TO UPDAE THE NUMBEROFVOTES
$sql = "SELECT CARID from votes where USERID=? AND CARID=? LIMIT 1";

      if($stmt = mysqli_prepare($conn, $sql)){

            $email =  $_SESSION["username"];
            $email =  mysqli_real_escape_string($conn, $email);

          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "ss", $email, $carid);
}
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_bind_result($stmt, $email);

            mysqli_stmt_store_result($stmt);
          }

            if(mysqli_stmt_num_rows($stmt) < 1){

  $carid = $_GET["q"];
  $param =  mysqli_real_escape_string($conn, $carid);
  $sql = "SELECT NUMBEROFVOTES FROM cars WHERE CARID = '" . $param. "'";
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc()){

  $numberofvotes =$row['NUMBEROFVOTES'];


}

$numberofvotes++;
//INCREMENT NUMBER OF VOTES AND UPDATE THE SPECIFIC RECORD IN DB
$stmt = $conn->prepare("UPDATE cars SET NUMBEROFVOTES=? WHERE CARID=?");
    $authlevel = 1;
      $stmt->bind_param("ss", $numberofvotes, $carid);
  $stmt->execute();


//ADD RECORD THAT USER HAS VOTED FOR CAR TO PREVENT DUPLICATE VOTING
  $stmt = $conn->prepare("INSERT INTO votes (USERID, CARID) VALUES (?, ?)");
    $email =  $_SESSION["username"];
                $email =  mysqli_real_escape_string($conn, $email);


    $carid = $_GET["q"];
    $carid =  mysqli_real_escape_string($conn, $carid);
        $stmt->bind_param("ss", $email, $carid);
    $stmt->execute();



}else {

  echo "<div id='snackbar'>You have already voted!</div>";
  echo "<Script> showNotification2(); </script>";
  ?>

 </script>

<?php
}

} else {
  echo "<div id='snackbar'>Please login before voting!</div>";
  echo "<Script> showNotification2(); </script>";

}
}
?>
