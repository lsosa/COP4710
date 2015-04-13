<?php

/*** begin our session ***/
session_start();

?>

<!doctype html>
<html>
<head>
	<title>College Event Website</title>
	<meta name="description" content="Project for Database Management Systems COP 4710" />
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Just+Me+Again+Down+Here" />
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Amaranth" />
	<style>
		#page {
			max-width: 800px;
			margin: 0px auto;
			padding: 0px 40px;
		}
		.logo { margin-bottom: 40px; font-family: Just Me Again Down Here; font-size: 50px; font-style: normal; font-variant: normal; font-weight: 500; line-height: 26.4px; }
		p.body { font-family: Amaranth; font-size: 20px; font-style: normal; font-variant: normal; font-weight: 300; line-height: 35px; }
		.paragraph {
			font-size: 17pt;
		}
		.footer {
			text-align: center;
			max-width: 646px;
			margin: 0px auto;
		}
		body {
			font-family: "open sans", sans-serif;
			color: #333333;
		}
	</style>
</head>

<body>	
	<div id="page">
		<br><br><center><div class="logo"><a href="index.php" style="text-decoration: none; color: #333333;">College Event Website</a></div></center>		

		<br>
		<?php if(!isset($_SESSION['user_id'])): ?>
		
			<center><p class="body">
				<h3>Login Below</h3>
				<form action="login_submit.php" method="post">
					<fieldset>
						<p>
							<label for="username">Username</label>
							<input type="text" id="username" name="username" value="" maxlength="20" />
						</p>
						<p>
							<label for="password">Password</label>
							<input type="password" id="password" name="password" value="" maxlength="20" />
						</p>
						<p>
							<input type="submit" value="Login" />
						</p>
					</fieldset>
				</form>
			</p></center>
			
			<center><p class="body">
		
				<h3>Click <a href="adduser.php">Here</a> to register</h3>
			
			</p>
			
		<?php else: ?>
		
			<center><p class="body">
				
				<?php if(isset($_SESSION['user_priv']) && $_SESSION['user_priv'] == 3): ?>
				
					<h4><a href="logout.php">Logout</a>, <a href="/">Request New RSO</a></h4>
				
				<?php elseif (isset($_SESSION['user_priv']) && $_SESSION['user_priv'] == 2): ?>
				
					<h4><a href="logout.php">Logout</a>, <a href="/">Host Event</a></h4>
				
				<?php elseif (isset($_SESSION['user_priv']) && $_SESSION['user_priv'] == 1): ?>
				
					<h4><a href="logout.php">Logout</a>, <a href="/">Create University Profile</a>, <a href="/">Aprove Events</a></h4>
					
				<?php else: ?>
					
					<h4><a href="logout.php">Logout</a>, Error: User privilege not set! </h4>
					
				<?php endif; ?>
				
			</p>		
		
		<?php endif; ?>
		
		<br>
		
	</div>
</body>
</html>