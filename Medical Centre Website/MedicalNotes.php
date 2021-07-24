<?php
session_start();
include("Connect.php");

if ( isset( $_SESSION['doctor'] ) )
{

} else
{
    header("location: doctor.php");
}

if(isset($_POST['submit'])){


    $Name = $conn->real_escape_string($_REQUEST['Medicinename']);
    $Instructions = $conn->real_escape_string($_REQUEST['Instructions']);
    $PatientID = $conn->real_escape_string($_REQUEST['PatientID']);

    $query1= "INSERT INTO medicalnotes ( Name, Instructions, PatientID)
     VALUES ('$Name', '$Instructions', '$PatientID' )";

    if ($conn->query($query1) === TRUE) {
        echo "Successful" ; 
        
    } else {
        echo "Error: " . $query1 . "<br>" . $conn->error;
    }

}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Medical.css">
<title> HK600 Medical Centre </title>  
</head>
<body> 
<h1 style="border:4px solid DodgerBlue;"> Medical Notes </h1> 
<div class="btn-group">
<a href="ViewAppointments.php" class="button">View Appointments</a>
<a href="PatientHistory.php" class="button">Patient History</a>
<a href="MedicalNotes.php" class="button">Medical Notes</a>
<a href="Logout.php" class="button">Logout</a>
</div>


<form method="POST" action="MedicalNotes.php" style="clear:both">

    PatientID: <input type="text" name="PatientID" ><br>
    Medicine Name: <input type="text" name="Medicinename" ><br>
    Instructions: <input type="text" name="Instructions" style= "width: 1500px;" ><br>
    <input type="Submit" name="submit" value="Submit">

</from>

</body>

</html> 