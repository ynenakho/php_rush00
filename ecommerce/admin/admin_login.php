<?php

session_start();

if (!$_POST['login'] || !$_POST['password'])
	header("Location: ../admin/admin.html");


$secret_admin_login = "admin";
$secret_admin_password = "pass";

$user = $_POST['login'];
$password = $_POST['passwd'];

if ($user === $secret_admin_login && $password === $secret_admin_password)
{
	$_SESSION['adminlogged'] = true;
	$_SESSION['db_name'] = 'rush00';
	header("Location: ../admin/main_admin.php");
}

?>
