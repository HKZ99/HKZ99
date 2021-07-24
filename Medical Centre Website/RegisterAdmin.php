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

    $Username = $conn->real_escape_string($_REQUEST['Username']);
    $Password = $conn->real_escape_string($_REQUEST['Password']);
     
    

    
    

    $query1= "INSERT INTO admins ( Username, Password)
     VALUES ('$Username','$Password' )";

    if ($conn->query($query1) === TRUE) {
        
        echo "<script> alert('Registration Succesful')</script>"; 
        
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
        <h1 style="border:4px solid DodgerBlue;"> Register Admin </h1> 
        <div class="btn-group">
                <a href="RegisterPatient.php" class="button">Register Patient</a>
                <a href="ManagePatients.php" class="button">Manage Patients</a>
                <a href="ViewAppointments2.php" class="button">View Appointments</a>
                <a href="RegisterDoctor.php" class="button">Register Doctors</a>
                <a href="RegisterAdmin.php" class="button">Register Admin</a>
                <a href="Logout.php" class="button">Logout</a>
        </div>

        <form action="RegisterAdmin.php" method="POST" style="clear:both">

        
            UserName: <input type="text" name="Username" required><br>
            Password: <input type="password" name="Password" required id="password"><br>
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
