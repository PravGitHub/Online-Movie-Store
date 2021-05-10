<?php

	$name=$_POST["name"];

	$con = mysqli_connect("localhost","root","root","moviestore");
	$sql = "UPDATE movies SET del='1' WHERE name='".$name."'";

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
	mysqli_close($con);

?>