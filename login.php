<?php
	session_start();
	ini_set('session.use_strict_mode', 1);
	$email = $_POST["email"];
	$psswd = $_POST["psswd"];

	$hashed = hash('sha1', $psswd);

	$con = mysqli_connect("localhost","root","root","moviestore");
	$sql = "SELECT * FROM users WHERE username='".$email."' AND password='".$hashed."'";
	echo $sql;
	$newURL = "http://localhost/moviestore/homepage.html";
	if($con){
		$result = mysqli_query($con, $sql);
		if($result){
			$_SESSION["user"]=$email;
			echo "<script>console.log('user: " . $email . "' );</script>";					
			header('Location: '.$newURL);			
			die();
		}
		else{
			session_unset();
			session_destroy();
		}
		
	}
	else{
			session_unset();
			session_destroy();
		}

		mysqli_close($con);

	
?>