<?php
	session_start();
	if(isset($_SESSION['usersession'])) {
		$s = mysqli_connect("localhost","root","","chat");
		$a = $_SESSION['usersession'];
		$sta_query = "SELECT * FROM users WHERE email = '$a'";
		$sta_run = mysqli_query($s, $sta_query);
		$sta_array = mysqli_fetch_array($sta_run);
		$status_query = "INSERT INTO status (user_id, user_status) VALUES ('$sta_array[0]', 'Online')";
		$status_run  = mysqli_query($s, $status_query);
		include "bg.php";
		 
?>

<?php
	}
	else {
		header("location: index.php");
	}

?>
 
<!--<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
</head>
<body>
	<h1>HOME</h1>
</body>
</html>-->