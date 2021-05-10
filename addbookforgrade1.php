<?php
session_start();
include 'config.php';
include 'modal-register.php';

if(isset($_POST['Add'])) 
{	
    $filename = $_FILES['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    $folder = "Image/".basename($filename);
    move_uploaded_file($filetmpname, $folder);
	$bookname = mysqli_real_escape_string($db,$_POST['bookname']);
    $author = mysqli_real_escape_string($db,$_POST['author']);
    $price = mysqli_real_escape_string($db,$_POST['price']);
	$quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    $status="Available";
					
	//insert data to database	
	$result = mysqli_query($db, "INSERT INTO `grade1`(`bookimage`, `bookname`, `author`, `price`, `quantity`, `status`) VALUES ('$filename','$bookname','$author','$price','$quantity','$status' )");
    //move_uploaded_file($_FILES['image']['name'], $target);
		
	if($_POST['Add']){
	echo "<script>alert('Book Added Successfully')</script>";}
}
?>
<html>
<head>
	<title>Add Data</title>
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
li{
    font-weight: bold;
    font-size: 19px;
}
input{  
  font-weight: bold;
    font-size: 19px;

}
td{

  font-weight: bold;
    font-size: 19px;
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
              <center><h1>Add book</h1></center>
        <div class="table">
        	<form action="addbookforgrade1.php" method="post" name="form1" enctype="multipart/form-data">
	<form action="addbookforgrade1.php" method="post" name="form1">
		<table width="25%" border="0">
            <tr>
                <td>Upload Image</td>
                <td><input type="file" required="required" name="image">
            </tr>
			<tr> 
				<td>Book Name</td>
				<td><input type="text" required="required" name="bookname"></td>
			</tr>
            <tr>
                <td>Author</td>
                <td><input type="text" required="required" name="author"></td>
            </tr>
            <tr> 
                <td>Price <?php echo "₱"?></td>
                <td><input type="number" required="required" name="price"></td>
            </tr>
			<tr> 
                <td>Quantity</td>
                <td><input type="number" required="required" name="quantity"></td>
            </tr>
			<tr> 
                <td></td>
				<td><input type="submit" name="Add" value="Add Book"></td>
			</tr>
		</table>
	</form>
</body>
</html>

