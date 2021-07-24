<?php
session_start();
include("Connect.php");

if ( isset( $_SESSION['patients'] ) )
{

} else
{
    header("location: Patient.php");
}
$session_id = $_SESSION['patients'];
    
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Medical.css">
<title> HK600 Medical Centre </title>  
</head>
<body> 
<h1 style="border:4px solid DodgerBlue;"> HK600 Medical Centre </h1> 
<div class="btn-group">
<a href="BookAppointments.php" class="button">Book Appointments</a>
<a href="CancelAppointments.php" class="button">Cancel Appointments</a>
<a href="MedicalNotes2.php" class="button">Medical Notes</a>
<a href="Logout.php" class="button">Logout</a>
</div>


<br><br>
        <p style="clear:both"> Welcome <?php echo $session_id?>, to your Home page. <br>
    Please Navigate through the panels on the top left hand side of the page to manage your appointments and view your medical notes
</p>

</body>

</html> 