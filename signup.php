<?php
	$email = $_POST["email"];
	$psswd = $_POST["psswd"];
	$psswd2 = $_POST["psswd2"];

	if($psswd==$psswd2){
		$hashed = hash('sha1', $psswd);

		$con = mysqli_connect("localhost","root","root","moviestore");
		$sql = "INSERT INTO users VALUES ('".$email."','".$hashed."')";
		
		if($con){
			$result = mysqli_query($con, $sql);			
			if($result){	
				// header("Location: http://localhost/moviestore/index.html");
				// die();
				echo "1";
			}	

		}
		else{
			// header("Location: http://localhost/moviestore/signup.html");
			// die();
			echo "0";
		}
	}
	else{
			// header("Location: http://localhost/moviestore/signup.html");
			// die();
		echo "1";
		}
		mysqli_close($con);
	
	
?>