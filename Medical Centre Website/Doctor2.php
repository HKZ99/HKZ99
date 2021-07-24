<?php
session_start();
include("Connect.php");

if ( isset( $_SESSION['doctor'] ) )
{

} else
{
    header("location: Doctor.php");
}

$session_id = $_SESSION['doctor'];
$result=mysqli_query($conn, "Select * from doctor where Email='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Medical.css">
<title> HK600 Medical Centre </title>  
</head>
<body> 
<h1 style="border:4px solid DodgerBlue;"> HK600 Medical Centre </h1> 
<div class="btn-group">
<a href="ViewAppointments.php" class="button">View Appointments</a>
<a href="PatientHistory.php" class="button">Patient History</a>
<a href="MedicalNotes.php" class="button">Medical Notes</a>
<a href="Logout.php" class="button">Logout</a>
</div>

<br><br>
        <p style="clear:both"> Welcome <?php echo $session_id?>, to your Home page. <br>
    Please Navigate through the panels on the top left hand side of the page to manage your appointments,view patient history and add medical notes
</p>

</body>

</html> 