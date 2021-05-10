<?php
    include 'config.php';
    session_start();
    $idnumber = $_SESSION['idnumber'];
    $fname = $_SESSION['fname'];
    $result = mysqli_query($db, "SELECT * FROM reservation INNER JOIN users ON reservation.idnumber = users.idnumber WHERE reservation.idnumber = $idnumber");
?>
<!DOCTYPE html>
<html>
<head>
  <title>VIEW BOOKS</title>
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
        <li><i class="fas"><a href="viewmyreservation.php" style="text-decoration: none; font-weight: bold; font-size:18px;">View My Reservations</a></i></li>
        <li><i class="fas"><a href="home1.php" style="text-decoration: none; font-weight: bold; font-size:18px;">Back</a></i></li>
        <li><i class="fas"><a href="logout.php" style="text-decoration: none; font-weight: bold; font-size:18px;">Logout</a></i></li>
      </ul>
    </div>
      <div class="main_content">
        <div  class="header">Welcome <?php echo $fname; ?></div>
        <div class="info">
  <center><h1 style="font-family: Century Gothic,Arial; color:maroon">View My Reservation</h1></center>
  <table>
        <tr>
            <td><a href="viewmypendingreservation.php">View Pending Reservation</a></td>
        </tr>
        <tr>
            <td><a href="viewmyapprovereservation.php">View Approve Reservation</a></td>
        </tr>

  </table>
</body>
</html>