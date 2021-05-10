<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$idnumber = mysqli_real_escape_string($db, $_POST['idnumber']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
	$lname = mysqli_real_escape_string($db, $_POST['lname']);
	$grade = mysqli_real_escape_string($db, $_POST['grade']);	
	
	// checking empty fields
	if(empty($idnumber) || empty($password) || empty($fname) || empty($lname) || empty($grade)) 
	{		
		if(empty($idnumber)) {
			echo "<font color='red'>ID Number field is empty.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		
		if(empty($fname)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}	

		if(empty($lname)) {
			echo "<font color='red'>Last Name is empty.</font><br/>";
		}
		
		if(empty($grade)) {
			echo "<font color='red'>Grade field is empty.</font><br/>";	
		}
	} 
	else 
	{	
		//updating the table
		$result = mysqli_query($db, "UPDATE users SET idnumber='$idnumber',password='$password',fname='$fname',lname='$lname',grade='$grade' WHERE idnumber='$idnumber'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: viewregistered.php");
	}
}
?>
<?php
//getting id from url
$idnumber = $_GET['idnumber'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM users WHERE idnumber='$idnumber'");

while($res = mysqli_fetch_array($result))
{
	$idnumber = $res['idnumber'];
	$password = $res['password'];
	$fname = $res['fname'];
	$lname = $res['lname'];
	$grade = $res['grade'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="viewregistered.php">View</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>ID Number</td>
				<td><input type="text" name="idnumber" value="<?php echo $idnumber;?>"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password" value="<?php echo $password;?>"></td>
			</tr>
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="fname" value="<?php echo $fname;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="lname" value="<?php echo $lname;?>"></td>
			</tr>
			<tr> 
				<td>Grade</td>
				<td><input type="text" name="grade" value="<?php echo $grade;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idnumber" value=<?php echo $_GET['idnumber'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>