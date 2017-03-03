<?php

	if(isset($_POST['login'])) {
		$s = mysqli_connect("localhost","root","","chat");
		$username = $_POST['username'];
		$password = $_POST['password'];
		$login_query = "SELECT * FROM users WHERE email = '$username' AND password='$password'";
		$login_run = mysqli_query($s, $login_query);
		$login_details = mysqli_fetch_array($login_run);
		$login_rows = mysqli_num_rows($login_run);
		if($login_rows > 0) {
			echo "successful";
			session_start();
			$_SESSION['usersession'] = $username;
			$login_id = $login_details[0];
			#$status_query = "INSERT INTO status (user_id,user_status) VALUES ('$login_id','Online')"; 
			$status_query = "UPDATE status SET user_status='Online' WHERE user_id='$login_id'";	
			$status_run = mysqli_query($s,$status_query);
			header("location:home.php");
		}
		else {
			echo "USERNAME OR PASSWORD WRONG";
		}
	}

?>