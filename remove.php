<?php

	session_start();
	$user=$_SESSION["user"];
	$moviename=$_POST["name"];
	$con = mysqli_connect("localhost","root","root","moviestore");
	$sql = "DELETE FROM history WHERE username='".$user."' AND name='".$moviename."'";
	
	error_log($sql);
	if($con){
		$result = mysqli_query($con, $sql);		
		error_log($result);
		
		if($result){
			echo "1";
		}
		else{
			echo "0";
		}

	}
	else{
		echo "2";
	}


?>