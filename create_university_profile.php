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
		
			<style>
			  ul#university_signup
				{
					list-style-type: none;
				}
			</style>
			
			<form>
				<h3> Education </h3>
				
				<table>
					<tr><td> University name: </td>
					<td> <input type="text" name="" value=""> </td></tr>
					
					<tr><td> Location:</td>
					<td> <input type="text" name="" value=""> </td></tr>
					
					<tr><td> Description: </td>
					<td> <input type="text" name="" value=""> </td></tr>

					<tr><td> Number of Students: </td>
					<td> <input type="number" name="" value=""> </td></tr>
					
					<tr><td> Pictures: </td>
					<td> <input type="file" name="pic" id="pic"><br><br> </td></tr>
					</form>
					<form method="get" action="request_submitted.php">		
					<tr><td><input type="submit" value="Submit"> </td></tr>
					</form>
				</table>
			
		</p>
	</div>
</body>

<?php include_once("footer.php"); ?>