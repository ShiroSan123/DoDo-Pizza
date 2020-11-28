<?php 
	$con = mysqli_connect('127.0.0.1','root','','DoDoPizza');
	mysqli_query($con,"TRUNCATE TABLE basket");

	header("Location: index.php"); 
 ?>