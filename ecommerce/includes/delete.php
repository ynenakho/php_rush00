<?php
session_start();
$user		= 'root';
$password 	= 'root';
$db 		= 'rush00';
$host 		= 'localhost';
$port 		=
 3306;

$conn = mysqli_connect(
	$host,
	$user,
	$password,
	$db,
	$port
);
if (!$conn)
	die("Connection failed: " . mysqli_connect_error());

$item = $_POST['del'];
var_dump($item);
$sql = "DELETE FROM cart WHERE item = '$item'";

var_dump($sql);
mysqli_query($conn, $sql);
header("Location: cart.php");

?>