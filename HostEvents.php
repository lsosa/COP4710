<?php include('header.php'); ?>

<div id="page">


		<center><p class="body">
			
			<form action="hostevent_submit.php" method="post">
				<h3> Create Event </h3>
				
				<table>
					<tr><td> Event Name </td>
					<td> <input type="text" name="name" value=""> </td></tr>
					
					<tr><td> Description:</td>
					<td> <input type="text" name="description" value=""> </td></tr>
					
					<tr><td> Event Time: </td>
					<td> <input type="text" name="time" value=""> </td></tr>

					<tr><td> Event Date: </td>
					<td> <input type="text" name="date" value=""> </td></tr>					
					
					<td> Location: </td>
					<td> <input type="text" name="location" value=""> </td></tr>
					
					<tr><td> Contact Phone: </td>
					<td> <input type="text" name="phone" value=""> </td></tr>
					
					<tr><td> Contact Email: </td>
					<td> <input type="text" name="email" value=""> </td></tr>
					
					<tr><td><input type="submit" value="Submit"> </td></tr>
				</table>
			</form>
		</p>
	</div>

<?php include('footer.php'); ?>