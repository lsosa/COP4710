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
		<?php session_start(); if( !isset( $_SESSION['user_id'] ) ): ?>
		
			<center><p class="body">
				<h3>Login Below</h3>
				<form action="login_submit.php" method="post">
					<fieldset>
						<p>
							<label for="phpro_username">Username</label>
							<input type="text" id="phpro_username" name="phpro_username" value="" maxlength="20" />
						</p>
						<p>
							<label for="phpro_password">Password</label>
							<input type="password" id="phpro_password" name="phpro_password" value="" maxlength="20" />
						</p>
						<p>
							<input type="submit" value="Login" />
						</p>
					</fieldset>
				</form>
			</p></center>
			
		<?php else: ?>
		
			<center><p class="body">
		
				<h4><a href="logout.php">Logout</a>, <a href="members.php">Members Area</a></h4>
			</p>			
		
		<?php endif; ?>
		
		<br>
		
		<center><p class="body">
		
			<h3>Click <a href="adduser.php">Here</a> to register</h3>
		</p>
		
	</div>
</body>
</html>