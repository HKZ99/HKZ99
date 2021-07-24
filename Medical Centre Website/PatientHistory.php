<?php
session_start();
include("Connect.php");

if ( isset( $_SESSION['doctor'] ) )
{

} else
{
    header("location: doctor.php");
}



?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Medical.css">
<title> HK600 Medical Centre </title>  
</head>
<body> 
<h1 style="border:4px solid DodgerBlue;"> Patient History</h1> 
<div class="btn-group">
<a href="ViewAppointments.php" class="button">View Appointments</a>
<a href="PatientHistory.php" class="button">Patient History</a>
<a href="MedicalNotes.php" class="button">Medical Notes</a>
<a href="Logout.php" class="button">Logout</a>
</div>



<table style="width:100%" style= "clear:both">
  <tr>
    <th>PatientID</th> 
    <th>FirstName</th>
    <th>LastName</th> 
    <th>DOB</th>
    <th>AppointmentID</th>
    <th>Date</th>
    <th>Time</th>
  </tr>
  <?php

        $session_id = $_SESSION['doctor'];
        $result=mysqli_query($conn, "Select DoctorID from doctor where Email='$session_id'")or die('Error In Session');
        $row=mysqli_fetch_array($result);
        $doctorid = $row["DoctorID"];
        $query = mysqli_query($conn, "SELECT patients.PatientID,patients.FirstName,
        patients.LastName, patients.DOB, appointments.AppointmentID, appointments.Date, appointments.Time
        FROM patients ,appointments
        WHERE  appointments.DoctorID =$doctorid AND  patients.PatientID =  appointments.PatientID
        AND appointments.Date< NOW();");
         while($row = mysqli_fetch_array($query)){
         ?>
             <tr>
                 <td><?php echo $row['PatientID']; ?></td>
                 <td><?php echo $row['FirstName']; ?></td>
                 <td><?php echo $row['LastName']; ?></td>
                 <td><?php echo $row['DOB']; ?></td>
                 <td><?php echo $row['AppointmentID']; ?></td>
                 <td><?php echo $row['Date']; ?></td>
                 <td><?php echo $row['Time']; ?></td>
             <?php echo "<tr>";
             }
             ?>
</table>

</body>

</html> 