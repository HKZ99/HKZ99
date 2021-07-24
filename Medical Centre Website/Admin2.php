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


</script>
<html> 
    <head> 
        <link rel="stylesheet" type="text/css" href="Medical.css">
        <title> Admin </title> 
    </head>
    <body>
    <h1 style="border:4px solid DodgerBlue;"> HK600 Medical Centre </h1> 
        <!-- <h1> Welcome <?php echo $session_id; ?> </h1> -->

        <div class="btn-group">
               <a href="RegisterPatient.php" class="button">Register Patient</a>
                <a href="ManagePatients.php" class="button">Update Patient</a>
                <a href="ViewAppointments2.php" class="button">View Appointments</a>
                <a href="RegisterDoctor.php" class="button">Register Doctors</a>
                <a href="RegisterAdmin.php" class="button">Register Admin</a>
                <a href="Logout.php" class="button">Logout</a>
        </div>

        <br><br>
        <p style="clear:both"> Welcome <?php echo $session_id?>, to your Administration page. <br>
    Please Navigate through the panels on the top left hand side of the page to manage aspects of the Medical Centre
</p>

    </body>
</html>