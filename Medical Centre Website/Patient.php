<?php
session_start();
include("Connect.php");

if(isset($_POST['submit']))
{
    $email =  mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['Password']);


    $query 		= mysqli_query($conn, "SELECT * FROM patients  WHERE  Email='$email'");
    $row		    = mysqli_fetch_array($query);
    $num_row 	= mysqli_num_rows($query);
   
   if ($num_row > 0) 
       {
        if(password_verify($pwd, $row["Password"]))  
        {  			
           $_SESSION['patients']=$row['Email'];
           header('location:Patient2.php');
        } else
        {
             echo '<script> alert ("Invalid Password") </script>'; 
        }
           
       }else
       {
            echo '<script> alert ("Invalid Email") </script>'; 
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
<h1 style="border:4px solid DodgerBlue;"> Patient</h1> 
<div class="btn-group">
<a href="Home.php" class="button">HOME</a>
<a href="Doctor.php" class="button">DOCTOR</a>
<a href="Patient.php" class="button">PATIENT</a>
<a href="Admin.php" class="button">ADMIN</a>
</div>

<h2 style="clear:both"> Patient Log in </h2>

<form action="Patient.php" method="post">
Email: <input type="text" name="email"><br>
Password: <input type="password" name="Password"><br>
<input type="submit" name= "submit" value="Login">
</form>

</body>
</html> 