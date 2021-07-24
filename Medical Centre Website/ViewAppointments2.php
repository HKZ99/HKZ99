<?php
session_start();
include("Connect.php");

if ( isset( $_SESSION['admin'] ) )
{

} else
{
    header("location: Admin.php");
}

$session_id = $_SESSION['admin'];
//     }
?>

<script>
    $(document).ready(function()
{


});
</script>
<html> 
    <head> 
        <link rel="stylesheet" type="text/css" href="Medical.css">
        <title> Admin </title> 
    </head>
    <body>
    <h1 style="border:4px solid DodgerBlue;"> View Appointments</h1> 
        <!-- <h1> Nice one buddy! WELCOME <?php echo $session_id; ?> </h1> -->

        <div class="btn-group">
               <a href="RegisterPatient.php" class="button">Register Patient</a>
                <a href="ManagePatients.php" class="button">Manage Patients</a>
                <a href="ViewAppointments2.php" class="button">View Appointments</a>
                <a href="RegisterDoctor.php" class="button">Register Doctors</a>
                <a href="RegisterAdmin.php" class="button">Register Admin</a>
                <a href="Logout.php" class="button">Logout</a>
        </div>

        <table style="width:100%" style= "clear:both">
  <tr>
    <th>PatientID</th> 
    <th>FirstName</th>
    <th>LastName</th> 
    <th>DOB</th>
    <th>DoctorID</th>
    <th>AppointmentID</th>
    <th>Date</th>
    <th>Time</th>
  </tr>
  <?php

        

        $query = mysqli_query($conn, "SELECT patients.PatientID,patients.FirstName,
        patients.LastName, patients.DOB, appointments.DoctorID, appointments.AppointmentID, appointments.Date, appointments.Time
        FROM patients ,appointments
        Where patients.PatientID= appointments.PatientID");


         while($row = mysqli_fetch_array($query)){
         ?>
             <tr>
                 <td><?php echo $row['PatientID']; ?></td>
                 <td><?php echo $row['FirstName']; ?></td>
                 <td><?php echo $row['LastName']; ?></td>
                 <td><?php echo $row['DOB']; ?></td>
                 <td><?php echo $row['DoctorID']; ?></td>
                 <td><?php echo $row['AppointmentID']; ?></td>
                 <td><?php echo $row['Date']; ?></td>
                 <td><?php echo $row['Time']; ?></td>
             <?php echo "<tr>";
             }
             ?>
</table>



    </body>
</html>