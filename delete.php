<?php
//including the database connection file
include 'config.php';

//getting id of the data from url
$idnumber = $_GET['idnumber'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM users WHERE idnumber='$idnumber'");

//redirecting to the display page (index.php in our case)
header("Location:grade11_accounts.php");
?>

