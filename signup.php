<?php

	if(isset($_POST['signup'])) {
		$s = mysqli_connect("localhost","root","","chat");
		$email  = $_POST['email'];
		$email_query = "SELECT * FROM users WHERE email = '$email'";
		$email_run = mysqli_query($s,$email_query);
		$count1 = mysqli_num_rows($email_run);
		if($count1>0) {
			echo "<script>alert('email already exists');</script>";
		}
		else {
			$username = $_POST['username'];	
			$password = $_POST['password'];
			$image = $_FILES['file']['name'];
			$image_temp_name = $_FILES['file']['tmp_name'];
			move_uploaded_file($image_temp_name, "uploads/$image");
			/*$login_query = "SELECT * FROM users WHERE email = '$username' AND password='$password'";
			$login_run = mysqli_query($s, $login_query);
			$login_details = mysqli_fetch_array($login_run);
			$login_id = $login_details[0];
			$status_query = "INSERT INTO status (user_id,user_status) VALUES ('$login_id','Online')"; 
			$status_run = mysqli_query($s, $status_query);*/
			$sign_query = "INSERT INTO users (user_name,email,password,user_img) VALUES ('$username','$email','$password','$image')";
			$sign_run = mysqli_query($s,$sign_query);
			if($sign_run>0) {
				session_start();
				$_SESSION['usersession'] = $email;
				echo "<script><alert('REGISTERED SUCCESSFULLY');</script)";
				header("location:home.php");
			}		
		}
	}

?>