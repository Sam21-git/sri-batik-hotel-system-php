<?php
	$hostname = "localhost";
	$user = "root";
	$password = "";
	$dbname = "hotelsribatik";
	
	$connect = mysqli_connect($hostname, $user, $password, $dbname) OR DIE ("Connection failed!");
	
?>