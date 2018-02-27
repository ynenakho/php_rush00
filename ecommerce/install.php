<?php

$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE rush00";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

$select = "USE rush00";

$sql_user_info = "CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$sql_cart = "CREATE TABLE `cart` (
  `login` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$sql_stock = "CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";


$sql_stock_insert = "INSERT INTO `stock` (`id`, `item`, `price`, `count`) VALUES
(1, 'basketball', 20, 12),
(2, 'soccerball', 18, 7),
(3, 'baseball', 16, 9),
(4, 'jersey', 30, 7),
(5, 'boots', 35, 12),
(6, 'hat', 15, 13),
(7, 'postera', 10, 10),
(8, 'posterb', 12, 7),
(9, 'posterc', 17, 9);";

if (mysqli_query($conn, $select)
  && mysqli_query($conn, $sql_user_info)
  && mysqli_query($conn, $sql_cart)
  && mysqli_query($conn, $sql_stock)
  ) {
	  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sql_stock_insert))
  echo "Tables are populated";
else
  echo "Error populating tables";

$sql_alter_cart = "ALTER TABLE `cart`
  ADD KEY `id` (`id`);";
$sql_alter_stock = "ALTER TABLE `stock`
  ADD KEY `id` (`id`);";
$sql_alter_userinfo = "ALTER TABLE `user_info`
  ADD KEY `id` (`id`);";
$sql_increment_cart = "ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;";
$sql_increment_stock = "ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;";
$sql_increment_userinfo = "ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;";



if (mysqli_query($conn, $sql_alter_cart) && mysqli_query($conn, $sql_alter_stock)
    && mysqli_query($conn, $sql_alter_userinfo) && mysqli_query($conn, $sql_increment_userinfo)
    && mysqli_query($conn, $sql_increment_cart) && mysqli_query($conn, $sql_increment_stock))
    echo "All Good";
else
    echo "ALL Bad";

mysqli_close($conn);
?>
