<?php
	
	$moviename=$_GET['moviename'];
	$con = mysqli_connect("localhost","root","root","moviestore");
	$sql = "SELECT * FROM movies WHERE name=".$moviename;
	error_log($sql);
	$resultRow=[];
	if($con){
		$result = mysqli_query($con, $sql);
		$row = $result->fetch_assoc();
				
	}


	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	 <link rel="stylesheet" href="css/bootstrap.min.css" />        
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" href="css/gallery.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<form style="margin:50px" action="updatedb.php" method="get">
	<div class="form-group container">
		<label>Name</label> <input type="text" class="form-control" name="name" id="name"><br>
		<label>Genre</label>
		
		<select name="genre" id="genre" class="form-control">			
		  <option value="Comedy">Comedy</option>
		  <option value="Action">Action</option>
		  <option value="Fiction">Fiction</option>
		  <option value="Drama">Drama</option>			
		</select>
		<br>
		<label>Description</label><input type="text" class="form-control" name="description" id="description"><br>
		<label>Rating</label><input type="text" class="form-control" name="rating" id="rating">	<br>
		<label>Price</label><input type="text" class="form-control" name="price" id="price">	<br>
		<label>Quantity</label><input type="text" class="form-control" name="quantity" id="quantity">	<br>
		<label>Image</label><input type="text" class="form-control" name="path" id="path"><br>
		<input type="text" id="moviename" name ="moviename" value="<?php echo $moviename?>">
		<button class="btn btn-primary" id="add">Submit</button>
	</div>
	
</form>
 <script type="text/javascript">
	$(document).ready(function(){
	$("#moviename").hide();
	$("#description").val("<?php echo $row['description']?>");
	$("#name").val("<?php echo $row['name']?>");
	$('#genre').val("<?php echo $row['genre']?>");
	$('#rating').val("<?php echo $row['rating']?>");
	$('#price').val("<?php echo $row['price']?>");
	$('#quantity').val("<?php echo $row['quantity']?>");
	$('#path').val("<?php echo $row['path']?>");

	// $('#add').click(function(){
	// 	var name = $('#name').val();
	// 	var description = $('#description').val();
	// 	var genre = $('#genre').val();
	// 	var rating = $('#rating').val();
	// 	var price = $('#price').val();
	// 	var quantity = $('#quantity').val();
	// 	var path = $('#path').val();

	// 	 //$.post("updatedb.php",{moviename:"<?php echo $moviename?>"});//, function(response){
	// 	// 	if(response=="1"){
	// 	// 		console.log("response"+response);
	// 	// 		window.location.replace("http://localhost/moviestore/index.html");
	// 	// 	}
	// 	// 	else if(response=="0"){
	// 	// 		window.location.replace("http://localhost/moviestore/signup.html");
	// 	// 	}
			
	// 	// });
	// });

});
</script> 
</body>
</html>