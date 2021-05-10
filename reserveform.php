<?php
session_start();
include 'config.php';

$idnumber=$_SESSION['idnumber'];

$result=mysqli_query($db,"SELECT * FROM users WHERE idnumber = '$idnumber'");
while($res=mysqli_fetch_array($result))
{
    $idnumber=$res['idnumber'];
    $fname=$res['fname'];
}
$bookid=$_GET['bookid'];

$result2=mysqli_query($db,"SELECT * FROM grade1 WHERE bookid='$bookid'");
while($res2=mysqli_fetch_array($result2))
{
    $bookid=$res2['bookid'];
    $bookimage=$res2['bookimage'];
    $author=$res2['author'];
    $price=$res2['price'];
    $bookname=$res2['bookname'];
    $quantity=$res2['quantity'];
    $_SESSION['quantity']=$res2['quantity'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order Form</title>
</head>


<style>
    .img-responsive{
        height: 200px;
        width: 200px;
    }
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
        color: white;
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
        background: white;
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
.reserve:hover{
    background-color: black;
    color:white;
}
</style>
<body>
<div class="wrapper">
    <div class="sidebar">
      <h2>Menu</h2>
      <ul>
        <li><i class="fas"><a href="viewmyreservation.php">View My Reservation</a></i></li>
        <li><i class="fas"><a href="home1.php">Back</a></i></li>
        <li><i class="fas"><a href="logout.php">Logout</a></i></li>
      </ul>
  </div>
      <div class="main_content">
        <div  class="header">Welcome <?php echo "{$_SESSION['fname']}"; ?></div>
        <div class="info">
        <div class="table">
  <form action="reserve.php" method='POST' enctype="multipart/form-data">
	<table>
    <h1>Reserve Form</h1>
    <tr>
      <td><h6>Date</h6></td>
      <td style="border:none; text-transform: uppercase; font-weight: bold; color:black; font-size: 20px;"><?php date_default_timezone_set("Asia/Singapore"); 
            echo $dates = date('Y/m/d g:i:A');     
      ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo "<img src='Image/$bookimage' class='img-responsive' />";?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr> 
      <td><h6>BookName</h6></td> 
      <td><input style="border:none; text-transform: uppercase;background-color: #f3f5f9; font-weight: bold; color:black;" disabled type="text" name="bookname"  value="<?php echo $bookname;?>">  </td>
    </tr>
    <tr>
      <td><h6 style="padding-right:60px;">Price</h6></td>
      <td><input style="border:none; text-transform: uppercase;background-color: #f3f5f9; font-weight: bold; color:black;" type="text" name="price" value="<?php echo $price?>"> </td>
    </tr>
    <tr>
      <td><h6 style="padding-right:60px;">Quantity</h6></td>
      <td><input style="border:none; text-transform: uppercase;background-color: #f3f5f9; font-weight: bold; color:black;" type="number" name="purchaseqty" placeholder="0" required="required"> </td>
    </tr>
    <tr>
      <td><h6>ID Number</h6></td>
      <td><input style="border:none; text-transform: uppercase;background-color: #f3f5f9; font-weight: bold; color:black;" disabled type="text" name="idnumber" value="<?php echo $idnumber;?>"> </td>
    </tr>
    <tr>
      <td><h6>First Name</h6></td>
      <td><input style="border:none; background-color: #f3f5f9; text-transform: uppercase; font-weight: bold; color:black;" disabled type="text"  name="fname" value="<?php echo $fname;?>"> </td>
    </tr>
    <tr>
        <td><input type="hidden" name="dates" value=<?php echo $dates;?>></td>
        <td><input type="hidden" name="image" value=<?php echo $bookimage;?>></td>
        <td><input type="hidden" name="bookname" value=<?php echo $bookname;?>></td>
        <td><input type="hidden" name="idnumber" value=<?php echo $idnumber;?>></td>
        <td><input type="hidden" name="fname" value=<?php echo $fname;?>></td>
        <td><input type="hidden" name="bookid" value=<?php echo $_GET['bookid'];?>>
      <td style="padding-left:;"><input type="submit" name="reserve" value="Reserve" class="reserve" style="height: 30px; width: 70px; font-weight: bold;"></td>
    </tr>
  </table>
</form>
</body>
</html>