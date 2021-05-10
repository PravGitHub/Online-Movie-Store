<?php

	session_start();
	$user=$_SESSION["user"];
	$moviename=$_POST["name"];
	$con = mysqli_connect("localhost","root","root","moviestore");
	$sql = "UPDATE history SET borc='0' WHERE username='".$user."' AND name='".$moviename."'";
	$sql2="UPDATE movies SET quantity=quantity-1 WHERE name='".$moviename."'";
	error_log($sql);
	if($con){
		$result = mysqli_query($con, $sql);
		$result2 = mysqli_query($con, $sql2);
		error_log($result);
		error_log($result2);
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