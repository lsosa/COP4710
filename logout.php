<?php
// Begin the session
session_start();

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();
?>
<html>
<head>
<title>Logged Out</title>
<meta http-equiv="refresh" content="3;url=index.php" />
</head>

<body>
	<h2>You are now logged out. You will be redirected to the home page. Click <a href="index.php">Here</a> if you were not redirected.</h2>
</body>
</html>