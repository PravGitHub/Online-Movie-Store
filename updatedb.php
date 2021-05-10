<?php
	 $moviename=str_replace("'", "", $_GET['moviename']);
	 $name=$_GET['name'];
	 $genre=$_GET['genre'];
	 $description=$_GET['description'];
	 $rating=$_GET['rating'];
	 $price=$_GET['price'];
	 $quantity=$_GET['quantity'];
	 $path=$_GET['path'];

	 $con = mysqli_connect("localhost","root","root","moviestore");
	 $sql = "UPDATE movies SET name='".$name."',genre='".$genre."',description='".$description."',rating='".$rating."',price='".$price."', quantity=".$quantity.", path='".$path."' WHERE name='".$moviename."'";
	 error_log($sql);
	 if($con){
		$result = mysqli_query($con, $sql);
		if($result){
			error_log("inside if");
			header("Location: http://localhost/moviestore/homepage.html");			
			die();
		}
		else{
			error_log("inside else1");
			header("Location: http://localhost/moviestore/update.php?moviename='".$moviename."'");			
			die();
		}
	}
	else{
			error_log("inside else2");
			header("Location: http://localhost/moviestore/update.php?moviename='".$moviename."'");			
			die();
		}
?>