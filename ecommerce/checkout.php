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
if (isset($_SESSION['who']))
{
	$tmp = 'tmpuser';
	$sql = "DELETE FROM cart WHERE login=?";
	$stm = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stm, "s", $_SESSION['who']);
	mysqli_stmt_execute($stm);
	$sql = "DELETE FROM cart WHERE login=?";
	$stm = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stm, "s", $tmp);
	mysqli_stmt_execute($stm);
}
?>

<!DOCTYPE html>

<html>
<head>
	<title>Sports Ball Store</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css" media="all" />

</head>
<body>
	<div class="main_wrapper">
		<div class="header_wrapper">
			<img id="logo" src="https://www.flagshipcompany.com/wp-content/uploads/2016/05/e-commerce-integration-header-image.png">
		</div>
	</div>	
	<div class="menubar">
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="includes/cart.php">Cart</a></li>
						<li><a href="admin/admin.html">Admin</a></li>
			<?php if (isset($_SESSION['who'])) { echo '
			<li><a href="logout.php">Logout</button></a></li>';} ?>


				<div id="form"><?php if (!(isset($_SESSION['who']))) { echo '<form  action="login.php" method="post">
    				Username:
    				<input type="text" name="login" value="" />'; 
    				if ($_SESSION['wat'] == 'Ok') { echo 'Created'; }
    				else if ($_SESSION['wat'] == '?') { echo '?'; }
    				
    				echo '
					<br />
					Password:
					<input type="password" name="passwd" value="" />
					<input type="submit" name="submit" value="Sign In" />
					<br>
					<a href="includes/signup.php"><button type="button">Sign up</button></a>
										</div>'; } else { echo "<h1>Welcome ". $_SESSION['who']. "</h1>";}?>	
				</form>
			</div>
		</ul>
	</div>
	<div class ="content_wrapper">
		<div id="sidebar">
			<div id="sidebar_title">
				Categories
			</div>
				<ul id="cats">
					<li><a href="includes/balls.php">Balls</a></li>
					<li><a href="includes/clothes.php">Clothes</a></li>
					<li><a href="includes/posters.php">Posters</a></li>
				</ul>
		</div>	
		<div id="content_area">
			<div>
				<h1><?php if (!isset($_SESSION['who'])) {echo "Please log in.";} else {echo "Thank you for shopping with us.";}  ?></h1>

				
			</div>
		</div>
	</div>
</body>
</html>
