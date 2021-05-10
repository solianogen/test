<?php
// including the database connection file
include_once("config.php");
session_start();

if(isset($_POST['update']))
{	

	$bookid = mysqli_real_escape_string($db, $_POST['bookid']);
	$bookname = mysqli_real_escape_string($db, $_POST['bookname']);
	$quantity = mysqli_real_escape_string($db, $_POST['quantity']);	
	
	// checking empty fields

		//updating the table
		$result = mysqli_query($db, "UPDATE grade1 SET bookid='$bookid',bookname='$bookname',quantity='$quantity' WHERE bookid='$bookid'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: bookadmin.php");
}
?>
<?php
//getting id from url
$bookid = $_GET['bookid'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM grade1 WHERE bookid='$bookid'");

while($res = mysqli_fetch_array($result))
{
	$bookid = $res['bookid'];
	$bookname = $res['bookname'];
	$quantity = $res['quantity'];
}
?>
<!-- <html>
<head>	
	<title>Edit Data</title>
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
        <li><i class="fas"><a href="viewpendingforgrade1.php">View Pending Reservations</a></i></li>
        <li><i class="fas"><a href="viewregistered.php">View Accounts</a></i></li>
        <li><i class="fas"><a href="register.php">Add Account</a></i></li>
        <li><i class="fas"><a href="bookadmin.php">View Books</a></i></li>
        <li><i class="fas"><a href="addbookforgrade1.php">Add Book</a></i></li>
        <li><i class="fas"><a href="logout.php">Logout</a></i></li>
      </ul>
  </div>
      <div class="main_content">
        <div  class="header">Welcome <?php echo "Admin {$_SESSION['fname']}"; ?></div>
        <div class="info">
        <div class="table">
	 <center><h1 style="font-family: Century Gothic,Arial; color:blue">Update Book</h1></center>
	<form action='editbook.php' method="POST">
		<center>
		<table width="25%" border="0">
			<tr> 
				<td>Book ID</td>
				<td><input type="text" name="bookid" value="<?php echo $bookid;?>"></td>
			</tr>
			<tr> 
				<td>Book Name</td>
				<td><input type="text" name="bookname" value="<?php echo $bookname;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="number" name="quantity" value="<?php echo $quantity;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="bookid" value=<?php echo $_GET['bookid'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html> -->