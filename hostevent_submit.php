<?php
/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
	$time = filter_var($_POST['time'], FILTER_SANITIZE_STRING);
	$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
	
    
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

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES (:name, 'Event', :description, :time, :date, :location, 1, 0, 0, :phone, :email)");

        /*** bind the parameters ***/
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
		$stmt->bindParam(':time', $time, PDO::PARAM_STR);
		$stmt->bindParam(':date', $date, PDO::PARAM_STR);
		$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':location', $location, PDO::PARAM_STR);
		

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** if all is done, say thanks ***/
        $message = 'New user added';
		
		header('Location: /');
    }
    catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'Username already exists';
			header('Location: /');
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = $e;
			header('Location: /');
        }
    }
}
else
{
	header('location: /');
}

?>