<?php

	include "signup.php";
	include "login.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>CHAT </title>

	 <style>
	 	body {
	 		width: 80%;
	 		margin: 0 auto;
	 	}
	 	.total {
	 		width: 80%;
	 		margin: 0 auto;
	 		overflow: hidden;
	 	}
	 	.login, .signup {
	 		float: left;
	 		width: 48%;
	 	}
	 	.loginbut {
	 		border: none;
	 		padding: 2%; 
	 		background-color: blue; 
	 		color:white;
	 		border-radius: 4px;
	 		cursor: pointer;
	 	}
	 	.form {
	 		margin-left: 25%;
	 	}
	 	.input {
	 		border:none; 
	 		margin-bottom: 9%; 
	 		padding: 3%;
	 	}
	 </style>
</head>
<body>
	<h1 style="color:blue; text-align:center;">CHAT APPLICATION</h1><hr>
	<div class="total">
	<div class="login" name="login">
		<h1 style="text-align:center; color:blue;">LOGIN</h1>
		<form method="POST" class="form" enctype="multipart/form-data">
			Email:<br>
			<input type="email" name="username" style="border:1px solid grey; margin-bottom: 9%; padding: 3%;border-radius: 3px;"><br> 
			Password:<br>
			<input type="password" name="password" style="border:1px solid grey;margin-bottom: 9%; padding: 3%;border-radius: 3px;"><br>
			<input type="submit" name="login" value="Login" class="loginbut">
		</form>
	</div>
	<div class="signup" name="sign up">
		<h1 style="text-align: center;color:blue;">SIGN UP</h1>
		<form method="POST" class="form" enctype="multipart/form-data">
			UserName:<br>
			<input type="text" name="username" style="border:1px solid grey; margin-bottom: 4%; padding: 2%; border-radius: 3px;" required><br>
			Password:<br>
			<input type="password" name="password" style="border:1px solid grey; margin-bottom: 4%; padding: 2%;border-radius: 3px;" required><br>
			Email:<br>
			<input type="email" name="email" style="border:1px solid grey; margin-bottom: 4%; padding: 2%;border-radius: 3px;" required><br>
			Upload your pic here:<br>
			<input type="file" name="file">
			<input type="submit" name="signup" class="loginbut" value="Signup">
		</form>
	</div>
	</div>
</body>
</html>