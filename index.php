<?php
	$error = "";
        
	if (array_key_exists("submit", $_POST)) {
		$link = mysqli_connect("host", "user", "password", "database");

		if (mysqli_connect_error()) {
			die ("Database Connection Error");
		}

		if (!$_POST['email']) {
			$error .= "An email adress is required.";
		} else {
			$query = "SELECT id FROM users WHERE email = '".$_POST['email']."' LIMIT 1";
			$result = mysqli_query($link, $query);

			if (mysqli_num_rows($result) > 0) {
				header("Location: ../dejavu.php");;
			} else {
				$query = "INSERT INTO users (email, dateSubs) VALUES ('".$_POST['email']."', NOW())";
				if (!mysqli_query($link, $query)) {
					header("Location: ../error.php");
				} else {
					header("Location: ../subscribed.php");
				}
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Four Cylinder Studio</title>
</head>

<body>
	<header>
	<div class="menu-btn">
			<div class="btn-line"></div>
			<div class="btn-line"></div>
			<div class="btn-line"></div>
		</div>
		<div class="menu-banner">
			<h2 class="banner-text">FOUR CYLINDER <span class="banner-secondary">STUDIO</span></h2>
			<nav class="navbar">
				<div class="navbar-logo">
					<img src="/img/4_cylinder_logo_mid.png" alt="4CylinderLogo">
				</div>
				<div class="navbar-items">
					<ul class="navbar-menu">
						<li class="navbar-item current">
							<a href="index.php" class="nav-link">Home</a>
						</li>
						<li class="navbar-item">
							<a href="/manifesto.php" class="nav-link">Manifesto</a>
						</li>
						<!-- <li class="nav-item">
									<a href="games.php" class="nav-link">The Game</a>
								</li> -->
						<li class="navbar-item">
							<a href="/blog/posts.php" class="nav-link">Blog</a>
						</li>
						<li class="navbar-item">
							<a href="contact.php" class="nav-link">Contact</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<nav class="menu">
			<div class="menu-branding">
				<img src="/img/4_cylinder_logo_mid.png" class="logo" alt="4Cylinder Logo">
			</div>
			<ul class="menu-nav">
				<li class="nav-item current">
					<a href="index.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="manifesto.php" class="nav-link">Manifesto</a>
				</li>
				<!-- <li class="nav-item">
					<a href="games.php" class="nav-link">The Game</a>
				</li> -->
				<li class="nav-item">
					<a href="blog/posts.php" class="nav-link">Blog</a>
				</li>
				<li class="nav-item">
					<a href="contact.php" class="nav-link">Contact</a>
				</li>
			</ul>
		</nav>
	</header>

	<main id="home">
		<section class="overview top-section">
			<div class="main-logo top">
				<img src="/img/4_cylinder_thumb_mid.png" alt="There should have been a cool logo">
			</div>
			<h2 class="sm-heading">Welcome To The World Of</h2>
			<h1 class="lg-heading">FOUR CYLINDER <span class="weak">STUDIO</span></h1>
			<h2 class="sm-heading">We are an independent game studio that explores new mechanics and visual styles.</h2>
			<h2 class="bold">The goal is the unconventional!</h2>

			<input class="button mnfst" type="button" value="READ THE MANIFESTO" onclick="window.location.href='manifesto.php'" />

			<!-- <button type="button" class="btn-manifest">Read The Manifesto</button> -->
		</section>

		<section class="game bg-dark">
			<h1>INTRODUCING OUR GAME</h1>
			<div class="game-logo">
				<img src="/img/games/game1.png" alt="Speculator's Playground">
			</div>
			<div class="game-overview">
				<h2>Speculator's Playground is a forex trading game with basic RPG elements. Your goal is to grow your capital by making long and short trading on various markets. Use your intuition, make quick decisions, build your prestige, dominate the market. Remember, fortune favors the bold!</h2>
				<h1><span class="weak">SUBSCRIBE THE NEWSLETTER</span></h1>
				<div class="error"><? echo $error.$successMessage; ?></div>
				<form method="post" class="subs-newsletter">
					<fieldset>
						<input id="email" type="email" name="email" placeholder="your email here" required>
					</fieldset>
					<button class="button subs" type="submit" name="submit">SUBSCRIBE</button>
				</form>
			</div>
		</section>

		<section class="contact bg-light">
			<h1>JOIN THE COMMUNITY</h1>
			<div class="icons">
				<a href="https://twitter.com/CylinderFour" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
				<a href="https://www.instagram.com/fourcylinderstudio/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
				<a href="https://www.facebook.com/fourcylinderstudio" target="_blank"><i class="fab fa-facebook-f fa-2x"></i></a>
			</div>

			<div class="contact-mail">
				<h1><span class="weak">EMAIL US</span></h1>
				<h2>contact@fourcylinderstudio.com</h2>
			</div>
		</section>
	</main>

	<footer class="bg-dark">
		<h3 class="txt-footer">&copy; 2018 Four Cylinder Studio</h3>
	</footer>

	<script src="js/main.js"></script>
</body>

</html>