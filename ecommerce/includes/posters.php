<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<title>Posters</title>
	<link rel="stylesheet" type="text/css" href="../styles/posters.css" media="all" />
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
			<li><a href="../includes/cart.php">Cart</a></li>
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
			<div class="row clearfix">
				<div class="col-1-3">
					<img src="http://rs609.pbsrc.com/albums/tt177/TheBigMatt90/Demotivational%20Posters/SoccerPlayers-demotivational-poster.png~c200">
					<br>
					<div class="titles">Soccer Poster</div>
					Price: $10.00
					<br>
					<span class="nums">

						<form action="/ecommerce/shop_cart.php" method="post">
							Quantity:
							<input type="number" name="count_posa"  min="1" max="100">
							<button type="submit" name="buy" value="ok" onclick="alert('Item(s) added to the cart')">Add to Cart</button>

						</form>
				</div>
				<div class="col-1-3">
					<img src="https://images.cdn3.stockunlimited.net/clipart/american-football-poster-design_1491289.jpg">
					<br>
					<div class="titles">American Football Poster</div>
					Price: $12.00
					<br>
					<span class="nums">
						<br>
						<form action="/ecommerce/shop_cart.php" method="post">
							Quantity:
							<input type="number" name="count_posb"  min="1" max="100">
							<button type="submit" name="buy" value="ok" onclick="alert('Item(s) added to the cart')">Add to Cart</button>

						</form>
					</span>
				</div>
				<div class="col-1-3">
					<img src="https://images.lookhuman.com/render/thumbnail/4640068224064000/poster8x-whi-z1-t-hockey-love.png">
					<br>
					<div class="titles">Hockey Love Poster</div>
					Price: $17.00
					<br>
					<span class="nums">
						<br>
						<form action="/ecommerce/shop_cart.php" method="post">
							Quantity:
							<input type="number" name="count_posc"  min="1" max="100">
							<button type="submit" name="buy" value="ok" onclick="alert('Item(s) added to the cart')">Add to Cart</button>

						</form>
					</span>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
