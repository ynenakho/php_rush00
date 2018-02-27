<?php
session_start();
function get_user_info(string $login) 
{
	global $conn;
	$user_fetch_sql = 'SELECT * FROM user_info WHERE login = ?';
	$user_fetch_stm = mysqli_prepare($conn, $user_fetch_sql);
	mysqli_stmt_bind_param($user_fetch_stm, "s", $login);
	mysqli_stmt_execute($user_fetch_stm);
	$result = mysqli_stmt_get_result($user_fetch_stm);
	return mysqli_fetch_array($result, MYSQLI_ASSOC);
}
$user		= 'root';
$password 	= 'root';
$db 		= 'rush00';
$host 		= 'localhost';
$port 		= 3306;

$conn = mysqli_connect(
	$host,
	$user,
	$password,
	$db,
	$port
);
if (isset($_POST['login']) && isset($_POST['passwd']) && (isset($_POST['create']) && $_POST["create"] === "Sign Up"))
{
	$passwd = hash('sha512', $_POST['passwd']);
	$login = $_POST['login'];
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	if (!$table = get_user_info($login))
	{
			$_SESSION['wat'] = "Ok";
		$sql = "INSERT INTO `user_info`(`id`, `login`, `passwd`) VALUES (1,'$login','$passwd')";
		if (!mysqli_query($conn, $sql))
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			header("Location: index.php");
	}
	else
	{
		$_SESSION['wat'] = "?";
			header("Location: ".$_SERVER['HTTP_REFERER']);
	}


}
else
	{
		$_SESSION['wat'] = "?";
			header("Location: ".$_SERVER['HTTP_REFERER']);
	}
?>	
	
