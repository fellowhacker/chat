<?php

	include "functions.php";

?> 
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<style>
		body {
			width: 90%;
			margin: 0 auto;
		}
		.header {
			height: 80px;
			width: 93%;
			background-color: blue;
			margin: 0 auto;
			overflow: hidden;
		}
		.body {
			overflow: hidden;
			margin-top: 12%;
		}
		.a1,.a2 {
			float: left;
		}
		.a2 a {
			text-decoration: none;
			margin-left: 52%;
			text-align: center;
		}
		.a3 {
			 
			margin-left: 90%;
		}
		.lay1,.lay2,.lay3 {
			float: left;
		 	 
		}
		.lay1 {
			width: 20%;
		}
		.lay1 li {
			list-style-type: none;
		}
		.lay1 li a {
			text-decoration: none;
			color: black;
			font-size: 104%;
			font-weight: bold;
		}
		.lay2 {
			width: 55%;
			border:  2px solid black;
			overflow: hidden;
			overflow-y: auto;
			height: 300px;
		}
		.message_submit {
			position: absoute;
			bottom: 0%;
		}
		.del_mess {
			max-width: auto;
			/*border-radius: 0 100% 100% 0 ;
			padding-right: 0%;*/
			overflow: hidden;
			height: auto;
			word-wrap: break-word;
		}
		.delete_c {
			text-decoration:none;
			color:red; 
			font-size:140%;
			margin-left: 2%;
		}
		.chat_img {
			border: 10px solid red;
			border-radius: 100%;
			width: 20px;
			height: 20px;
		}
		.send {
			border: none;
			padding: 2%;
			cursor: pointer;
		}

	</style>
</head>
<body>
	<div class="header">
		<div class="a1"><h3 style="color:white;">CHAT APP</h3></div>	
		<div class="a2"><p><a href="messages.php" style="color:white;">Messages</a></p></div>
		<div class="a3">
		<?php
			if(isset($_SESSION['usersession'])) {
				$u = $_SESSION['usersession'];
				$s = mysqli_connect("localhost","root","","chat");
				$user_name = "SELECT * FROM users WHERE email = '$u'";
				$user_name_query = mysqli_query($s,$user_name);
				$user_name_a = mysqli_fetch_array($user_name_query);
				echo "<p style='color:white;'>$user_name_a[1]</p><form method='POST'><input type='submit' value='Logout' name='logout' style='cursor:pointer;'></form>";
				logout();
			}
			else {
				echo "<input type='submit' value='Login' name='loout'>";
			}
		?>
		 </div>

	</div>
	<div class="body">
		 
	</div>
</body>
</html>