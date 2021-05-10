<?php
session_start();
include 'config.php';
include 'modal-register.php';
if (isset($_POST['search']))
{
	$idnumber = $_POST['search'];
	$result = mysqli_query($db,"SELECT * FROM reservation WHERE idnumber = '$idnumber'");
	if(mysqli_num_rows($result)==0)
	{
		echo '<center><h4 style="font-family:Century Gothic, Arial; color:red">Record not found</h4></center>';
	}
}
 else
   {
   		$result = mysqli_query($db,"SELECT * FROM reservation");
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>VIEW BOOKS</title>
      <meta charset="utf-8">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.min.css">
    <script type="text/javascript" src="Css/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="Css/bootstrap.min.js"></script>
    <script type="text/javascript" src="Css/popper.min.js"></script>

    <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="ccs/bootstrap.min.css" />
        <script src="js/bootstrap.min.js"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
        font-family: 'Josefin Sans', sans-serif;
    }
    body{
        background: #f3f5f9;
    }
    .wrapper{
        display: flex;
        position: relative;
    }
    li{
    font-weight: bold;
    font-size: 19px;
}
    .wrapper .sidebar{
        position: fixed;
        width: 240px;
        height: 100%;
        background: MediumSeaGreen;
        padding: 30px 0;

    }
    .wrapper .sidebar h2{
        color: #fff;
        text-align: center;
        margin-bottom: 30px;

    }
    .wrapper .sidebar ul li{
        padding: 15px;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        border-top: 1px solid rgba(225,225,225,0.05);

    }
    .wrapper .sidebar ul li a{
        color: black;
        display: block;
    }
    .wrapper .sidebar ul li a .fas{
        width: 25px;
    }
    .wrapper .sidebar ul li:hover{
        background:black;
        font-size:20px;
    }
    .wrapper .sidebar ul li:hover a{
        color: white;
    }
    h1{
      font-weight: italic;
    }
    h2{
        font-size: 24px;
    }
    .wrapper .main_content{
        width: 100%;
        margin-left: 240px;
    }
    .wrapper .main_content .header{
        padding: 30px;
        background: #fff;
        color: black;
        border-bottom: 1px solid #e0e4e8;
        font-size: 25px;
    }
    .wrapper .main_content .info{
        margin: 90px;
        font-size: 30px;
    }
.container{
  text-align: center;
  margin-top: 360px;
}
</style>
<body>
<div class="wrapper">
    <div class="sidebar">
      <h2>Menu</h2>
      <ul>
        <li><i class="fas"><a href="viewreservation.php">View Pending Reservations</a></i></li>
        <li><i class="fas"><a href="viewregistered.php">View Accounts</a></i></li>
        <li><i class="fas"><a href="" data-toggle="modal" data-target="#register">Add Account</a></i></li>
        <li><i class="fas"><a href="bookadmin.php">View Books</a></i></li>
        <li><i class="fas"><a href="addbookforgrade1.php">Add Book</a></i></li>
        <li><i class="fas"><a href="logout.php">Logout</a></i></li>
      </ul>
    </div>
      <div class="main_content">
        <div  class="header">Welcome <?php echo "Admin {$_SESSION['fname']}"; ?></div>
        <div class="info">
	<center><h1 style="font-family: Century Gothic,Arial; color:maroon">View Pending Reservation</h1></center>
  <table>
        <tr>
            <td><a href="admin_viewpendingreservation.php">View Pending Reservation</a></td>
        </tr>
        <tr>
            <td><a href="admin_viewapprovereservation.php">View Approve Reservation</a></td>
        </tr>

  </table>
</div>
</div>
</table>
</div>
</center>
</body>
</html>