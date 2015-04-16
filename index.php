<?php

/*** begin our session ***/
session_start();


function listPublicEvents() {
	
	/*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = 'root';

    /*** database name ***/
    $mysql_dbname = 'cop4710';
	
	try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT name, description, event_date, contact_phone, contact_email, event_id FROM events WHERE priv = 0");        

        /*** execute the prepared statement ***/
        $stmt->execute();
		
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$event_id = $row['event_id'];
			echo "<a href='events.php?event_id=$event_id'>" . $row['name'] . "</a>".  "\t" . $row['description'] . "\t" . $row['event_date'] . "\t" . $row['contact_phone'] . "\t" . $row['contact_email'] . "<br><br>";
			//$data = $row['name'] . "\t" . $row['description'] . "\n";
			//print $data;
		}
		
		$stmt = null;
		
        /*** check for a result ***/
        //$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		//$name = $result["name"];
		//$user_id = $row["user_id"];
		//$user_priv = $row["priv"];

        /*** if we have no result then fail boat ***/
        // if($name == false)
        // {
                // echo 'No public events found';
				//header('Location: /');
        // }
        // /*** if we do have a result, all is well ***/
        // else
        // {            
			// foreach($result as $output)
			// {
				// echo output[0];
				// echo output[1];
			// }				
        // }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        echo 'We are unable to process your request. Please try again later';
    }	
	
}

function listUniversityEvents() {
	
	/*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = 'root';

    /*** database name ***/
    $mysql_dbname = 'cop4710';
	
	try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT e.name, e.description, e.event_time, e.location, e.contact_email, e.event_id FROM events e, universities u, users s WHERE e.univ_id = u.univ_id AND e.priv = 1 AND s.user_id = :user_id AND s.univ_id = u.univ_id");        

        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
		
		/*** execute the prepared statement ***/
        $stmt->execute();
		
		//$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$event_id = $row['event_id'];
			echo "<a href='events.php?event_id=$event_id'>". $row['name'] . "</a>". "\t" . $row['description'] . "\t" . $row['event_time'] . "\t" . $row['location'] . "\t" . $row['contact_email'] . "<br><br>";
			//$data = $row['name'] . "\t" . $row['description'] . "\n";
			//print $data;
		}
		
		$stmt = null;
		
        /*** check for a result ***/
        //$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		//$name = $result["name"];
		//$user_id = $row["user_id"];
		//$user_priv = $row["priv"];

        /*** if we have no result then fail boat ***/
        // if($name == false)
        // {
                // echo 'No public events found';
				//header('Location: /');
        // }
        // /*** if we do have a result, all is well ***/
        // else
        // {            
			// foreach($result as $output)
			// {
				// echo output[0];
				// echo output[1];
			// }				
        // }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        echo 'We are unable to process your request. Please try again later';
    }	
	
}

function listRSOEvents() {
	
	/*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = 'root';

    /*** database name ***/
    $mysql_dbname = 'cop4710';
	
	try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT e.name, e.description, e.event_time, e.location, e.contact_email, e.event_id FROM events e, users s WHERE s.RSO = e.RSO AND s.user_id = :user_id AND e.priv = 2");        

        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
		
		/*** execute the prepared statement ***/
        $stmt->execute();
		
		//$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$event_id = $row['event_id'];
			echo "<a href='events.php?event_id=$event_id'>" . $row['name'] . "</a>" . "\t" . $row['description'] . "\t" . $row['event_time'] . "\t" . $row['location'] . "\t" . $row['contact_email'] . "<br><br>";
			//$data = $row['name'] . "\t" . $row['description'] . "\n";
			//print $data;
		}
		
		$stmt = null;
		
        /*** check for a result ***/
        //$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		//$name = $result["name"];
		//$user_id = $row["user_id"];
		//$user_priv = $row["priv"];

        /*** if we have no result then fail boat ***/
        // if($name == false)
        // {
                // echo 'No public events found';
				//header('Location: /');
        // }
        // /*** if we do have a result, all is well ***/
        // else
        // {            
			// foreach($result as $output)
			// {
				// echo output[0];
				// echo output[1];
			// }				
        // }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        echo 'We are unable to process your request. Please try again later';
    }	
	
}

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
					<h4><a href="logout.php">Logout</a> &nbsp&nbsp&nbsp <a href="HostEvents.php">Host Event</a></h4>
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
		
		<!-- show public event -->
		<center><p class="body"> Public Events 
		
		<br>
		<br>
		
			<?php
			
				if(isset($_SESSION['user_id']) && $_SESSION['user_priv'] == 3)
				{
					listPublicEvents();
				}
				elseif(!isset($_SESSION['user_id']))
				{
					listPublicEvents();
				}
				
			?>
		</p>
		
		<center><p class="body"> Universities Events
		
		<br>
		
			<?php 
			
				listUniversityEvents();		
				//echo 'hello'

			?>
			
		</p>
		
		<center><p class="body"> RSO Events
		
		<br>
		
			<?php 
			
				listRSOEvents();		
				//echo 'hello'

			?>
			
		</p>
		
		<br>
		
	</div>
</body>

<?php include_once("footer.php"); ?>