<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con)

?>
<!DOCTYPE html>
<html>
<head>
	<title>Shopocus</title>
</head>
<body>
	Hello <?php echo $user_data['user_name'];?>
	<br><br>
	<a href="logout.php">Logout</a>
</body>
</html>