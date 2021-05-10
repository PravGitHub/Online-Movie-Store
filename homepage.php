<?php
session_start();
$user = $_SESSION["user"];
$con=mysqli_connect("localhost","root","root","moviestore");
$sql="";
if($user=="admin@email.com"){
	$sql="SELECT * FROM movies WHERE del='0'";
}
else{
	$sql="SELECT * FROM movies WHERE del='0' AND quantity>0 AND name NOT IN (SELECT name FROM history WHERE username='".$user."') ";	
}


$res = [];
if($con){
	
	$result = mysqli_query($con, $sql);

	while ($row = $result->fetch_assoc()) {
		$resultRow['name']=$row['name'];
		$resultRow['genre']=$row['genre'];
		$resultRow['description']=$row['description'];				
		$resultRow['price']=$row['price'];
		$resultRow['path']=$row['path'];
		$resultRow['quantity']=$row['quantity'];
		$resultRow['rating']=$row['rating'];				
		$resultRow['user']=$user;				
		$res[]=$resultRow;
						
	}

		
}
	echo json_encode($res);
	mysqli_close($con);


?>