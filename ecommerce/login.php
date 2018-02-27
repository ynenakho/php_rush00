<?php
session_start();
		function get_user_info(string $login) {
			global $conn;
        $user_fetch_sql = 'SELECT * FROM user_info WHERE login = ?';
        $user_fetch_stm = mysqli_prepare($conn, $user_fetch_sql);
        mysqli_stmt_bind_param($user_fetch_stm, "s", $login);
        mysqli_stmt_execute($user_fetch_stm);
        $result = mysqli_stmt_get_result($user_fetch_stm);
		return mysqli_fetch_array($result, MYSQLI_ASSOC);
		}
function ft_isset(string $needle, array $haystack) {
	if ($needle === NULL || $haystack === NULL)
		return false;
	foreach ($haystack as $key => $value) {
		if ($needle === $key && $haystack[$needle])
			return true;
	}
	return false;
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
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
if ((ft_isset('login', $_POST) && ft_isset('passwd', $_POST) && (ft_isset('submit', $_POST) && $_POST["submit"] === 'Sign In')))
{
	$passwd = hash('sha512', $_POST["passwd"]);
	$login = $_POST["login"];

	if ($table = get_user_info($login))
	{
		if ($table['login'] == $login && $table['passwd'] == $passwd)
		{
			$_SESSION['who'] = $table['login'];
			header("Location: ".$_SERVER['HTTP_REFERER']);

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
}
else
	{	
		$_SESSION['wat'] = "?";
			header("Location: ".$_SERVER['HTTP_REFERER']);
	}

?>
