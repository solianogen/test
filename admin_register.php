<?php

/*session_start();*/
include 'config.php';
if(isset($_POST['submit']))
{
	
    $idnumber = mysqli_real_escape_string($db,$_POST['idnumber']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $fname = mysqli_real_escape_string($db,$_POST['fname']);
    $lname = mysqli_real_escape_string($db,$_POST['lname']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $grade = mysqli_real_escape_string($db,$_POST['grade']);
    //$user_type = mysqli_real_escape_string($database,$_POST['user_type']);
    
    $display = mysqli_query($db,"INSERT INTO users(idnumber,password,fname,lname,email,grade) VALUES ('$idnumber','$password','$fname','$lname','$email','$grade')");
    //$dis = mysqli_query($database,$display);

    echo "<script>window.location.href='index1.php';</script>";
}
?>
