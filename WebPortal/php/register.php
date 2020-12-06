<?php
session_start();
include("connection.php");
if(isset($_SESSION['loggedin'])){
	header('location: catologue.php');
}

$username = "";
$email    = "";
$errors = array();


if (isset($_POST['submit'])) {

	?>

	<script>
	$( '#loginForm' ).css('display', 'block');
	$( '#registerContainer' ).css('display', 'block');

	</script>

	<?php
    $email = mysqli_real_escape_string($conn, $_POST['username']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['passwordConfirm']);
  $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNo']);



    if (count($errors) === 0) {
//QUERY TO INSERT USER CREDENTIALS INTO DB
$stmt = $conn->prepare("INSERT INTO users (EMAIL, USERNAME, PASSWORD, AUTHLEVEL) VALUES (?, ?, ?, ?)");
			$authlevel = 1;
	  		$stmt->bind_param("ssss", $email, $name, $password_1, $authlevel);
	  $stmt->execute();
      session_start();
      $_SESSION["loggedin"] = true;
      $_SESSION["username"] = $email;
			echo "<div id='snackbar'>Registered... Welcome ". htmlentities($username). " Redirecting</div>";
	   echo "<Script> showNotification(); </script>";



$error = '';


if(isset($_SESSION['loginsuccess'])){
  header("location: index.php"); }
    else {
      if (isset($_POST['loginSubmit'])) {#


                if (empty($_POST['loginusername']) || empty($_POST['loginpassword'])) {
          $error = "Username or Password is invalid";
        }

        else{
					$password = mysqli_real_escape_string($conn, $_POST['loginusername']);
					$username = mysqli_real_escape_string($conn, $_POST['loginpassword']);
				//QUERY TO CHECK IF THE ACCOUNT ALREADY EXSISTS
  			$sql = "SELECT EMAIL from users where EMAIL=? AND PASSWORD=? LIMIT 1";

							if($stmt = mysqli_prepare($conn, $sql)){
									// Bind variables to the prepared statement as parameters
									mysqli_stmt_bind_param($stmt, "ss", $username, $password);
}
									// Attempt to execute the prepared statement
									if(mysqli_stmt_execute($stmt)){
										mysqli_stmt_bind_result($stmt, $email);

										mysqli_stmt_store_result($stmt);
									}

										// Check if username exists, if yes then verify password
										if(mysqli_stmt_num_rows($stmt) == 1){




			                            $_SESSION["loggedin"] = true;
			                            $_SESSION["username"] = $username;



																	echo "<div id='snackbar'>Logged in... Welcome ". $_SESSION['username']. " Redirecting</div>";
															 		echo "<Script> showNotification(); </script>";

			                        } else{
			                            // Display an error message if password is not valid
																	array_push($errors, "Username or password incorrect");
																}



}

}
}



?>
