<?php
session_start();
include 'config.php';
if (isset($_POST['sub']))
{
    $idnumber = mysqli_real_escape_string($db,$_POST['idnumber']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    
    $result = mysqli_query($db,"SELECT * FROM users WHERE idnumber = '$idnumber' and password = '$password'");

    if (mysqli_num_rows($result) == 1)
    {
        while($res = mysqli_fetch_array($result))
        {
            if($res['user_type'] == 'admin')
            {
                  $_SESSION['idnumber'] = $res['idnumber'];
                  $_SESSION['fname'] = $res['fname'];
                  $_SESSION['lname'] = $res['lname'];   
                  $_SESSION['user_type'] = $res['user_type'];
                  echo "<script>window.location.href='admin_home.php';</script>";
            }
            else 
            {
                $_SESSION['idnumber'] = $res['idnumber'];
                $_SESSION['fname'] = $res['fname'];
                $_SESSION['lname'] = $res['lname'];
                $_SESSION['idnumber'] = $idnumber;
                $_SESSION['user_type'] = $res['user_type'];
                echo "<script>window.location.href='home1.php';</script>";
            }
        }
    }
            else
            {
                echo "<script>alert('Username and Password is Incorrect ')</script>";
                echo "<script>window.location.href='index1.php';</script>";

            }
   }
?>
<!--<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.min.css">
    <script type="text/javascript" src="Css/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="Css/bootstrap.min.js"></script>
    <script type="text/javascript" src="Css/popper.min.js"></script>
</head>
<body>
    </div>
    <form action='login.php' method="post">
        <center><h1> WELCOME TO TEXTBOOK RESERVATION SYSTEM </h1>
        <table>
            <tr>
                <td><input type="text" name="idnumber" placeholder="ID Number" required="required"/></td>
            </tr>
             <tr>
                <td><input type="password" name="password" placeholder="Password" required="required"/></td>
            </tr>
             <tr>
                <td><input type="submit" name="sub"  value="Login">
            </tr>
        </table>
    </center>
        
    </form>

</body>
</html>-->