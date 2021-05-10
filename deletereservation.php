<?php
//including the database connection file
include 'config.php';
session_start();

//getting id of the data from url
$idnumber = $_GET['idnumber'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM reservation WHERE idnumber='$idnumber'");

//redirecting to the display page (index.php in our case)
header("Location:viewmypending.php");
?>

