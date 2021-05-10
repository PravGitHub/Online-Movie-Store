<?php 

	session_start();
	$user=$_SESSION["user"];
	error_log($user);
	$con = mysqli_connect("localhost","root","root","moviestore");
	$sql = "SELECT * FROM history as h, movies as m WHERE h.username='".$user."' AND h.borc='1' AND m.name=h.name AND m.quantity>0 AND m.del='0' ";
	error_log($sql);
	$res=[];
	if($con){
		$result = mysqli_query($con, $sql);		
		error_log($result);	
		while($row = $result->fetch_assoc()){
			$resultRow['name']=$row['name'];						
			$resultRow['price']=$row['price'];
			$resultRow['path']=$row['path'];								
			$resultRow['user']=$user;				
			$res[]=$resultRow;
						
		}
	}
	echo json_encode($res);
	mysqli_close($con);

 ?>