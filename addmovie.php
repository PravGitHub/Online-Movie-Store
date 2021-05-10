<?php

	$name = $_POST["name"];
	$genre = $_POST["genre"];
	$description=$_POST["description"];
	$rating = $_POST["rating"];
	$price = $_POST["price"];
	$quantity = $_POST["quantity"];
	$path = $_POST["path"];

	$con = mysqli_connect("localhost","root","root","moviestore");
	$sql = "INSERT INTO movies VALUES ('".$name."','".$genre."','".$description."','".$rating."','".$price."',".$quantity.",'".$path."','0')";

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
			echo "2";
		}	
		mysqli_close($con);

?>



