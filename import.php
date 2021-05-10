<?php

//import.php

if(isset($_POST["student_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=textbook", "root", "");
 $student_name = $_POST["student_name"];
 $student_phone = $_POST["student_phone"];
 $author = $_POST["author"];
 $price = $_POST["price"];
 $quantity = $_POST["quantity"];
 //$student_phone = $_POST["student_phone"];

 for($count = 0; $count < count($student_name); $count++)
 {
  $query .= "
  INSERT INTO grade1 (bookimage,grade,bookname,author,price,quantity,status)
  VALUES ('default.jpg','".$student_name[$count]."','".$student_phone[$count]."','".$author[$count]."','".$price[$count]."','".$quantity[$count]."','Available');
  
  ";
 }
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>