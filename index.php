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

<?php include_once("footer.php"); ?>