<?php
session_start();
include("Connect.php");

if(isset($_POST['submit']))
{
    $username =  mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);


    $query 		= mysqli_query($conn, "SELECT * FROM admins WHERE Username='$username' AND Password='$pwd'");
    $row		    = mysqli_fetch_array($query);
    $num_row 	= mysqli_num_rows($query);
   
   if ($num_row > 0) 
       {		
        
           $_SESSION['admin']=$row['Username'];
           header('location:Admin2.php');
       
    }else
    {
         echo '<script> alert ("Invalid Username or Password") </script>'; 
    }
   
}



?>

<html> 
<head>
<style>  
    form {
    text-align: center;
  position: absolute;
  left: 42%;
  top: 39%; }
    </style>
<link rel="stylesheet" type="text/css" href="Medical.css">
<title> HK600 Medical Centre </title> 
</head> 
<body > 
<h1 style="border:4px solid DodgerBlue;"> Admin </h1> 
<div class="btn-group">
<a href="Home.php" class="button">HOME</button>
<a href="Doctor.php" class="button">DOCTOR</a>
<a href="Patient.php" class="button">PATIENT</a>
<a href="Admin.php" class="button">ADMIN</a>
</div>

<h2 style="clear:both"> Admin Log in </h2>

<form action="Admin.php" method="post">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" name= "submit" value="Login">
</form>

</body>
</html> 