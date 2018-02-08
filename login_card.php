<?php 
require_once "config.php";

if (isset($_SESSION['access_token'])) {
    header('Location: index.php');
    exit();
}

$loginURL = $gClient->createAuthUrl();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style_Login.css">
	</head> 


	<body>
		<div id="login-box">
			<div class="left">

				<h2>Log In</h2>
				<form action="db_login.php" method="post">
					
					<input type="text" name="email" placeholder="E-mail" />
					<input type="password" name="password" placeholder="Password" />
					<input type="submit" name="signup_submit" value="Log In" /><br>
					<p> No Account? <a href="signup_card.php">Signup</a></p>
					
				</form>
			</div>

			<div class="right">
		
		
			<span class="loginwith">Sign in with<br/>social network</span>

			<a href="fbconfig.php"><button class="social-signin facebook">Log in with facebook</button></a>
			
			<a href="<?php echo $loginURL ?>"><button class="social-signin google">Log in with Google+</button></a>
		</div>
		
		
		<div class="or">OR</div>
		</div>
	</body>
</html>