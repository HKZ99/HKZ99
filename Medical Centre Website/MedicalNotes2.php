<?php
session_start();
include("Connect.php");

if ( isset( $_SESSION['patients'] ) )
{

} else
{
    header("location: Patient.php");
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
            <a href="BookAppointments.php" class="button">Book Appointments</a>
            <a href="CancelAppointments.php" class="button">Cancel Appointments</a>
            <a href="MedicalNotes2.php" class="button">Medical Notes</a>
            <a href="Logout.php" class="button">Logout</a>
        </div>

    <table style="width:100%" style= "clear:both">
    <tr>
        <th>Medicine Name</th> 
        <th>Instructions</th>
        
    </tr>
    <?php

        $session_id = $_SESSION['patients'];
        $result=mysqli_query($conn, "Select PatientID from patients where Email='$session_id'")or die('Error In Session');
        $row=mysqli_fetch_array($result);
        $patientid = $row["PatientID"];

      
        $query = mysqli_query($conn, "SELECT Name, Instructions FROM medicalnotes WHERE PatientID =$patientid ");

         while($row = mysqli_fetch_array($query)){
     ?>
             <tr>
                 <td><?php echo $row['Name']; ?></td>
                 <td><?php echo $row['Instructions']; ?></td>

             <?php echo "<tr>";
             }
            ?>
    </table>
    </body>
</html> 