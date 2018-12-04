<!DOCTYPE html>
<html lang="en">

<?php
  $db = new mysqli('localhost','root','root','Members');
  if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

$sql = "CREATE TABLE IF NOT EXISTS MemberList (
	fName VARCHAR(30),
	lName VARCHAR(30),
	street VARCHAR(30),
	city VARCHAR(30),
	state VARCHAR(30),
	zip VARCHAR(30),
	phone VARCHAR(30),
	email VARCHAR(30),
	userID VARCHAR(30),
	password VARCHAR(30)
	)";

	$user = $_POST['userID'];
	$query = "SELECT * FROM MemberList WHERE userID = '$user'";
	$result = mysqli_query($db, $query);
	$rows = $result->num_rows;

	if(isset($_POST['submit']) && $rows != 0) {
		try {
				echo "<script type='text/javascript'>location.href = 'files/home.php';</script>";
			
		}
		catch(Exception $e){
				echo "<script>alert('Wrong User ID or Password. Please try again.');</script>";
		}
	}
?>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="files/icon.png">
	<link href="files/bootstrap.css" rel="stylesheet">
	<link href="files/index.css" rel="stylesheet">
	<title>Online Book Store</title>
</head>

<body class="text-center">
	<form class="form-signin" method='post'>
		<img class="logo" src="files/Parana.png">
		<h1 class="h3 mb-3 font-weight-normal"><font color="white">Please sign in</font></h1>

		<label for="inputUser" class="sr-only">User ID</label>
		<input type="text" name="userID" class="form-control" placeholder="Username" required="true" autofocus="">

		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" required="true">
		<button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">Sign in</button>

		<br>
		<a href="files/memberLogin.php">No Account? Register Here!</a>
	</form>
</body>
</html>
