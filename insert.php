<?php 
	$con = mysqli_connect('127.0.0.1','root','','DoDoPizza');
	$query = mysqli_query($con, "SELECT * FROM catalog WHERE id='{$_GET['id']}' ");
	$stroka = $query ->fetch_assoc();
	$img = $stroka['img'];
	$name = $stroka['name'];
	$price = $stroka['price'];
	$query_texts = "INSERT INTO basket (img, name, price) 
        VALUES ('{$img}','{$name}','{$price}')";
    $query_new = mysqli_query($con, $query_texts);

	header("Location: index.php"); 
 ?>