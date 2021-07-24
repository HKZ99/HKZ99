<?php
session_start();
include("Connect.php");


if(isset($_POST['edit'])){
    $patientId = $_POST['edit'];

        $query = "SELECT * FROM patients WHERE PatientID='$patientId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        
}
if(isset($_POST['submit'])){


    $first_name = $mysqli->real_escape_string($_REQUEST['first_name']);
    $patientId = $_POST['PatientId'];
    $fname=$_POST['FirstName'];
    $lname=$_POST['Lastname'];
    $dob=$_POST['DOB'];
    $gender=$_POST['Gender'];
    $address=$_POST['Address'];
    $pcode=$_POST['PostCode'];
    $pnumber=$_POST['PhoneNumber'];
    $email=$_POST['Email'];
    $pwd=$_POST['Password'];
    

    $query1 = "UPDATE patients SET Firstname='$fname',Lastname='$lname',DOB='$dob',Gender='$gender',Address='$address',PostCode='$pcode',PhoneNumber='$pnumber',Email='$email',Password='$pwd' WHERE PatientID='$patientId'";
   

    if ($conn->query($query1) === TRUE) {
        header('location:UpdatePatient.php');
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
        <h1 style="border:4px solid DodgerBlue;"> Edit Patient </h1> 
        <div class="btn-group">
                <a href="RegisterPatient.php" class="button">Register Patient</a>
                <a href="ManagePatients.php" class="button">Manage Patients</a>
                <a href="ViewAppointments2.php" class="button">View Appointments</a>
                <a href="RegisterDoctor.php" class="button">Register Doctors</a>
                <a href="RegisterAdmin.php" class="button">Register Admin</a>
                <a href="Logout.php" class="button">Logout</a>
        </div>

           <form action="EditPatient.php" method="POST" style="clear:both">

            PatientID: <input type="text" name="PatientId" value="<?php echo $row['PatientID']; ?>" readonly><br>
            FirstNme: <input type="text" name="FirstName" value="<?php echo $row['Firstname']; ?>"><br>
            Lastname: <input type="text" name="Lastname" value="<?php echo $row['Lastname']; ?>" ><br>
            DOB: <input type="date" name="DOB" value="<?php echo $row['DOB']; ?>"><br>
            Gender: <input type="text" name="Gender" value="<?php echo $row['Gender']; ?>"><br>
            Address: <input type="text" name="Address" value="<?php echo $row['Address']; ?>"><br>
            PostCode: <input type="text" name="PostCode" value="<?php echo $row['PostCode']; ?>"><br>
            Phone Number: <input type="text" name="PhoneNumber" value="<?php echo $row['PhoneNumber']; ?>"><br>
            Email: <input type="text" name="Email" value="<?php echo $row['Email']; ?>"><br>
            Password: <input type="password" name="Password" value="<?php echo $row['Password']; ?>"><br>
            <input type="Submit" name="submit" value="Submit">
        </form>
</body>
    </html>