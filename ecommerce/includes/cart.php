<?php
session_start(); 
function get_info() {
  global $conn;
  $user_fetch_sql = "SELECT * FROM cart";
  $user_fetch_stm = mysqli_prepare($conn, $user_fetch_sql);
  mysqli_stmt_execute($user_fetch_stm);
  $result = mysqli_stmt_get_result($user_fetch_stm);
  return (mysqli_fetch_all($result, MYSQLI_ASSOC));
}

function find_pic($item)
{
  if ($item == 'postera')
    return('http://rs609.pbsrc.com/albums/tt177/TheBigMatt90/Demotivational%20Posters/SoccerPlayers-demotivational-poster.png~c200');
  else if ($item == 'posterb')
    return("https://images.cdn3.stockunlimited.net/clipart/american-football-poster-design_1491289.jpg");
  else if ($item == 'posterc')
    return("https://images.lookhuman.com/render/thumbnail/4640068224064000/poster8x-whi-z1-t-hockey-love.png");
  else if ($item == 'hat')
    return("https://images.eastbay.com/pi/47143021/large/jordan-floppy-strapback-cap");
  else if ($item == 'boots')
    return("https://www.keeperstop.com/data/catalog/products/images/395/200_200/61-306.png");
  else if ($item == 'jersey')
    return ("http://www.velobikes.co.uk/images/foxripleywomensjersey,fuchsia.png?height=200&width=200");
  else if ($item == 'baseball')
    return("http://www.freepngimg.com/thumb/baseball/3-2-baseball-png-picture-thumb.png");
  else if ($item == 'basketball')
    return("http://www.freepngimg.com/thumb/basketball/2-basketball-ball-png-image-thumb.png");
  else if($item == 'soccerball')
    return("http://www.freepngimg.com/thumb/football/36635-3-football-soccer-ball-thumb.png");

}
global $conn;
$user   = 'root';
$password   = 'root';
$db     = 'rush00';
$host     = 'localhost';
$port     =  3306;

$conn = mysqli_connect(
  $host,
  $user,
  $password,
  $db,
  $port
);
if (!$conn)
  die("Connection failed: " . mysqli_connect_error());

  $user_fetch_sql = "SELECT COUNT(item) as count FROM cart";
  $user_fetch_stm = mysqli_prepare($conn, $user_fetch_sql);
  mysqli_stmt_execute($user_fetch_stm);
  $result = mysqli_stmt_get_result($user_fetch_stm);
  $x = mysqli_fetch_all($result, MYSQLI_ASSOC);

$all = get_info();

$sum = 0;
foreach ($all as $tmp)
{
  $sum = $sum + (int)$tmp['price'] * (int)$tmp['count'];
}






?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="../styles/carts.css" media="all" />
</head>
<body>
	<div class="main_wrapper">
		<div class="header_wrapper">
			<img id="logo" src="https://www.flagshipcompany.com/wp-content/uploads/2016/05/e-commerce-integration-header-image.png">
		</div>
	</div>	
	<div class="menubar">
		<ul id="menu">
			<li><a href="../index.php">Home</a></li>
			<li><a href="cart.php">Cart</a></li>
<li><a href="../admin/admin.html">Admin</a></li>
	     <?php if (isset($_SESSION['who'])) { echo '
      <li><a href="../logout.php">Logout</a></li>';} ?>


        <div id="form"><?php if (!(isset($_SESSION['who']))) { echo '<form  action="../login.php" method="post">
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
          <a href="signup.php"><button type="button">Sign up</button></a>
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
					<li><a href="balls.php">Balls</a></li>
					<li><a href="clothes.php">Clothes</a></li>
					<li><a href="posters.php">Posters</a></li>
				</ul>
		</div>	
		<div id="content_area">
			 <div id="w">
    <header id="title">
      <h1>Shopping Cart</h1>
    </header>
    <div id="page">
      
      <table id="cart">
        <thead>
          <tr>
            <th class="first">Photo</th>
            <th class="second">Qty</th>
            <th class="third">Product</th>
            <th class="fourth">Price</th>
            <th class="fifth"></th>
          </tr>
        </thead>
        <tbody>
          <?php
            global $conn;
         

$arr = get_info();
foreach ($arr as $tmp)
{





$pic = find_pic($tmp['item']);
echo '         <tr class="">
            <td><img src="'.$pic.'" class="thumb"></td>
            <td>' . $tmp["count"] . '</td>
            <td>'.$tmp['item'].'</td>
            <td>'.$tmp['price'].'</td>
            <td><form action="delete.php" method ="post" ><button type="submit" name="del" value="'.$tmp["item"].'" method="post" >Del</button></form></td>
          </tr>';
}

          ?>

          <tr class="totalprice">
            <td class="light">Total:</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2"><span class="thick"><?php echo $sum; ?></span></td>
          </tr>
          
          <tr class="checkoutrow">
            <td colspan="5" class="checkout"><a href="../checkout.php"><button type="button">Check out now</button></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


	</div>
	










</body>
</html>
