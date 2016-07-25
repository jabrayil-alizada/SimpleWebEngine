<?php

$name = $_POST['name'];
$pass = $_POST['pass'];
$email = $_POST['email'];


$catName = $_POST['catName'];

require_once('connect.php');

// $sql = "INSERT INTO users (name,pass,email)
// 		VALUES ('".$name."','".$pass."','".$email."')";

$sql = "INSERT INTO news_cat (cat_name)
		VALUES ('".$catName."')";	

if($conn->query($sql) === TRUE){
	echo "New record created successfully";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>