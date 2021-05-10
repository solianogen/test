<?php

	$dbhost = 'localhost';
	$dbname = 'textbook';
	$dbusername = 'root';
	$dbpassword = '';

	$db = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);
	ob_start();
?>