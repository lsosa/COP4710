<?php

/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['user_priv'] != 1)
{
    $message = 'You must be logged in or super admin to view this page';
	header('Location: /');
}
?>

<?php include_once("header.php"); ?>

	<div id="page">
		<br><br><center><div class="logo"><a href="index.php" style="text-decoration: none; color: #333333;">Create University Profile</a></div></center>

		<center><p class="body">
			<form>
				<ul>
					<h3> Education </h3>
						<li>
							University name:
							<br>
							<input type="text" name="" value="">
						</li>
				<br>
						<li>
							Location:
							<br>
							<input type="text" name="" value="">
						</li>
				<br>
						<li>
							Description:
							<br>
							<input type="text" name="" value="">
						</li>
				<br>
						<li>
							Number of Students:
							<br>
							<input type="number" name="" value="">
						</li>
				<br>
						<li>
							Pictures:
							<br>
							<input type="file" name="pic" id="pic"><br><br>
							<input type="submit" value="Submit">
						</li>
			</form>
		</p>
	</div>
</body>

<?php include_once("footer.php"); ?>