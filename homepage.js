$(document).ready(function(){
	
	$.ajax(
	{
		 url: "homepage.php",
		 dataType: "json",

		 success: function(data) {		 		
		       var user="";
		        $("#searchdisp").hide();

		        $.each(data, function(index, element) {
		        	var append1="<div class='preview item'><p align='center' style='color:blue;'>"+element.name+"</p>";
		        	var append2="<img class='imgitem' src=images/movies/"+element.path+" alt='"+element.name+"'><br>";
		        	var append0="";
		        	var append3="";
		        	var append4="";

		        	$user=element.user;
		        	if(element.user=="admin@email.com"){
		        		append3="<button class='btn btn-info update' alt='"+element.name+"'>Update</button>";
		        		append4="<button class='btn btn-danger delete' style='margin-left:5px' alt='"+element.name+"'>Delete</button></div>";
		        		$("#disp").append(append1+append2+append0+append3+append4); 
		        		
		        		
		        	}
		        	else{
		        		append3="<button align='center' class='btn btn-primary addtocart' alt='"+element.name+"'>Add to cart</button></div>";
		        		$("#disp").append(append1+append2+append0+append3); 

		        	}		        	
                   	
        	});
		        if($user=="admin@email.com"){
		        	$("#shop").hide();	
		        	$("#history").hide();	        	
		        	$("#menu").append("<a href='addmovie.html' class='btn btn-warning' style='margin-top:30px' id='addmovie'>Add movie</a>");

		        }
		        else{
		        	$("#addmovie").hide();
		        }


		         $('#toprow').append("<p align='right' style='color:white;'><b>Signed in as: </b>"+$user+"</p>");
		         
		         $("#disp").owlCarousel({
				    items: 3, // number of images to be moved
				    dots: true
				});

		         $('.owl-carousel').owlCarousel({		         	
				    loop:true,
				    margin:10,					    			    
				    nav:true
				    // responsive:{
				    //     0:{
				    //         items:1
				    //     },
				    //     600:{
				    //         items:3
				    //     },
				    //     1000:{
				    //         items:5
				    //     }
				    // }
				});


		        $("img").mouseenter(function(event){
		        	var title=$(this).attr("alt");
		        	$(this).addClass("gray");

		        	 json_obj=$.grep(data, function(obj) { return obj.name==title})[0];		        	 
		        	 caption = "<b>Description: </b>"+json_obj.description+"<br><b>Genre: </b>"+json_obj.genre+"<br><b>Rating: </b>"+json_obj.rating+"<br><b>Price: </b>"+json_obj.price;

		        	 div_preview = "<div id='preview'><p id='title'>"+caption+"</p></div>";
		        	 $("body").append(div_preview);

		        	 $("#preview").fadeIn(1000);
		        	 $("#preview").css("z-index",3);
		        	 pagex = event.pageX;
		        	 pagey = event.pageY+5;
					 $("#preview").css("left", ""+pagex+"px");
					 $("#preview").css("top", ""+pagey+"px");
					 
		        });	 

		        $(".update").click(function(){
		        	var name=$(this).attr("alt");
		        	window.location.replace("http://localhost/moviestore/update.php?moviename='"+name+"'");
		        });

 				$(".delete").click(function(){
 					console.log("delete function");
 					var name=$(this).attr("alt");

 					$.post("delete.php",{name:name},function(response){
 						if(response.trim()=="1"){
 							alert("Deleted");
 							window.location.reload(true);
  					}
  					else{
  						console.log("response:else"+response);   						
  						alert("An Error occurred. Please try again");
  					}
 						
 					});

 				});

 				$(".addtocart").click(function(){
 					var name=$(this).attr("alt");

 					$.post("addtocart.php",{name:name},function(response){
 						if(response.trim()=="1"){
 							alert("Added To Cart");
 							window.location.reload(true);
  					}
  					else{
  						console.log("response:else"+response);   						
  						alert("An Error occurred. Please try again");
  					}
 						
 					});
 				});


		        $("img").mouseleave(function(event) {
					$(this).removeClass("gray");
					$("#preview").remove();
				});

				$("img").mousemove(function(event) {
					pagex = event.pageX+20
		        	pagey = event.pageY+5
					$("#preview").css("left", ""+pagex+"px");
					$("#preview").css("top", ""+pagey+"px");
				}); 

		}, error: function() 
			{ 
				alert("Error!!");  
			}
	});
});