<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//something was posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if(!empty($user_name) && !empty($password))
	{
		//read from db
		$query = "select * from users where user_name = '$user_name' limit 1";
		$result = mysqli_query($con, $query);

		if($result)
		{
			if($result && mysqli_num_rows($result)>0)
			{
				$user_data = mysqli_fetch_assoc($result);

				if($user_data['password'] === $password)
				{
					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: index.php");
					die;
				}
			}
		}
		echo "incorrect username or password";
	}else{
		echo "Please enter valid details";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signing In to Shopocus</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
</head>
<body>
	<br>
	<main style="text-align: center; width: 70%; margin-left: 15%; margin-top: 5%; margin-bottom: 0%;">
	<div class="card text-center">
		<div class="card-header">
			<ul class="nav nav-pills card-header-pills">
				<li class="nav-item">
					<a class="nav-link" href="signup.php">Sign Up</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#">Sign In</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<img id="title-logo" src="./logo.png">
			<br><br>
			<h5 class="card-title">Signing In</h5>
			<form method="post">
			<input type="email" placeholder="Your email" name="user_name" required>
			<br><br>
			<input type="password" placeholder="Your password" name="password" required>
			<br><br>
			<button type="submit">Sign In</button>
		</form>
		</div>
	</div>
	</main>
	<footer></footer>
</body>
</html>
