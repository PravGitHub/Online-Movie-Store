<?php

	$email = $_POST["email"];
	$con = mysqli_connect("localhost","root","root","moviestore");
	$sql = "SELECT username FROM users where username='".$email."'";

	if($con){
		$result = mysqli_query($con, $sql);			
			if(mysqli_num_rows($result) != 0){					
				echo "0";
			}
			else{
				echo "1";
			}	
	}
	else{
		echo "1";
	}