<?php

		function getmessages() {
		 
		if(isset($_POST['submit'])) {
			$s = mysqli_connect("localhost","root","","chat");
			$a = $_SESSION['usersession'];
			$mess = $_POST['mess'];
			$sel_name = "SELECT * FROM users WHERE email = '$a' ";
			$sel_query = mysqli_query($s,$sel_name);
			$sel_run = mysqli_fetch_array($sel_query);
			$sel_user_id = $sel_run[0];	
			$sel_user_name = $sel_run[1];
			#$sel_image = $sel_run[3];	
			$ins_query = "INSERT INTO chatbox(user_id,message) VALUES ('$sel_user_id','$mess')";
			$ins_run = mysqli_query($s,$ins_query);
			$sel = "SELECT * FROM chatbox ORDER BY `message_id` ASC";
			$dis_query = mysqli_query($s,$sel);
			$c=0;
			while($run = mysqli_fetch_array($dis_query)) {
				$c += 1;
				#if($c<7){
				$user_id1 = $run[1];
				$sele = "SELECT * FROM users WHERE user_id = '$user_id1'";
				$sele_query = mysqli_query($s,$sele);
				$sele_run = mysqli_fetch_array($sele_query);
				echo " <div class='msg_a'><img src='uploads/$sele_run[3]' width='20px' height='20px' class='cht_img'><span style='color:blue'><b> $sele_run[1]</b></span><a href='home.php?del_mess_id=$run[0]' class='delete_c'>&times; </a><br> <p>$run[2]</p></div><hr>";
			#}
		}
	}
		else {
			$s = mysqli_connect("localhost","root","","chat");
			$sel = "SELECT * FROM chatbox ORDER BY `message_id` ASC";
			$dis_query = mysqli_query($s,$sel);
			$c=0;
			while($run = mysqli_fetch_array($dis_query)) {
				$c += 1;
				#if($c<7){
				$user_id1 = $run[1];
				$sele = "SELECT * FROM users WHERE user_id = '$user_id1'";
				$sele_query = mysqli_query($s,$sele);
				$sele_run = mysqli_fetch_array($sele_query);
				echo " <div class='msg_a'><img src='uploads/$sele_run[3]' width='20px' height='20px'> <span style='color:blue'><b>$sele_run[1]</b></span><a href='home.php?del_mess_id=$run[0]' class='delete_c'>&times; </a><br><p> $run[2]</p></div><hr>";
				#echo "<div class='del_mess'> <a href='home.php?del_mess_id=$run[0]' style='text-decoration:none;color:red;'>&times; </a> </div><hr><br>";
				 
		#}
	}
}
}
	function logout() {
		if(isset($_POST['logout'])) { 	
			session_start();
			$a = $_SESSION['usersession'];
			$s = mysqli_connect("localhost","root","","chat");
			$sel_name = "SELECT * FROM users WHERE email = '$a' ";
			$sel_query = mysqli_query($s,$sel_name);
			$sel_run = mysqli_fetch_array($sel_query);
			$sel_user_id = $sel_run[0];	
			mysqli_query($s,"UPDATE status SET user_status='Offline' WHERE user_id='$sel_user_id'");
			#session_unset();
			#session_destroy();
			unset($_SESSION['usersession']);
			#session_destroy();
			header("location:index.php");
}

}

 	function remove() {
 		if(isset($_GET['del_mess_id'])) {

 			$s = mysqli_connect("localhost","root","","chat");
 			$mess_d = $_GET['del_mess_id'];
 			$sel_de = "SELECT user_id FROM chatbox WHERE message_id='$mess_d'";
 			$sel_del_query = mysqli_query($s,$sel_de);
 			$sel_del_arr = mysqli_fetch_array($sel_del_query);
 			$dele = "DELETE FROM chatbox WHERE message_id = '$mess_d' AND user_id = '$sel_del_arr[0]'";
 			$mess_d = $mess_d =1;
 			$dec_id = "UPDATE chatbox SET message_id = message_id - 1 WHERE message_id > '$mess_id'";
 			$dele_query = mysqli_query($s,$dele);
 			$del_id_query = mysqli_query($s, $dec_id);			
 			header("location:home.php");	 

 		}
 		else {

 		}
 		
 		}
	 

  	function get_friends_online() {

			$s = mysqli_connect("localhost","root","","chat");
			$a = $_SESSION['usersession'];
			/*$get_query = "SELECT * FROM users WHERE email = '$a'";
			$get_run = mysqli_query($s, $get_query);
			$get_array = mysqli_fetch_array($get_run);
			$get_user_id = $get_array[0];*/
			$get_user_query = "SELECT * FROM status";
			$get_user_run = mysqli_query($s, $get_user_query);
			while($users = mysqli_fetch_array($get_user_run)) {

				$get_name_query = "SELECT * FROM users WHERE user_id = '$users[0]' ";
				$get_name_run = mysqli_query($s, $get_name_query);
				$get_name = mysqli_fetch_array($get_name_run);


				 if($users[1] == 'Online') {

				 	echo "  <table><tr><td><img src='uploads/$get_name[3]' width='40px' height='40px'> </td><td class='user_name'> $get_name[1] </td>
				 					<td class='online1' style='float:right;'> </td></tr>

				 			</table><hr>";

				 }
				 else {

				  	echo " <div><img src='uploads/$get_name[3]' width='40px' height='40px'>  $get_name[1]  </div><hr>";

				}

			}

  	}

?>