<?php

	include 'connection.php';
	session_start();

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	//Query the users table if there are matching rows equal to $username
	$query = mysqli_query($conn, "SELECT * from users WHERE username='$username'"); 
	
	//Checks if user exists
	$exists = mysqli_num_rows($query); 
	$table_users = "";
	$table_password = "";

	//IF successful inserting the data in users table
	if($exists > 0){
		
		while($row = mysqli_fetch_assoc($query)) 
		{
			$table_users = $row['username']; 
			$table_password = $row['password']; 
		}
		// checking user login connection
		if(($username == $table_users) && ($password == $table_password)) 
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $username; 
					header("location: home.php"); 
				}
				
		}
		else
		{
		//Alert the user
		Print '<script>alert("Incorrect Password!");</script>'; 
		Print '<script>window.location.assign("login.php");</script>'; 
		}
	}
	else
	{
		//Alert the user
		Print '<script>alert("Incorrect Username!");</script>'; 
		Print '<script>window.location.assign("login.php");</script>'; 
	}
?>