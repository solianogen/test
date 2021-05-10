<?php
session_start();
include_once('config.php');

if(isset($_POST['reserve']))
{
	$image=mysqli_real_escape_string($db,$_POST['image']);
	$idnumber=mysqli_real_escape_string($db,$_POST['idnumber']);
	$dates=mysqli_real_escape_string($db,$_POST['dates']);
	$purchaseqty=mysqli_real_escape_string($db,$_POST['purchaseqty']);
	$bookid=mysqli_real_escape_string($db,$_POST['bookid']);
	$bookname=mysqli_real_escape_string($db,$_POST['bookname']);
	$price=mysqli_real_escape_string($db,$_POST['price']);
	$totalprice = $price * $purchaseqty;
	$status="pending";
	
	if($purchaseqty<1)
	{
		echo "<script>alert('Invalid Quantity');window.location.href='reserveform.php'</script>";

	}
	else if($purchaseqty>$_SESSION['quantity'])
	{
		echo "<script>alert('Invalid Quantity');window.location.href='reserveform.php'</script>";
	}
	else
	{
		$result=mysqli_query($db,"INSERT INTO `reservation`(`bookid`, `bookimage`, `idnumber`, `bookname`, `purchaseqty`, `totalprice`, `dates`, `status`) VALUES ('$bookid','$image','$idnumber','$bookname','$purchaseqty','$totalprice','$dates','$status')");

		echo "<script>alert('Reserved Successfully');window.location.href='home1.php'</script>";
	}
}
?>

