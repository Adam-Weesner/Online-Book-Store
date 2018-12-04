<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="icon.png">
	<link href="bootstrap.css" rel="stylesheet">
	<link href="memberLogin.css" rel="stylesheet">
	<title>Online Book Store</title>
</head>

<?php
  $db = new mysqli('localhost','root','root','Members');
  if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

  //Validating the form after submission
	if(isset($_POST['submit']) && !empty($_POST['userID']) && !empty($_POST['password'])) {
		$insertCustomer = "INSERT INTO MemberList (fName, lName, street, city, state, zip, phone, email, userID, password) VALUES ('".$_POST['fName']."','".$_POST['lName']."','".$_POST['street']."','".$_POST['city']."','".$_POST['state']."','".$_POST['zip']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['userID']."', '".$_POST['password']."')";
		try {
		$result = $db->query($insertCustomer);
		}
		catch(Exception $e) {
          echo "Message:" .$e->getMessage();
        }
 
        echo "<script type='text/javascript'>location.href = '../index.php';</script>";
	}
	else {
	?>

<body class="text-center">
	<img class="logo" src="Parana.png">
		<h1 class="h3 mb-3 font-weight-normal"><font color="white">Please sign in</font></h1>

	<div class='container welcome'>
      	<form class='form-signin' method='post'>
		<label for="fName" class="sr-only">First Name</label>
		<input type="text" name="fName" class="form-control" placeholder="First Name" required="true" >

		<label for="lName" class="sr-only">Last Name</label>
		<input type="text" name="lName" class="form-control" placeholder="Last Name" required="true" >

		<label for="street" class="sr-only">Street</label>
		<input type="text" name="street" class="form-control" placeholder="Street" required="" >

		<label for="city" class="sr-only">City</label>
		<input type="text" name="city" class="form-control" placeholder="City" required="" >

		<label for="state" class="sr-only">State</label>
		<input type="text" name="state" class="form-control" placeholder="State" required="" >

		<label for="zip" class="sr-only">Zip</label>
		<input type="text" name="zip" class="form-control" placeholder="Zip" required="" >

		<label for="phone" class="sr-only">Phone</label>
		<input type="text" name="phone" class="form-control" placeholder="Phone" required="" >

		<label for="email" class="sr-only">Email</label>
		<input type="text" name="email" class="form-control" placeholder="Email" required="true" >

		<label for="userID" class="sr-only">User ID</label>
		<input type="text" name="userID" class="form-control" placeholder="User ID" required="true" >

		<label for="password" class="sr-only">Password</label>
		<input type="text" name="password" class="form-control" placeholder="Password" required="true" >

      		<input type='submit' name='submit' value='Register' class='btn btn-primary buy'>
      	</form>		
	</div>
</body>
<?php
	}
$db->close();
?>
</body>
</html>
