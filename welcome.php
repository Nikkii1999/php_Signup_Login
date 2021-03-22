<?php  
	session_start();  
	if(!$_SESSION['username'])  
	{  
	    header("Location: home.php"); 
	}  
?>  
<html>  
	<head>  
	    <title>  
	        Registration  
	    </title>
	    <style type="text/css">
	    	body{
	    		color: white;
	    		background-color: #d47677;
	    		font-family: cursive;
	    		text-align: center;
	    		padding: 31%;
	    	}
	    	.a{
	    		color: white;
	    		text-align: center;
	    	}
	    </style>  
	</head> 
	  
	<body> 
		<?php
			$conn =mysqli_connect('localhost', 'nikitab', 'mindfire', 'Register');
		    if (!$conn) {
		        die("Connection failed: " . mysqli_connect_error());
		    }
		    $user_email=$_SESSION['username'];
		    $check_user="SELECT name from Details WHERE email='$user_email'"; 
		    $result = mysqli_query($conn, $check_user);
		    if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$name=$row["name"];
		    		echo " <h1> Welcome $name </h2>" ;
		  		} 
		  	} 
		?>  
		<h1><a class="a" href="logout.php">Logout here</a> </h1>
	</body>   
</html> 