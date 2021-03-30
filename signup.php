<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//something was posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$conf_password = $_POST['conf-password'];

	if($password != $conf_password)
	{
		echo "Passswords dont match";
		header("Location: signup.php");
		die;
	}

	if(!empty($user_name) && !empty($password))
	{
		//save to db
		$user_id = random_num(20);
		$query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
		mysqli_query($con, $query);

		header("Location: signin.php");
		die;
	}else{
		echo "Please enter valid details";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signing Up to Shopocus</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
</head>
<body>
	<br>
	<main style="text-align: center; width: 70%; margin-left: 15%; margin-top: 5%; margin-bottom: 5%">
	<div class="card text-center">
		<div class="card-header">
			<ul class="nav nav-pills card-header-pills">
				<li class="nav-item">
					<a class="nav-link active" href="#">Sign Up</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="signin.php">Sign In</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<img id="title-logo" src="./logo.png">
			<br><br>
			<h5 class="card-title">Signing Up</h5>
			<form method="post">
			<input type="email" placeholder="Your email" name="user_name" required>
			<br><br>
			<input type="password" placeholder="Your password" name="password" required>
			<br><br>
			<input type="password" placeholder="Confirm password" name="conf-password" required>
			<br><br>
			<button type="submit">Sign Up</button>
		</form>
		</div>
	</div>
	</main>
	<footer></footer>
</body>
</html>