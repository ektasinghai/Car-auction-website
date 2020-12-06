<?php
session_start();
include("connection.php");
$authlevel = 10;
$email = $_SESSION["username"];
//Query to check if user has admin level authentication
$sql = "SELECT EMAIL from users where EMAIL=? AND AUTHLEVEL=? LIMIT 1";

		if($stmt = mysqli_prepare($conn, $sql)){
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "ss", $email, $authlevel);
}
				// Attempt to execute the prepared statement
				if(mysqli_stmt_execute($stmt)){
					mysqli_stmt_bind_result($stmt, $email);

					mysqli_stmt_store_result($stmt);
				}

					if(mysqli_stmt_num_rows($stmt) == 1){


$errors = [];

//POST ADD CAR BUTTON
if (isset($_POST['addCar'])) {


  $carname = mysqli_real_escape_string($conn, $_POST['CarName']);
  $carStatus = mysqli_real_escape_string($conn, $_POST['carStatus']);
  $cardesc = mysqli_real_escape_string($conn, $_POST['carDesc']);




    if (count($errors) === 0) {
//PREPARED QUERY TO INSERT NEW CAR INTO DB
$stmt = $conn->prepare("INSERT INTO cars (CARNAME, CARSTATUS, CARDETAIL, IMAGEPATH, DATEADDED) VALUES (?, ?, ?, ?, ?)");
			$authlevel = 1;


			$target_dir = "/WebPortal/img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imagepath = $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

$dateadded = date("Y-m-d") . " " . date("h:i:sa");
	  		$stmt->bind_param("sssss", $carname, $carStatus, $cardesc, $imagepath, $dateadded);
	  $stmt->execute();
  }
}




  $sql = "SELECT  CARID, CARNAME, IMAGEPATH FROM cars";
  $result = $conn->query($sql);
  $counter = 0;

  while($row = $result->fetch_assoc()){
    $carname = $row['CARNAME'];
    $carid = $row['CARID'];
    echo "<div class = 'cars'>";

echo "<form action='' method='post'>";
  echo   "<button name = '$carid' type = 'submit' id ='$carid' value ='$carid' onclick=document.getElementById('$carid').style.display='none'; document.getElementById('close').style.display='none'; style='font-size: 2vh'; style='margin-right: 8px'; style='padding:auto'; class='close' title='delete'>$carname &times;</span>";
		echo "</form>";
	echo "</div>";

}

echo "</div>";
echo "<div id = 'setTime'>";
echo  "<h2 id ='pageTitle'></h2>";
echo   "<p id = 'pageDesc'>Remove a car from the catologue and results page:</p>";
echo "</div>";
  echo  "</div>";
	  echo  "</div>";


  if (isset($_POST)) {
		$carid =$_POST;
	//	echo $_POST['q'];
		$carid = implode($carid);



  $stmt = $conn->prepare("DELETE FROM cars where CARID=?");
  			$authlevel = 1;
  	  		$stmt->bind_param("s", $carid);
  	 $stmt->execute();





  }
} else {
		header('location: catologue.php');
}
?>
