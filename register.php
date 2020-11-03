<!DOCTYPE html>
<html>
<head>
    <title>Login | Weebhook | ION Energy Solutions </title>
     <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 17px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 20px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}


h1{
    font-family: 'sans-serif';
    font-size: 3.25rem;
    font-style: normal;
    line-height: 1.2;
    font-weight: 700;
    text-align: center;
    color: #ffffff;
}
body{
     background-image: url("background.jpg");
     background-size : cover;
}

</style>
<script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script></head>
<body>
    <h1> <img src="logo.png" alt="WebHook | ION Energy Solutions" width="100" height="100"><br>IOT Device Tester</h1>
	<div id="Container">
	<h2>Registration Page</h2>
    <a href="index.php">Click here to go back</a><br/><br/>

    <form action="register.php" method="post">
      Enter Username: <input type="text" name="username" required="required"/> <br/><br>
      Enter Password: <input type="password" name="password" required="required" /> <br/><br>
      
      <input type="submit" value="Register"/>
    </form>
    </div>
</body>


<!-- CORE SCRIPTS -->
<script src="home.js"></script>
<script src="jquery/jquery.min.js"></script>
</html>


<?php

  include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $bool = true;
  
  //mysqli query for users table
  $query = mysqli_query($conn, "Select * from users");
 
  while($row = mysqli_fetch_array($conn, $query))
  {
    
    $table_users = $row['username']; 

    // checks if username is taken
    if($username == $table_users) 
    {
      
      $bool = false; 
      
      //Alert the user
      Print '<script>alert("Username has been taken!");</script>'; 

      Print '<script>window.location.assign("register.php");</script>'; 
    }
  }

  // checks if user is unique
  if($bool) 
  {
    $sql = "INSERT INTO users (username, password) VALUES ('$username','$password')"; 
    
    mysqli_query($conn, $sql);

    Print '<script>alert("Successfully Registered!");</script>';
     
    Print '<script>window.location.assign("login.php");</script>'; 
  }
}
?>
