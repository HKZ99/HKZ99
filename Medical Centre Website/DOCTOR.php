<?php
session_start();
include("Connect.php");

if(isset($_POST['submit']))
{
    $email =  mysqli_real_escape_string($conn,$_POST['Email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);


    $query 		= mysqli_query($conn, "SELECT * FROM doctor WHERE Email='$email'");
    $row		    = mysqli_fetch_array($query);
    $num_row 	= mysqli_num_rows($query);
   
   if ($num_row > 0) 
       {			
        if(password_verify($pwd, $row["Password"]))  
        { 
           $_SESSION['doctor']=$row['Email'];
           header('location:DOCTOR2.php');
        }else
        {
             echo '<script> alert ("Invalid  Password") </script>'; 
        }
       }else
       {
            echo '<script> alert ("Invalid Email ") </script>'; 
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
<h1 style="border:4px solid DodgerBlue;"> Doctor </h1> 
<div class="btn-group">
<a href="Home.php" class="button">HOME</a>
<a href="Doctor.php" class="button">DOCTOR</a>
<a href="Patient.php" class="button">PATIENT</a>
<a href="Admin.php" class="button">ADMIN</a>
</div>
<br><br><br><br><br>
<h2 style="clear:both"> Doctor Log in </h2>

<form action="DOCTOR.php" method="POST">
Email: <input type="text" name="Email"><br>
Password: <input type="password" name="password" id="password"><br>
<input type="Submit" name="submit" value="Login">
</form>

</body>
</html> 