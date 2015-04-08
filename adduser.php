<?php

/*** begin our session ***/
session_start();

/*** set a form token ***/
$form_token = md5( uniqid('auth', true) );

/*** set the session form token ***/
$_SESSION['form_token'] = $form_token;
?>

<!doctype html>
<html>
<head>
	<title>Register</title>
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
		
		<center><p class="body">
			<h3>Registration Form</h3>
			<form action="adduser_submit.php" method="post">
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
						<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
						<input type="submit" value="Register" />
					</p>
				</fieldset>
			</form>
		</p></center>
		
		<br>
		
		<center><p class="body">
		
			<h4>***You will be automatically logged in once you register if registration was successful.***</h4>
		</p>
		
	</div>
</body>
</html>