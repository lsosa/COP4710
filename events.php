<?php

/*** begin our session ***/
session_start();


function listEventInfo() {
	
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
        $stmt = $dbh->prepare("SELECT name, description, event_date, contact_phone, contact_email, event_id FROM events WHERE event_id = :event_id");        

        $stmt->bindParam(':event_id', $_GET['event_id'], PDO::PARAM_INT);
		
		/*** execute the prepared statement ***/
        $stmt->execute();
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		echo "<h3>Name: " . $result['name'] . "</h3>";
		echo "<h3>Description: " . $result['description'] . "</h3>";
		echo "<h3>Date: " . $result['event_date'] . "</h3>";
		echo "<h3>Contact Phone: " . $result['contact_phone'] . "</h3>";
		echo "<h3>Contact Email: " . $result['contact_email'] . "</h3>";
		
		//echo $row['name'] . "\t" . $row['description'] . "\t" . $row['event_date'] . "\t" . $row['contact_phone'] . "\t" . $row['contact_email'] . "<br><br>";				
		
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

function listCommentsAndRatings() {
	
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
        $stmt = $dbh->prepare("SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = :event_id");        

        $stmt->bindParam(':event_id', $_GET['event_id'], PDO::PARAM_INT);
		
		/*** execute the prepared statement ***/
        $stmt->execute();
		
		//$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		echo "<h3>Comments: </h3>";
		
		while($result = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo "<h3>" . $result['text'] . "\t\t\t" . "Rating: " .$result['rating'] . "</h3>";
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

		<?php 
		
			listEventInfo();
			echo "<br>";
			listCommentsAndRatings();
		
		?>
		
		<iframe
			width="600"
			height="450"
			frameborder="0" style="border:0"
			src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA-bycgCKodNWMCGD9CUspU9ZC7aGxmHbk
			&q=University of Central Florida
			&attribution_source=Google+Maps+Embed+API
			&attribution_web_url=http://www.butchartgardens.com/
			&attribution_ios_deep_link_id=comgooglemaps://?daddr=Butchart+Gardens+Victoria+BC">
		</iframe>
		
		<a class="twitter-share-button"	href="https://twitter.com/share">Tweet</a>
		<script>
			window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
		</script>
		
		<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
		
	</div>
</body>

<?php include_once("footer.php"); ?>