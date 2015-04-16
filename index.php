<?php

/*** begin our session ***/
session_start();

?>

<?php include_once("header.php"); ?>

	<div id="page">
		<br><br><center><div class="logo"><a href="index.php" style="text-decoration: none; color: #333333;">College Event Website</a></div></center>		

		<br>
		<?php if(!isset($_SESSION['user_id'])): ?>
		
			<center><p class="body">
				<h3>Login Below</h3>
				<form action="login_submit.php" method="post">
					<fieldset>
						<p>
							<label for="username">Username:</label>
							<input type="text" id="username" name="username" value="" maxlength="20" />
						</p>
						<p>
							<label for="password">Password:</label>
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
			
			<style>
				#navbar 
					{
					width: 550px;
					height: 35px;
					font-size: 16px;
					font-family: Tahoma, Geneva, sans-serif;
					font-weight: bold;
					text-align: center;
					text-shadow: 1px 2px 3px #333333;
					background-color: #8AD9FF;
					border-radius: 8px;
					text-decoration: none;
					}
			</style>
				
				<?php if(isset($_SESSION['user_priv']) && $_SESSION['user_priv'] == 3): ?>
					<div id="navbar">
						<h4><a href="logout.php">Logout</a> &nbsp&nbsp&nbsp <a href="/">Request New RSO</a></h4>
					</div>
				<?php elseif (isset($_SESSION['user_priv']) && $_SESSION['user_priv'] == 2): ?>
					<div id="navbar">
					<h4><a href="logout.php">Logout</a> &nbsp&nbsp&nbsp <a href="/">Host Event</a></h4>
					</div>
				<?php elseif (isset($_SESSION['user_priv']) && $_SESSION['user_priv'] == 1): ?>
					<div id="navbar">
					<h4><a href="logout.php">Logout</a> &nbsp&nbsp&nbsp <a href="create_university_profile.php">Create University Profile</a> &nbsp&nbsp&nbsp <a href="/">Approve Events</a></h4>
					</div>
				<?php else: ?>
					
					<h4><a href="logout.php">Logout</a>, Error: User privilege not set! </h4>
					
				<?php endif; ?>
				
			</p>		
		
		<?php endif; ?>
		
		<br>
		
	</div>
</body>

<?php include_once("footer.php"); ?>