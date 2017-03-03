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
			 
			width: 93%;
			background-color: blue;
			margin: 0 auto;
			overflow: hidden;
		}
		.body {
			overflow: hidden;
			margin: 2% 0% 0% 25%;
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
			 
			margin-left: 87%;
		}
		.online {
			width: 10px;
			height: 10px;
			border-radius: 50%;
			background-color: green;
			margin-left: 40%;
			margin-top: -19%;
		}
		 .lay2,.lay3 {
			float: left;
		 	 
		}
	 
		.lay2 {
			width: 45%;
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
		.lay3 {
			width: 19%;
			height: 100%;
			border: 1px solid black;
			margin-left: 1%;
		}
		.chat_online {
			padding: 1%;
			border-bottom: 1px solid grey;
		}
		 	
		.online1 {
			width: 10px;
			height: 10px;
			border-radius: 50%;
			background-color: green;
			margin-top: 7%;
		}
		.a {
			overflow: hidden;
		}
		.msg_a{
			position:relative;
			background:#FDE4CE;
			padding:10px;
			min-height:10px;
			margin-bottom:5px;
			margin-right:10px;
			border-radius:5px;
		}
		.msg_a:before{
			content:"";
			position:absolute;
			width:0px;
			height:0px;
			border: 10px solid;
			border-color: transparent #FDE4CE transparent transparent;
			left:-10px;
			top:7px;
		}

		 table {

		 }
		.user_name {
			width: 100%;
		}

	</style>
</head>
<body>
	<div class="header">
		<div class="a1"><h3 style="color:white;">CHAT APP</h3></div>	
		<!--<div class="a2"><p><a href='#' style="color:white;">Messages</a></p></div>-->
		<div class="a3">
		<?php
			if(isset($_SESSION['usersession'])) {
				$u = $_SESSION['usersession'];
				$s = mysqli_connect("localhost","root","","chat");
				$user_name = "SELECT * FROM users WHERE email = '$u'";
				$user_name_query = mysqli_query($s,$user_name);
				$user_name_a = mysqli_fetch_array($user_name_query);
				echo "<p style='color:white;'>$user_name_a[1]<div class='online'></div></p><form method='POST'><input type='submit' value='Logout' name='logout' style='cursor:pointer;'></form>";
				logout();
			}
			else {
				echo "<input type='submit' value='Login' name='loout'>";
			}
		?>
		 </div>

	</div>
	<div class="body">
		 
		<div class="lay2">
			<?php

				getmessages();
				remove();
				

				 
			?>
			<form method="POST" class="message_submit">
				<input type="text" name="mess" required>
				<input type="submit" name="submit" value="Send" class="send">
			</form>
		</div>
		<div class="lay3">
			<?php

				get_friends_online();

			?>
		</div>
	</div>

</body>
</html>