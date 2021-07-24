<?php
session_start();
include("Connect.php");

if(isset($_POST['delete'])){
    $patientId = $_POST['delete'];

        $sql = "DELETE FROM patients WHERE PatientID='$patientId'";
      
        if ($conn->query($sql) === TRUE) {
            header("location: ManagePatients.php") ;     
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
}


?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Medical.css">
    </head>
    <body> 
        <h1 style="border:4px solid DodgerBlue;"> Manage Patients </h1> 
        <div class="btn-group">
                <a href="RegisterPatient.php" class="button">Register Patient</a>
                <a href="ManagePatients.php" class="button">Manage Patients</a>
                <a href="ViewAppointments2.php" class="button">View Appointments</a>
                <a href="RegisterDoctor.php" class="button">Register Doctors</a>
                <a href="RegisterAdmin.php" class="button">Register Admin</a>
                <a href="Admin.php" class="button">Logout</a>
        </div>

<form method="POST" action="EditPatient.php">
        <table style="width:100%" style= "clear:both">
  <tr>
    <th>PatientID</th> 
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>DOB</th> 
    <th>Gender</th> 
    <th>Address</th> 
    <th>Post Code</th> 
    <th>Phone number</th> 
    <th>Email</th> 
    <th>Edit</th> 
    <th>Delete</th> 
  </tr>
  <?php
        $query = mysqli_query($conn, "SELECT `PatientID`, `Firstname`, `Lastname`, `DOB`, `Gender`, `Address`, `PostCode`, `PhoneNumber`, `Email` FROM patients");
         while($row = mysqli_fetch_array($query)){
         ?>
             <tr>
                 <td><?php echo $row['PatientID']; ?></td>
                 <td><?php echo $row['Firstname']; ?></td>
                 <td><?php echo $row['Lastname']; ?></td>
                 <td><?php echo $row['DOB'];?></td> 
                 <td><?php echo $row['Gender'];?></td>
                 <td><?php echo $row['Address'];?></td>
                 <td><?php echo $row['PostCode'];?></td>
                 <td><?php echo $row['PhoneNumber'];?></td> 
                 <td><?php echo $row['Email'];?></td>
                 <td><button type="submit" name="edit" class="btn btn-outline-secondary btn-sm" value="<?php echo $row['PatientID']; ?>">Edit </button></td>
                 <td><button type="submit" name="delete" class="btn btn-outline-secondary btn-sm" value="<?php echo $row['PatientID']; ?>" formaction="ManagePatients.php" >Delete </button></td>
             <?php echo "<tr>";
             }
             ?>
</table>
            </form>
<br>

        

        
    </body>

</html> 