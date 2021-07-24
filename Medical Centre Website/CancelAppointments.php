<?php
session_start();
include("Connect.php");

if ( isset( $_SESSION['patients'] ) )
{

} else
{
    header("location: patient.php");
}

if(isset($_POST['delete'])){
    $appointmentId = $_POST['delete'];

        $sql = "DELETE FROM appointments WHERE AppointmentID='$appointmentId'";
      
        if ($conn->query($sql) === TRUE) {  
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
  <h1 style="border:4px solid DodgerBlue;"> Cancel Appointments </h1> 
  <div class="btn-group">
  <a href="BookAppointments.php" class="button">Book Appointments</a>
  <a href="CancelAppointments.php" class="button">Cancel Appointments</a>
  <a href="MedicalNotes2.php" class="button">Medical Notes</a>
  <a href="Logout.php" class="button">Logout</a>
  </div>


  

  <form method="POST" action="CancelAppointments.php">
          <table style="width:100%" style= "clear:both">
    <tr>
      <th>Date</th> 
      <th>Time</th>
      <th>DoctorID</th> 
      <th>Cancel</th>
    </tr>
    <?php

          $Session_id = $_SESSION['patients'];
          $result=mysqli_query($conn, "Select PatientID from patients WHERE Email='$Session_id' ")or die('Error In Session');
          $row =mysqli_fetch_array($result); 
          $patientid = $row["PatientID"];
          $query = mysqli_query($conn, "SELECT Date, Time, DoctorID FROM appointments WHERE PatientID='$patientid' AND Date> NOW()");

          
          while($row = mysqli_fetch_array($query)){
          ?>
              <tr>
                  <td><?php echo $row['Date']; ?></td>
                  <td><?php echo $row['Time']; ?></td>
                  <td><?php echo $row['DoctorID']; ?></td>
                  <td><button type="submit" name="delete" class="btn btn-outline-secondary btn-sm" value="<?php echo $row['AppointmentID']; ?>" >Cancel Appointment </button></td>
              <?php echo "<tr>";
              }
              ?>
  </table>
              </form>

</body>

</html> 