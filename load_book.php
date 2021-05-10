<?php
session_start();
include 'config.php';

if(isset($_POST['load'])) 
{ 
    $filename = $_FILES['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    $folder = "Image/".basename($filename);
    move_uploaded_file($filetmpname, $folder);
  $grade = mysqli_real_escape_string($db,$_POST['grade']);
    $bookname = mysqli_real_escape_string($db,$_POST['bookname']);
    $author = mysqli_real_escape_string($db,$_POST['author']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
          
  //insert data to database 
  $insert = mysqli_query($db,"INSERT INTO grade1(bookimage,grade,bookname,author,price,quantity,status) VALUES ('$filename','$grade','$bookname','$author','$price','$quantity','$status')");
    //move_uploaded_file($_FILES['image']['name'], $target);
    
  if($_POST['load']){
  echo "<script>alert('Book Added Successfully')</script>";}
  header("Location: addbook.php");
}
?>