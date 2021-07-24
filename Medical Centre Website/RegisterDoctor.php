<?php
session_start();
include("Connect.php");

if ( isset( $_SESSION['admin'] ) )
{

} else
{
    header("location: admin.php");
}

if(isset($_POST['submit'])){

    $Firstname = $conn->real_escape_string($_REQUEST['Firstname']);
    $Lastname = $conn->real_escape_string($_REQUEST['Lastname']);
    $DOB = $conn->real_escape_string($_REQUEST['DOB']);
    $Gender = $conn->real_escape_string($_REQUEST['Gender']);
    $Address = $conn->real_escape_string($_REQUEST['Address']);
    $Postcode = $conn->real_escape_string($_REQUEST['Postcode']);
    $Phonenumber = $conn->real_escape_string($_REQUEST['Phonenumber']);
    $Email = $conn->real_escape_string($_REQUEST['Email']);
    $Password = $conn->real_escape_string($_REQUEST['Password']);
    $Password = password_hash($Password, PASSWORD_DEFAULT);
    

    

    $query1= "INSERT INTO doctor ( Firstname, Lastname, DOB, Gender, Address, PostCode, PhoneNumber, Email, Password)
     VALUES ('$Firstname', '$Lastname', '$DOB', '$Gender', '$Address', '$Postcode', '$Phonenumber', '$Email', '$Password' )";

    if ($conn->query($query1) === TRUE) {
        echo "<script> alert('Registration Succesful')</script>" ; 
       
    } else {
        echo "Error: " . $query1 . "<br>" . $conn->error;
    }
}


?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Medical.css">
    </head>
    <body> 
        <h1 style="border:4px solid DodgerBlue;"> Register Doctors </h1> 
        <div class="btn-group">
                <a href="RegisterPatient.php" class="button">Register Patient</a>
                <a href="ManagePatients.php" class="button">Manage Patients</a>
                <a href="ViewAppointments2.php" class="button">View Appointments</a>
                <a href="RegisterDoctor.php" class="button">Register Doctors</a>
                <a href="RegisterAdmin.php" class="button">Register Admin</a>
                <a href="Logout.php" class="button">Logout</a>
        </div>

        <form action="RegisterDoctor.php" method="POST" style="clear:both">

        
            Firstname: <input type="text" name="Firstname" required><br>
            Lastname: <input type="text" name="Lastname" required><br>
            DOB: <input type="date" name="DOB" required><br>
            Gender: <select name="Gender">
                <option value="M">M</option>
                <option value="F">F</option>
                </select ><br>
            Address: <input type="text" name="Address" required><br>
            PostCode: <input type="text" name="Postcode" required><br>
            Phone Number: <input type="text" name="Phonenumber" required><br>
            Email: <input type="text" name="Email" required><br>
            Password: <input type="password" name="Password" required id="password" ><br>
            Confirm Password: <input type="password" name="CPassword" required id="password_confirm" oninput="check(this)"><br>
            <input type="Submit" name="submit" value="Submit">
        </form>

        <script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>


    </body>


</html>
