<?php

/*** begin our session ***/
session_start();

/*** set a form token ***/
$form_token = md5( uniqid('auth', true) );

/*** set the session form token ***/
$_SESSION['form_token'] = $form_token;
?>

<?php include_once("header.php"); ?>
	
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
						<label for="firstname">First Name</label>
						<input type="text" id="firstname" name="firstname" value="" maxlength="20" />
					</p>
					<p>
						<label for="lastname">Last Name</label>
						<input type="text" id="lastname" name="lastname" value="" maxlength="20" />
					</p>
					<p>
						<label for="email">Email</label>
						<input type="text" id="email" name="email" value="" maxlength="100" />
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
		
			
		</p>
		
	</div>
</body>

<?php include_once("footer.php"); ?>