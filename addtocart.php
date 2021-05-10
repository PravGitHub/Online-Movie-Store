<?php
	session_start();
	$user=$_SESSION["user"];
	$moviename=$_POST["name"];
	$con = mysqli_connect("localhost","root","root","moviestore");
	$sql = "INSERT INTO history VALUES ('".$user."','".$moviename."','1')";

	if($con){
		$result = mysqli_query($con, $sql);	

		if($result){
			echo "1";
		}	
		else{
			echo "0";
		}
	}
	else{
		echo "0";
	}
	
?>