<?php
session_start();
include("Connect.php");

if ( isset( $_SESSION['patients'] ) )
{

} else
{
    header("location: Patient.php");
}

if(isset($_POST['submit']))
{
    
$session_id = $_SESSION['patients'];
$date =  mysqli_real_escape_string($conn,$_POST['Date']);
$time = mysqli_real_escape_string($conn,$_POST['Time']);
$result=mysqli_query($conn, "Select PatientID from patients where Email='$session_id'")or die('Error In Session');
$row = mysqli_fetch_array($result);
$Patientid = $row["PatientID"];

$DoctorID = mysqli_real_escape_string($conn,$_POST['DoctorID']);



$sql 		= "INSERT INTO `appointments`( `Date`, `Time`, `PatientID`, `DoctorID`) 
                                    VALUES ('$date','$time','$Patientid','$DoctorID ')";

        if ($conn->query($sql) === TRUE) {
            echo "Appointment booked successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

}
    
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Medical.css">
<title> HK600 Medical Centre </title>  
</head>
<body> 
<h1 style="border:4px solid DodgerBlue;"> Book Appointments </h1> 
<div class="btn-group">
<a href="BookAppointments.php" class="button">Book Appointments</a>
<a href="CancelAppointments.php" class="button">Cancel Appointments</a>
<a href="MedicalNotes2.php" class="button">Medical Notes</a>
<a href="Logout.php" class="button">Logout</a>
</div>


<form action="BookAppointments.php" method="POST" style="clear:both">
            Date: <input type="date" name="Date"><br>
            Time: <input type="time" name="Time"><br>
            DoctorID: <input type="text" name="DoctorID"><br>

            <input type="Submit" name="submit" value="Submit">
        </form>


</body>

</html> 